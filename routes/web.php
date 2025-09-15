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

Route::get('/virtual-tour', function () {
    $destinasi = [
        [
            'nama' => 'Pantai Widarapayung',
            'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
            'gambar' => '/images/widarapayung.jpg',
            'video' => '/img/360/11_IMG_20250823_154633_00_edited.jpg',
            'highlight' => ['Sunset', 'Pantai Luas', 'Spot Foto'],
        ],
        [
            'nama' => 'Pantai Tampen',
            'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
            'gambar' => '/images/tampen.jpg',
            'video' => 'https://www.youtube.com/embed/yyyy',
            'highlight' => ['Pemandangan Indah', 'Pasir Putih'],
        ],
        [
            'nama' => 'Sentra Madu Klanceng',
            'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
            'gambar' => '/images/madu.jpg',
            'video' => 'https://www.youtube.com/embed/zzzz',
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