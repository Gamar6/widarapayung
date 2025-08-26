{{-- <div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div> --}}

@props([
  'title' => 'Nama Hotel',
  'lokasi' => 'Kabupaten Cilacap, Jawa Tengah',
  'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit quisque faucibus...',
  'rating' => 4.8,
  'ulasan' => 2534,
  'jamBuka' => '08.00 - 18.00 WIB',
  'tiket' => 'Rp 15.000',
  'fasilitas' => ['Lorem ipsum','Lorem ipsum','Lorem ipsum'],
  'aktivitas' => ['Lorem ipsum','Lorem ipsum','Lorem ipsum'],
  'image' => 'https://placehold.co/640x380/png',
])

{{-- SECTION 2 --}}
  <section id="destinasi" class="bg-gray-50 py-16">
    <div class="mx-auto max-w-7xl px-6">
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ([1, 2, 3] as $i)
          <article class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <img src="https://placehold.co/640x380/png" alt="Gambar destinasi {{ $i }}" loading="lazy"
              class="h-48 w-full object-cover">
            <div class="p-5">
              <h3 class="font-medium">{{ $title }}</h3>
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
