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

route::get('/hotel', function () {
    return view('hotel');
});

route::get('/homestay', function () {
    return view('homestay');
});