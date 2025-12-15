<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;



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
    // Menu Routes
    Route::get('/Menu', [MenuController::class, 'index'])->name('Menu');
    Route::get('/Menu/{slug}', [MenuController::class, 'show'])->name('Menu.show');
    Route::get('/category/{slug}', [MenuController::class, 'byCategory'])->name('Menu.category');
    
    // Profile
    Route::get('/Profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/Profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/Profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');
    Route::post('/Profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    
    // Address Management
    Route::post('/Profile/address/add', [ProfileController::class, 'addAddress'])->name('address.add');
    Route::post('/Profile/address/{id}/set-default', [ProfileController::class, 'setDefaultAddress'])->name('address.set-default');
    Route::delete('/Profile/address/{id}', [ProfileController::class, 'deleteAddress'])->name('address.delete');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); 
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('cart.processCheckout');

    /// Order Routes
Route::get('/order/success/{orderId}', [OrderController::class, 'success'])->name('order.success');
Route::post('/order/{orderId}/review', [OrderController::class, 'submitReview'])->name('order.review');


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