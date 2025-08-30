@extends('app')

@section('content')
  <header class="border-b bg-slate-50/70">
    <div class="container mx-auto px-4 py-10 text-center">
      <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl">
        Akomodasi Hostel
      </h1>
      <p class="mx-auto mt-3 max-w-2xl text-gray-600">
        Pilihan hostel untuk liburan Anda.
      </p>
    </div>
  </header>

  <main>
    <section class="container mx-auto px-4 py-8">
      <div class="grid grid-cols-2 gap-6">
        <div class="overflow-hidden rounded-lg bg-white shadow-lg">
          <x-hotel.hotel-card title="Hostel Mawar" rating="4.8" reviews="128" lokasi="Jl. Mawar No. 1, Cilacap"
            deskripsi="Hostel nyaman dengan pemandangan pantai yang indah. Dilengkapi berbagai fasilitas modern untuk kenyamanan Anda."
            harga="Rp 150.000/malam" :fasilitas="['WiFi', 'AC', 'TV', 'Parkir']" image="https://placehold.co/300x400?text=Gambar+1" />
        </div>

        <div class="overflow-hidden rounded-lg bg-white shadow-lg">
          <x-hotel.hotel-card title="Hostel Melati" rating="4.6" reviews="96" lokasi="Jl. Melati No. 2, Cilacap"
            deskripsi="Hostel bergaya modern dengan suasana yang tenang dan nyaman. Lokasi strategis dekat pantai."
            harga="Rp 175.000/malam" :fasilitas="['WiFi', 'AC', 'TV', 'Restoran']" image="https://placehold.co/300x400?text=Gambar+2" />
        </div>
      </div>
    </section>
  </main>
@endsection
