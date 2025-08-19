@extends('app')
@section('title', 'Akomodasi')
@section('content')
  <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Akomodasi</h1>
        <p class="mb-4">Temukan akomodasi terbaik untuk liburan Anda di sini.</p>
    
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ([1, 2, 3] as $i)
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <img src="https://placehold.co/640x360/png" alt="Akomodasi {{ $i }}" loading="lazy"
                class="h-48 w-full object-cover">
            <div class="p-5">
                <h3 class="font-medium">Akomodasi {{ $i }}</h3>
                <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang akomodasi ini.</p>
                <div class="mt-4">
                <a href="#"
                    class="inline-flex items-center justify-center rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-600">Lihat
                    Detail</a>
                </div>
            </div>
            </div>
        @endforeach
        </div>