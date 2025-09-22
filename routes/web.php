<?php

use App\Http\Controllers\VirtualTourController;
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
            'gambar' => '/img/spot/spot-gapura.jpg',
            'panorama' => '/img/360/scene1.jpg', // gambar panorama 360
            'highlight' => ['Sunset', 'Pantai Luas', 'Spot Foto'],
        ]
    ];

    return view('virtual-tour', compact('destinasi'));
});

route::get('/contact', function () {
    return view('contact');
});
// Route::get('/widarapayung', function () {
//     return view('widarapayung');
// });
Route::get('/widarapayung', [VirtualTourController::class, 'index'])->name('widarapayung.index');

route::get('/jembut', [VirtualTourController::class, 'index']);