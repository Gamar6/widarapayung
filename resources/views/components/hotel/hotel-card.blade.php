{{-- <div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div> --}}

@props([
    'title' => 'Nama Hotel',
    'rating' => '4.5',
    'reviews' => '128',
    'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit...',
    'image' => 'https://placehold.co/300x400?text=Gambar',
])

<div class="flex h-full">
  {{-- Gambar (lebih kecil, 30%) --}}
  <div class="w-1/3">
    <img src="{{ $image }}" alt="Foto {{ $title }}" class="h-full w-full rounded-l-lg object-cover">
  </div>

  {{-- Konten (lebih besar, 70%) --}}
  <div class="flex w-2/3 flex-col p-6">
    <div class="flex-grow">
      {{-- Header --}}
      <h3 class="text-xl font-bold text-gray-900">{{ $title }}</h3>

      {{-- Lokasi --}}
      <p class="mt-2 flex items-center gap-1 text-sm text-gray-500">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        {{ $lokasi }}
      </p>

      {{-- Rating dengan bintang --}}
      <div class="mt-2 flex items-center gap-1">
        <div class="flex">
          @for ($i = 1; $i <= 5; $i++)
            <svg class="{{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }} h-4 w-4" fill="currentColor"
              viewBox="0 0 20 20">
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
            </svg>
          @endfor
        </div>
        <span class="text-sm text-gray-500">({{ $reviews }} ulasan)</span>
      </div>

      {{-- Deskripsi --}}
      <p class="mt-4 text-gray-600">{{ $deskripsi }}</p>
    </div>

    {{-- Button --}}
    <div class="mt-6 border-t border-gray-100 pt-4">
      <a href="#"
        class="block w-full rounded-full bg-blue-600 px-4 py-2 text-center text-white transition hover:bg-blue-700">
        Selengkapnya
      </a>
    </div>
  </div>
</div>
