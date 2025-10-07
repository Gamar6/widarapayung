{{-- <div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div> --}}

<nav x-data="{ mobile: false, drop: false }" class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur">
{{-- <nav x-data="{ mobile: false, drop: false, scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })" :class="scrolled ? 'bg-white/80 border-b border-gray-200 backdrop-blur' : 'bg-transparent'" class="sticky top-0 z-50 transition-colors duration-500"> --}}
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between"><a href="{{ url('/') }}" class="text-lg font-semibold">Widarapayung</a>

      <!-- Desktop -->
      <div class="hidden items-center gap-6 md:flex">
        <a href="/" class="text-sm transition-colors" :class="scrolled ? 'text-gray-600 hover:text-gray-900' : 'text-white hover:text-gray-200'">Beranda</a>
        <a href="/profil-wisata" class="text-sm transition-colors" :class="scrolled ? 'text-gray-600 hover:text-gray-900' : 'text-white hover:text-gray-200'">Profil Wisata</a>
        <a href="/kendaraan" class="text-sm transition-colors" :class="scrolled ? 'text-gray-600 hover:text-gray-900' : 'text-white hover:text-gray-200'">Transportasi</a>

        

        <a href="/virtual-tour" class="text-sm transition-colors" :class="scrolled ? 'text-gray-600 hover:text-gray-900' : 'text-white hover:text-gray-200'">Virtual Tour</a>
        <a href="/contact" class="text-sm transition-colors" :class="scrolled ? 'text-gray-600 hover:text-gray-900' : 'text-white hover:text-gray-200'">Kontak</a>
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
      <a href="/kendaraan" class="block py-1">Transportasi</a>
      <a href="/jembut" class="block py-1">Virtual Tour</a>
      <a href="/contact" class="block py-1">Kontak</a>
    </div>
  </div>
</nav>