<?php

use Illuminate\Support\Facades\Route;

route::get('/app', function () {
    return view('app');
});

Route::get('/', function () {
    return view('home');
});

route::get('/coba', function () {
    return view('coba');
});

route::get('/coba2', function () {
    return view('coba2');
});

Route::view('/profil-wisata', 'profil-wisata')->name('profil.wisata');

route::get('/akomodasi', function () {
    return view('akomodasi');
});