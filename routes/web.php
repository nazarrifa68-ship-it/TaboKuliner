<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.Home');
})->name("Home");

Route::get('/Menu', function () {
    return view('Pages.Menu');
})->name("Menu");

Route::get('/About', function () {
    return view('Pages.About');
})->name("About");

Route::get('/Contact', function () {
    return view('Pages.Contact');
})->name("Contact");


Route::get('/Login', function () {
    return view('Pages.loginpage');
})->name("loginpage");

Route::get('/Register', function () {
    return view('Pages.registerpage');
})->name("registerpage");




