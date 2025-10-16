@extends('app')

@section('title', 'Profil Destinasi Wisata')

@push('meta')
  <meta name="description" content="Profil destinasi wisata: info lokasi, jam buka, tiket, fasilitas, aktivitas, dan tur virtual.">
@endpush

@section('content')
  {{-- Header --}}
  <header class="border-b bg-slate-50/70">
    <div class="container mx-auto px-4 py-10 text-center">
      <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl">
        Profil Destinasi Wisata
      </h1>
      <p class="mx-auto mt-3 max-w-2xl text-gray-600">
        Berikut adalah profil destinasi wisata yang ada di Widarapayung
      </p>
    </div>
  </header>

  {{-- Main Content --}}
  <main>
    {{-- Daftar Destinasi --}}
    <section class="container mx-auto space-y-8 px-4 py-8">
      <x-destinasi.card
        title="Pantai Indah Widarapayung"
        :fasilitas="['Toilet', 'Mushola', 'Gazebo', 'Warung', 'ATV', 'Delman']"
        :aktivitas="['Berenang', 'berselancar', 'Bermain pasir', 'Kuliner', 'Fotografi']"
        image="/img/spot/spot-1.jpg"
        imagePosition="left"
        deskripsi="Pantai Indah Widarapayung adalah Lorem ipsum dolor sit."
      />
    </section>

    {{-- Call to Action --}}
    <section class="container mx-auto px-4 pb-12">
      <div class="rounded-2xl border border-gray-200 bg-white p-8 text-center shadow-md md:p-10">
        <h2 class="text-xl font-semibold md:text-2xl">
          Tertarik Mengunjungi Destinasi Kami?
        </h2>
        <p class="mt-2 text-gray-600">
          Hubungi kami untuk informasi lebih lanjut dan penawaran khusus.
        </p>
        <a href="/contact"
           class="mt-6 inline-block rounded-md bg-amber-500 px-6 py-3 text-white transition hover:bg-amber-600">
          Hubungi Kami
        </a>
      </div>
    </section>
  </main>
@endsection