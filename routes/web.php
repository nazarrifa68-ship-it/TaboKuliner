<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('Pages.Home');
})->name("Home");

Route::get('/About', function () {
    return view('Pages.About');
})->name("About");

Route::get('/Contact', function () {
    return view('Pages.Contact');
})->name("Contact");

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/Login', [AuthController::class, 'showLoginPage'])->name("loginpage");
Route::get('/Register', [AuthController::class, 'showRegisterPage'])->name("registerpage");
Route::post('/Login', [AuthController::class, 'login'])->name("login");
Route::post('/Register', [AuthController::class, 'register'])->name("register");
Route::post('/Logout', [AuthController::class, 'logout'])->name("logout")->middleware('auth');

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'customer'])->group(function () {
    // Menu
    Route::get('/Menu', function () {
        return view('Pages.Menu');
    })->name("Menu");
    
    // Profile
    Route::get('/Profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/Profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/Profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');
    Route::post('/Profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    
    // Address Management
    Route::post('/Profile/address/add', [ProfileController::class, 'addAddress'])->name('address.add');
    Route::post('/Profile/address/{id}/set-default', [ProfileController::class, 'setDefaultAddress'])->name('address.set-default');
    Route::delete('/Profile/address/{id}', [ProfileController::class, 'deleteAddress'])->name('address.delete');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('Pages.Home');
    })->name('dashboard');
});