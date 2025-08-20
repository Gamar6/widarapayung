@extends('app')

@section('content')


<header class="border-b bg-slate-50/70">
  <div class="container mx-auto px-4 py-10 text-center">
    <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl">
      Akomodasi Kendaraan
    </h1>
    <p class="mx-auto mt-3 max-w-2xl text-gray-600">
      Pilihan kendaraan untuk liburan Anda.
    </p>
  </div>
</header>

<main>
    <section class="container mx-auto space-y-8 px-4 py-8">
        <x-kendaraan.card title="Nama Kendaraan" image="https://placehold.co/800x500?text=Gambar+1" imagePosition="left" />
        <x-kendaraan.card title="Nama Kendaraan" image="https://placehold.co/800x500?text=Gambar+2" imagePosition="right" />
        <x-kendaraan.card title="Nama Kendaraan" image="https://placehold.co/800x500?text=Gambar+3" imagePosition="left" />
    </section>
    
    {{-- CTA --}}
    <section class="container mx-auto px-4 pb-12">
        <div class="rounded-2xl border border-gray-200 bg-white p-8 text-center shadow-md md:p-10">
        <h2 class="text-xl font-semibold md:text-2xl">
            Tertarik Menggunakan Kendaraan Kami?
        </h2>
        <p class="mt-2 text-gray-600">
            Hubungi kami untuk informasi lebih lanjut.
        </p>
        <a href="#kontak"
            class="mt-6 inline-block rounded-md bg-amber-500 px-6 py-3 text-white transition hover:bg-amber-600">
            Hubungi Kami
        </a>
        </div>
    </section>
</main>


@endsection