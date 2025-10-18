@props([
    'title' => 'Damri Perintis',
    'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
    'deskripsi' => 'Damri Perintis adalah layanan bus yang melayani rute strategis di Cilacap, menghadirkan perjalanan nyaman dengan fasilitas AC dan kursi nyaman. Cocok untuk wisata maupun transportasi harian antar destinasi populer.',
    'jamOpr' => '04.00 - Selesai',
    'tiket' => 'Rp 15.000',
    'fasilitas' => ['19 Kursi', 'AC', 'Non-AC'],
    'rute' => ['Benteng Pendem', 'Teluk Penyu', 'Pantai Sodong', 'Pantai Widarapayung', 'Pantai Jetis'],
    'image' => 'img/bus-damri-perintis.jpeg',
    'mapsSrc' => 'https://www.google.com/maps/embed?pb=...'
])

<article class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-md dark:border-gray-700 dark:bg-gray-900 dark:hover:shadow-lg dark:hover:shadow-blue-950/50">
  <div class="grid md:grid-cols-2 gap-6" x-data="{ showMap: false }">
    
    {{-- Gambar / Maps --}}
    <div class="md:order-1 relative h-64 md:h-full">
      <!-- Foto Bus -->
      <img 
        x-show="!showMap" 
        x-cloak
        src="{{ $image }}" 
        alt="Foto {{ $title }}" 
        class="h-full w-full object-cover rounded-lg md:rounded-none"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

      <!-- Google Maps -->
      <iframe 
        x-show="showMap"
        x-cloak
        src="{{ $mapsSrc }}" 
        class="h-full w-full rounded-lg md:rounded-none"
        style="border:0;"
        allowfullscreen
        loading="lazy"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
      </iframe>
    </div>

    {{-- Konten --}}
    <div class="p-6 md:p-10 md:order-2 flex flex-col justify-between">
      <div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
        <p class="mt-1 flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 dark:text-gray-500" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/>
          </svg>
          {{ $lokasi }}
        </p>
        <p class="mt-4 leading-relaxed text-gray-600 dark:text-gray-300">{{ $deskripsi }}</p>

        {{-- Info Grid --}}
        <div class="mt-6 grid gap-4 text-sm sm:grid-cols-2">
          <div>
            <p class="text-gray-500 dark:text-gray-400">Jam Operasional</p>
            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $jamOpr }}</p>
          </div>
          <div>
            <p class="text-gray-500 dark:text-gray-400">Harga Tiket</p>
            <p class="font-medium text-gray-900 dark:text-gray-100">{{ $tiket }}</p>
          </div>
        </div>

        {{-- Fasilitas --}}
        <div class="mt-6">
          <p class="text-gray-500 dark:text-gray-400">Fasilitas:</p>
          <div class="mt-1 flex flex-wrap gap-2">
            @foreach ($fasilitas as $f)
              <span class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700 dark:border-blue-700/25 dark:bg-blue-900/25 dark:text-blue-400">
                {{ $f }}
              </span>
            @endforeach
          </div>
        </div>

        {{-- Rute --}}
        <div class="mt-6">
          <p class="text-gray-500 dark:text-gray-400">Rute:</p>
          <div class="mt-1 flex flex-wrap gap-2">
            @foreach ($rute as $rt)
              <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700 dark:border-emerald-700/25 dark:bg-emerald-900/25 dark:text-emerald-400">
                {{ $rt }}
              </span>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Tombol toggle Gambar / Maps --}}
      <div class="mt-6">
        <button 
          @click="showMap = !showMap"
          class="w-full md:w-auto rounded-md bg-amber-500 px-4 py-2 text-white hover:bg-amber-600 border border-gray-300/25  dark:bg-gray-900 dark:hover:bg-gray-700 transition">
          <span x-show="!showMap">Lihat Rute di Maps</span>
          <span x-show="showMap">Lihat Foto Bus</span>
        </button>
      </div>
    </div>
  </div>
</article>
