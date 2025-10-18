<nav x-data="{ mobile: false }"
  class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur dark:border-gray-700 dark:bg-gray-900 dark:text-white">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      <!-- Brand -->
      <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-800 dark:text-white">Widarapayung</a>

      <!-- Desktop Menu -->
      <div class="hidden items-center gap-6 md:flex">
        @php
          $menus = [
              '/' => 'Beranda',
              '/profil-wisata' => 'Profil Wisata',
              '/kendaraan' => 'Transportasi',
              '/virtual-tour' => 'Virtual Tour',
              '/contact' => 'Kontak',
          ];
        @endphp

        @foreach ($menus as $link => $label)
          <a href="{{ $link }}"
            class="text-sm text-gray-700 transition-colors hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">
            {{ $label }}
          </a>
        @endforeach
      </div>

      <!-- Dark Mode Toggle -->
      <button @click="dark = !dark; localStorage.setItem('theme', dark ? 'dark' : 'light')"
        class="ml-4 hidden text-sm text-gray-700 hover:underline md:inline-block dark:text-gray-300"
        aria-label="Toggle Dark Mode">
        <img
          :src="dark
              ?
              '{{ asset('img/tabler--sun-high.svg') }}' :
              '{{ asset('img/tabler--moon.svg') }}'"
          class="h-6 w-6 transition duration-300" :class="dark ? 'filter invert brightness-0' : ''"
          alt="Toggle Dark Mode Icon">
      </button>

      <!-- Mobile Button -->
      <button @click="mobile = !mobile"
        class="inline-flex h-10 w-10 items-center justify-center rounded-md hover:bg-gray-100 md:hidden dark:hover:bg-gray-800">
        <svg x-show="!mobile" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="mobile" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="mobile" x-transition
    class="border-t border-gray-200 bg-white md:hidden dark:border-gray-700 dark:bg-gray-900">
    <div class="space-y-2 px-4 py-3">
      @foreach ($menus as $link => $label)
        <a href="{{ $link }}"
          class="block py-1 text-gray-700 hover:text-black dark:text-gray-300 dark:hover:text-white">
          {{ $label }}
        </a>
      @endforeach

      <!-- Mobile dark mode toggle -->
      <button @click="dark = !dark; localStorage.setItem('theme', dark ? 'dark' : 'light')"
        class="block w-full py-1 text-left text-sm text-gray-700 hover:underline dark:text-gray-300">
        <span x-text="dark ? '☀️ Light Mode' : '🌙 Dark Mode'"></span>
      </button>
    </div>
  </div>
</nav>
