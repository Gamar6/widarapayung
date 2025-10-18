@extends('app')

@section('content')
  <header class="border-b bg-slate-50/70 dark:bg-gray-900 dark:border-gray-700">
    <div class="container mx-auto px-4 py-10 text-center">
      <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl text-gray-900 dark:text-white">
        Akomodasi Kendaraan
      </h1>
      <p class="mx-auto mt-3 max-w-2xl text-gray-600 dark:text-gray-400">
        Pilihan kendaraan untuk liburan Anda.
      </p>
    </div>
  </header>

  <main>
    <section class="container mx-auto space-y-8 px-4 py-8">
      {{-- Card kendaraan --}}
      <x-kendaraan.kendaraan-card 
        title="Damri Perintis" 
        deskripsi="Bus Damri Perintis melayani rute wisata populer di Cilacap dengan kenyamanan dan harga terjangkau. Nikmati perjalanan menyenangkan ke destinasi seperti Benteng Pendem, Teluk Penyu, Pantai Sodong, Pantai Widarapayung, sampai Pantai Jetis."
        image="img/bus-damri-perintis.jpeg" 
        jamOpr="04.00 - Selesai"
        :fasilitas="['19 Kursi', 'AC', 'Non-AC']" 
        :rute="['Benteng Pendem', 'Teluk Penyu', 'Pantai Sodong', 'Pantai Widarapayung', 'Pantai Jetis']" 
        mapsSrc="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d126526.12160236189!2d109.11773129217806!3d-7.689449118105676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x2e651284c34eda95%3A0x6e3a53a2def818bd!2s7229%2BCHW%20Benteng%20Pendem%20Cilacap%2C%20Jl.%20Benteng%2C%20Sentolokawat%2C%20Cilacap%2C%20Kec.%20Cilacap%20Sel.%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah%2053211!3m2!1d-7.7488893999999995!2d109.0189604!4m5!1s0x2e6537875bbd2925%3A0x805c3c7982a3dad7!2sPantai%20Jetis%2C%20Jl.%20TPI%20Jetis%20No.RT.61%2C%20Area%20Sawah%2C%20Jetis%2C%20Kec.%20Nusawungu%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah%2053283!3m2!1d-7.718902399999999!2d109.38209379999999!5e0!3m2!1sid!2sid!4v1757967446375!5m2!1sid!2sid"
      />
    </section>

    {{-- CTA --}}
    <section class="container mx-auto px-4 pb-12 ">
      <div class="rounded-2xl border border-gray-200 bg-white p-8 text-center shadow-md md:p-10 dark:border-gray-700 dark:bg-gray-900 dark:hover:shadow-lg dark:hover:shadow-blue-950/50">
        <h2 class="text-xl font-semibold md:text-2xl text-gray-900 dark:text-white">
          Tertarik Menggunakan Kendaraan Kami?
        </h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">
          Hubungi kami untuk informasi lebih lanjut.
        </p>
        <a href="/contact"
          class="mt-6 inline-block rounded-md bg-amber-500 px-6 py-3 text-white transition hover:bg-amber-600 border border-gray-300/25  dark:bg-gray-900 dark:hover:bg-gray-700">
          Hubungi Kami
        </a>
      </div>
    </section>
  </main>
@endsection
