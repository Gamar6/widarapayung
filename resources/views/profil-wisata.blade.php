@extends('app')
@section('title', 'Profil Destinasi Wisata')

@push('meta')
  <meta name="description"
    content="Profil destinasi wisata: info lokasi, jam buka, tiket, fasilitas, aktivitas, dan tur virtual.">
@endpush

@section('content')
  <header class="border-b bg-slate-50/70">
    <div class="container mx-auto px-4 py-10 text-center">
      <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl">
        Profil Destinasi Wisata
      </h1>
      <p class="mx-auto mt-3 max-w-2xl text-gray-600">
        Lorem ipsum dolor sit amet consectetur adipiscing.
      </p>
    </div>
  </header>

  <main>
    <section class="container mx-auto space-y-8 px-4 py-8">
      <x-destinasi.card title="Nama Wisata" :fasilitas="['Toilet', 'Mushola', 'Gazebo', 'Warung']" :aktivitas="['Berenang', 'Bermain pasir', 'Kuliner', 'Fotografi']"
        image="https://placehold.co/800x500?text=Gambar+1" imagePosition="left" />
      <x-destinasi.card title="Nama Wisata" image="https://placehold.co/800x500?text=Gambar+2" imagePosition="right" />
      <x-destinasi.card title="Nama Wisata" image="https://placehold.co/800x500?text=Gambar+3" imagePosition="left" />
    </section>

    {{-- CTA --}}
    <section class="container mx-auto px-4 pb-12">
      <div class="rounded-2xl border border-gray-200 bg-white p-8 text-center shadow-md md:p-10">
        <h2 class="text-xl font-semibold md:text-2xl">
          Tertarik Mengunjungi Destinasi Kami?
        </h2>
        <p class="mt-2 text-gray-600">
          Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus.
        </p>
        <a href="#kontak"
          class="mt-6 inline-block rounded-md bg-amber-500 px-6 py-3 text-white transition hover:bg-amber-600">
          Hubungi Kami
        </a>
      </div>
    </section>
  </main>
@endsection
