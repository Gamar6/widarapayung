<?php

use Illuminate\Support\Facades\Route;

route::get('/app', function () {
    return view('app');
});

Route::get('/', function () {
    return view('home');
});

Route::view('/profil-wisata', 'profil-wisata')->name('profil.wisata');

route::get('/kendaraan', function () {
    return view('kendaraan');
});

route::get('/hostel', function () {
    return view('hostel');
});


route::get('/contact', function () {
    return view('contact');
});


Route::get('/widarapayung', function () {
    return view('coba-claude');
});