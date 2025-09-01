@extends('app')

@section('content')

{{-- SECTION 1 --}}
<header>
  <section id="beranda" class="relative grid min-h-screen place-items-center -top-15">
    <!-- Background image -->
    <!-- <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('{{ asset('video/bg-hero.mp4') }}');"
      aria-hidden="true"></div> -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <video autoplay muted loop playsinline class="w-full h-full object-cover">
            <source src="{{ asset('video/bg-hero.mp4') }}" type="video/mp4">
            Browser kamu tidak mendukung video.
        </video>
    </div>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/60"></div>
    <div class="relative z-10 mx-auto max-w-4xl px-6 text-center text-white">
      <h1 class="font-playfair text-4xl font-semibold tracking-tight sm:text-5xl md:text-6xl">
        Lorem Ipsum Dolor Sit Amet
      </h1>
      <p class="mt-4 text-base text-white/90 sm:text-lg">
        Lorem ipsum dolor sit amet consectetur adipiscing elit quisque
      </p>
    </div>
    <!-- Scroll indicator -->
    <a href="#destinasi" class="group absolute bottom-6 left-1/2 -translate-x-1/2 text-white/80">
      <span class="sr-only">Scroll ke bawah</span>
      <span class="relative block h-10 w-6 overflow-hidden rounded-full border border-white/60">
        <span
          class="animate-wheel absolute left-1/2 top-2 h-1.5 w-1.5 -translate-x-1/2 rounded-full bg-white/90"></span>
      </span>
      <svg class="mx-auto mt-2 h-5 w-5 animate-bounce opacity-80 transition group-hover:opacity-100" viewBox="0 0 24 24"
        fill="none" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </a>
  </section>
</header>

<main>

  {{-- SECTION 2 --}}
  <section id="destinasi" class="bg-gray-50 py-16">
    <div class="mx-auto max-w-7xl px-6">
      <header class="mb-8">
        <h2 class="text-2xl font-semibold md:text-3xl">Destinasi Pilihan</h2>
        <p class="mt-2 max-w-2xl text-gray-600">
          Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus ex sapien vitae pellentesque sem
          placerat in.
        </p>
      </header>
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ([1, 2, 3] as $i)
          <article class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <img src="https://placehold.co/640x380/png" alt="Gambar destinasi {{ $i }}" loading="lazy"
              class="h-48 w-full object-cover">
            <div class="p-5">
              <h3 class="font-medium">Nama Wisata</h3>
              <p class="mt-2 text-sm text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus ex sapien vitae pellentesque sem
                placerat in.
              </p>
              <div class="mt-4">
                <a href="#"
                  class="inline-flex items-center justify-center rounded-md bg-amber-500 px-4 py-2 text-white transition hover:bg-amber-600">
                  Selengkapnya
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- SECTION 3 --}}
  <section id="virtual"
    class="relative bg-emerald-900 bg-[url('https://placehold.co/1600x800/0b5e55/ffffff/png')] bg-cover bg-center py-16">
    <div class="absolute inset-0 bg-emerald-900/70"></div>
    <div class="relative mx-auto max-w-7xl px-6 text-emerald-50">
      <header class="mb-10 text-center">
        <p class="text-sm font-semibold tracking-wider">Keindahan dalam 360°</p>
        <h2 class="font-playfair text-3xl md:text-4xl">Nikmati Keindahan Alam dengan View 360°</h2>
      </header>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([1, 2, 3, 4] as $i)
          <figure class="relative">
            <img src="https://placehold.co/600x360/png" alt="Spot {{ $i }}" loading="lazy"
              class="h-44 w-full rounded-lg object-cover shadow-md">
            <figcaption class="absolute bottom-2 left-2 rounded bg-black/40 px-2 py-1 text-xs font-medium">
              Spot {{ $i }}
            </figcaption>
          </figure>
        @endforeach
      </div>
      <div class="mt-10 text-center">
        <a href="#"
          class="inline-flex items-center rounded-lg border border-emerald-200/70 px-6 py-3 transition hover:bg-emerald-800/50">
          Explore Now
        </a>
      </div>
    </div>
  </section>

</main>

@endsection
