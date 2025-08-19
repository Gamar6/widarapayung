{{-- <div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div> --}}

<nav x-data="{ mobile: false, drop: false }" class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between"><a href="{{ url('/') }}" class="text-lg font-semibold">Nama
        Website</a>

      <!-- Desktop -->
      <div class="hidden items-center gap-6 md:flex">
        <a href="/" class="text-sm text-gray-600 hover:text-gray-900">Beranda</a>
        <a href="/profil-wisata" class="text-sm text-gray-600 hover:text-gray-900">Profil Wisata</a>

        <div class="relative" @keydown.escape.window="drop=false">
          <button @click="drop=!drop" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900">
            Akomodasi
            <svg class="h-4 w-4 transition-transform" :class="drop ? 'rotate-180' : ''" viewBox="0 0 20 20"
              fill="currentColor">
              <path
                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" />
            </svg>
          </button>
          <div x-show="drop" x-transition.origin.top.left @click.outside="drop=false"
            class="absolute left-0 z-50 mt-2 w-56 rounded-lg border border-gray-200 bg-white shadow-lg">
            <ul class="py-2 text-sm">
              <li><a href="#akomodasi-hotel" class="block px-4 py-2 hover:bg-gray-50">Hotel</a></li>
              <li><a href="#akomodasi-villa" class="block px-4 py-2 hover:bg-gray-50">Villa</a></li>
              <li><a href="#akomodasi-homestay" class="block px-4 py-2 hover:bg-gray-50">Homestay</a></li>
            </ul>
          </div>
        </div>

        <a href="#virtual" class="text-sm text-gray-600 hover:text-gray-900">Virtual Tour</a>
        <a href="#kontak" class="text-sm text-gray-600 hover:text-gray-900">Kontak</a>
      </div>

      <!-- Mobile button -->
      <button @click="mobile=!mobile"
        class="inline-flex h-10 w-10 items-center justify-center rounded-md hover:bg-gray-100 md:hidden">
        <svg x-show="!mobile" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="mobile" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div> <!-- Mobile menu -->
  <div x-show="mobile" x-transition class="border-t border-gray-200 bg-white md:hidden">
    <div class="space-y-2 px-4 py-3">
      <a href="/" class="block py-1">Beranda</a>
      <a href="/profil-wisata" class="block py-1">Profil Wisata</a>
      <div x-data="{ open: false }" class="rounded-md border">
        <button @click="open=!open" class="flex w-full items-center justify-between px-3 py-2">
          <span>Akomodasi</span>
          <svg class="h-4 w-4" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
            <path
              d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" />
          </svg>
        </button>
        <div x-show="open" x-transition class="border-t">
          <a href="#akomodasi-hotel" class="block px-3 py-2 hover:bg-gray-50">Hotel</a>
          <a href="#akomodasi-villa" class="block px-3 py-2 hover:bg-gray-50">Villa</a>
          <a href="#akomodasi-homestay" class="block px-3 py-2 hover:bg-gray-50">Homestay</a>
        </div>
      </div>

      <a href="#virtual" class="block py-1">Virtual Tour</a>
      <a href="#kontak" class="block py-1">Kontak</a>
    </div>
  </div>
</nav>
