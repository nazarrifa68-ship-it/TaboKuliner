<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profile
     */
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        
        return view('Pages.Customer.Profile', compact('user', 'addresses'));
    }

    /**
     * Update informasi profile
     */
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ], [
            'name.required' => 'Nama harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah digunakan',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()
            ->with('success', 'Profile berhasil diupdate!');
    }

    /**
     * Update foto profile
     */
    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'profile_photo.required' => 'Foto harus dipilih',
            'profile_photo.image' => 'File harus berupa gambar',
            'profile_photo.mimes' => 'Format foto harus jpeg, png, atau jpg',
            'profile_photo.max' => 'Ukuran foto maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->profile_photo && Storage::exists('public/' . $user->profile_photo)) {
            Storage::delete('public/' . $user->profile_photo);
        }

        // Upload foto baru
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo = $path;
        $user->save();

        return redirect()->back()
            ->with('success', 'Foto profile berhasil diupdate!');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password lama harus diisi',
            'new_password.required' => 'Password baru harus diisi',
            'new_password.min' => 'Password baru minimal 8 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $user = Auth::user();

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Password lama salah']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()
            ->with('success', 'Password berhasil diupdate!');
    }

    /**
     * Tambah alamat baru
     */
    public function addAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label' => 'required|string|max:50',
            'full_address' => 'required|string',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
        ], [
            'label.required' => 'Label alamat harus diisi',
            'address.required' => 'Alamat lengkap harus diisi',
            'city.required' => 'Kota harus diisi',
            'postal_code.required' => 'Kode pos harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        // Jika ini alamat pertama, set sebagai default
        $isDefault = $user->addresses()->count() == 0;

        Address::create([
            'user_id' => $user->id,
            'recipient_name' => $request->recipient_name, // INI PENTING
            'label' => $request->label,
            'full_address' => $request->full_address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'is_default' => $isDefault,
        ]);

        return redirect()->back()
            ->with('success', 'Alamat berhasil ditambahkan!');
    }

    /**
     * Set alamat sebagai default
     */
    public function setDefaultAddress($id)
    {
        $user = Auth::user();

        // Set semua alamat jadi non-default
        $user->addresses()->update(['is_default' => false]);

        // Set alamat yang dipilih jadi default
        $address = $user->addresses()->findOrFail($id);
        $address->is_default = true;
        $address->save();

        return redirect()->back()
            ->with('success', 'Alamat default berhasil diubah!');
    }

    /**
     * Hapus alamat
     */
    public function deleteAddress($id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        // Jangan hapus jika alamat default dan masih ada alamat lain
        if ($address->is_default && $user->addresses()->count() > 1) {
            return redirect()->back()
                ->withErrors(['error' => 'Tidak bisa hapus alamat default. Silakan set alamat lain sebagai default terlebih dahulu.']);
        }

        $address->delete();

        return redirect()->back()
            ->with('success', 'Alamat berhasil dihapus!');
    }
}