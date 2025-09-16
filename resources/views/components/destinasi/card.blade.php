{{-- <div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div> --}}

@props([
  'title' => 'Nama Wisata',
  'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
  'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus...',
  'rating' => 4.8,
  'ulasan' => 2534,
  'jamBuka' => '08.00 - 18.00 WIB',
  'tiket' => 'Rp 15.000',
  'fasilitas' => ['Lorem ipsum','Lorem ipsum','Lorem ipsum'],
  'aktivitas' => ['Lorem ipsum','Lorem ipsum','Lorem ipsum'],
  'image' => 'https://placehold.co/800x500?text=Gambar',
  'imagePosition' => 'left', // left | right
])

@php $imgLeft = $imagePosition === 'left'; @endphp

<article class="rounded-2xl bg-white shadow-md border border-gray-200 overflow-hidden">
  <div class="grid md:grid-cols-2">
    {{-- Gambar --}}
    <div class="{{ $imgLeft ? 'md:order-1' : 'md:order-2' }}">
      <div class="relative h-64 md:h-full">
        <img src="{{ $image }}" alt="Foto {{ $title }}" class="w-full h-full object-cover">
        <div class="absolute top-4 left-4 flex items-center gap-2 bg-white/90 rounded-full px-3 py-1 shadow">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.803 2.037a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118L10 13.347l-2.984 2.137c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L3.38 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"/></svg>
          <span class="text-sm font-medium">{{ number_format($rating,1) }}</span>
          <span class="text-xs text-gray-500">({{ number_format($ulasan) }})</span>
        </div>
      </div>
    </div>

    {{-- Konten --}}
    <div class="{{ $imgLeft ? 'md:order-2' : 'md:order-1' }} p-6 md:p-8">
      <h3 class="text-xl font-semibold">{{ $title }}</h3>
      <p class="mt-1 text-sm text-gray-500 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/></svg>
        {{ $lokasi }}
      </p>
      <p class="mt-4 text-gray-600 leading-relaxed">{{ $deskripsi }}</p>

      <div class="mt-6 grid sm:grid-cols-2 gap-4 text-sm">
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 7a1 1 0 011 1v3.382l2.447 1.414a1 1 0 01-1 1.732l-3-1.732A1 1 0 0111 12V8a1 1 0 011-1z"/><path fill-rule="evenodd" d="M12 2a10 10 0 100 20 10 10 0 000-20zM4 12a8 8 0 1116 0A8 8 0 014 12z" clip-rule="evenodd"/></svg>
          <div>
            <p class="text-gray-500">Jam Buka</p>
            <p class="font-medium">{{ $jamBuka }}</p>
          </div>
        </div>
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="currentColor"><path d="M21 7H3V5h18v2zm0 2H3v10a2 2 0 002 2h14a2 2 0 002-2V9zM7 13h2v2H7v-2zm4 0h2v2h-2v-2z"/></svg>
          <div>
            <p class="text-gray-500">Tiket Masuk</p>
            <p class="font-medium">{{ $tiket }}</p>
          </div>
        </div>
      </div>

      <div class="mt-6 space-y-3">
        <div class="flex items-start gap-3">
          <p class="mt-1 text-gray-500 min-w-20">Fasilitas:</p>
          <div class="flex flex-wrap gap-2">
            @foreach ($fasilitas as $f)
              <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">{{ $f }}</span>
            @endforeach
          </div>
        </div>
        <div class="flex items-start gap-3">
          <p class="mt-1 text-gray-500 min-w-20">Aktivitas:</p>
          <div class="flex flex-wrap gap-2">
            @foreach ($aktivitas as $a)
              <span class="px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">{{ $a }}</span>
            @endforeach
          </div>
        </div>
      </div>

      <div class="mt-6 flex flex-wrap gap-3">
        <a href="/virtual-tour" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 7l9 5-9 5-9-5 9-5zm0 10.18l6.26-3.48L12 10.22l-6.26 3.48L12 17.18z"/></svg>
          Virtual Tour
        </a>
        <a href="/contact" class="inline-flex items-center px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
          Hubungi Kami
        </a>
      </div>
    </div>
  </div>
</article>
