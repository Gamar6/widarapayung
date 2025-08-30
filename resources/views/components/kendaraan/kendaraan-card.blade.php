{{-- <div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div> --}}

@props([
    'title' => 'Nama Kendaraan',
    'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus...',
    'jamOpr' => '08.00 - 18.00 WIB',
    'tiket' => 'Rp 15.000',
    'fasilitas' => ['Lorem ipsum', 'Lorem ipsum', 'Lorem ipsum'],
    'Rute' => ['Lorem ipsum', 'Lorem ipsum', 'Lorem ipsum'],
    'image' => 'https://placehold.co/800x500?text=Gambar'
])

<article class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-md">
  <div class="grid md:grid-cols-2">
    {{-- Gambar --}}
    <div class="md:order-1"> {{-- Changed from md:order-2 to md:order-1 --}}
      <div class="relative h-64 md:h-full">
        <img src="{{ $image }}" alt="Foto {{ $title }}" class="h-full w-full object-cover">
      </div>
    </div>

    {{-- Konten --}}
    <div class="p-6 md:order-2 md:p-8"> {{-- Changed from md:order-1 to md:order-2 --}}
      <h3 class="text-xl font-semibold">{{ $title }}</h3>
      <p class="mt-1 flex items-center gap-2 text-sm text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
          <path
            d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
        </svg>
        {{ $lokasi }}
      </p>
      <p class="mt-4 leading-relaxed text-gray-600">{{ $deskripsi }}</p>

      {{-- Info Grid --}}
      <div class="mt-6 grid gap-4 text-sm sm:grid-cols-2">
        {{-- Jam Operasional --}}
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 7a1 1 0 011 1v3.382l2.447 1.414a1 1 0 01-1 1.732l-3-1.732A1 1 0 0111 12V8a1 1 0 011-1z" />
            <path fill-rule="evenodd" d="M12 2a10 10 0 100 20 10 10 0 000-20zM4 12a8 8 0 1116 0A8 8 0 014 12z"
              clip-rule="evenodd" />
          </svg>
          <div>
            <p class="text-gray-500">Jam Operasional</p>
            <p class="font-medium">{{ $jamOpr }}</p>
          </div>
        </div>

        {{-- Harga Tiket --}}
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
            <path d="M21 7H3V5h18v2zm0 2H3v10a2 2 0 002 2h14a2 2 0 002-2V9zM7 13h2v2H7v-2zm4 0h2v2h-2v-2z" />
          </svg>
          <div>
            <p class="text-gray-500">Harga Tiket</p>
            <p class="font-medium">{{ $tiket }}</p>
          </div>
        </div>
      </div>

      {{-- Fasilitas & Rute --}}
      <div class="mt-6 space-y-3">
        {{-- Fasilitas --}}
        <div class="flex items-start gap-3">
          <p class="mt-1 min-w-20 text-gray-500">Fasilitas:</p>
          <div class="flex flex-wrap gap-2">
            @foreach ($fasilitas as $f)
              <span class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">
                {{ $f }}
              </span>
            @endforeach
          </div>
        </div>

        {{-- Rute --}}
        <div class="flex items-start gap-3">
          <p class="mt-1 min-w-20 text-gray-500">Rute:</p>
          <div class="flex flex-wrap gap-2">
            @foreach ($Rute as $r)
              <span
                class="rounded-full border border-amber-100 bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700">
                {{ $r }}
              </span>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Action Buttons --}}
      <div class="mt-6 flex flex-wrap gap-3">
        <a href="#kontak"
          class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-gray-700 transition hover:bg-gray-50">
          Hubungi Kami
        </a>
      </div>
    </div>
  </div>
</article>
