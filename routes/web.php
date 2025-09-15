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

Route::get('/virtual-tour', function () {
    $destinasi = [
        [
            'nama' => 'Pantai Widarapayung',
            'lokasi' => 'Cilacap, Jawa Tengah',
            'gambar' => '/img/360/scene1.jpg',
            'panorama' => '/img/360/scene1.jpg', // gambar panorama 360
            'highlight' => ['Sunset', 'Pantai Luas', 'Spot Foto'],
        ],
        [
            'nama' => 'Pantai Tampen',
            'lokasi' => 'Cilacap, Jawa Tengah',
            'gambar' => '/img/360/scene2.jpg',
            'panorama' => '/img/360/scene2.jpg',
            'highlight' => ['Pemandangan Indah', 'Pasir Putih'],
        ],
        [
            'nama' => 'Sentra Madu Klanceng',
            'lokasi' => 'Cilacap, Jawa Tengah',
            'gambar' => '/img/360/scene3.jpg',
            'panorama' => '/img/360/scene3.jpg',
            'highlight' => ['Wisata Edukasi', 'Kuliner Lokal'],
        ],
    ];

    return view('virtual-tour', compact('destinasi'));
});

route::get('/contact', function () {
    return view('contact');
});


Route::get('/widarapayung', function () {
    return view('coba-claude');
});

route::get('/test', function () {
    return view('test');
});