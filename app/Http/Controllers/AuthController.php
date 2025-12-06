<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginPage()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('Pages.loginpage');
    }

    // Tampilkan halaman register
    public function showRegisterPage()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('Pages.registerpage');
    }

    // Proses login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username atau email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Cek apakah username adalah email atau bukan
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $fieldType => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole();
        }

        return redirect()->back()
            ->withErrors(['username' => 'Username/Email atau password salah'])
            ->withInput();
    }

    // Proses register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $phone = '08' . rand(1000000000, 9999999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $phone,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        Auth::login($user);

        return redirect()->route('Home')
            ->with('success', 'Registrasi berhasil! Selamat datang di TaboKuliner');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginpage')
            ->with('success', 'Logout berhasil');
    }

    // Helper redirect berdasarkan role
    private function redirectBasedOnRole()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('Home');
    }
}