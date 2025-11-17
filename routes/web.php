<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Menu', function () {
    return view('menupage');
});

Route::get('/About', function () {
    return view('aboutpage');
});

Route::get('/Contact', function () {
    return view('contactpage');
});

Route::get('/Login', function () {
    return view('loginpage');
});

Route::get('/Register', function () {
    return view('registerpage');
});

