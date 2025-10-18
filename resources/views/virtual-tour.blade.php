@extends('app')
@section('title', 'Virtual Tour')

@push('meta')
  <meta name="description"
    content="Jelajahi destinasi wisata melalui virtual tour interaktif kami. Nikmati pengalaman 360 derajat dari kenyamanan rumah Anda." />
@endpush

@section('content')

  {{-- =========================
    Header Section
========================= --}}
  <header class="border-b bg-slate-50/70 dark:bg-slate-900/70">
    <div class="container mx-auto px-4 py-10 text-center">
      <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl text-gray-900 dark:text-gray-100">Virtual Tour</h1>
      <p class="mx-auto mt-3 max-w-2xl text-gray-600 dark:text-gray-400">Nikmati pengalaman 360 derajat dari kenyamanan rumah Anda.</p>
    </div>
  </header>

  {{-- =========================
    Main Content
========================= --}}
  <div class="mx-auto max-w-7xl px-4 py-10" x-data="virtualTour({{ json_encode($destinasi) }})">
    <div class="grid grid-cols-12 gap-6">

      {{-- Sidebar: Pilih Destinasi --}}
      <div class="col-span-3 rounded-lg bg-white shadow p-4 dark:bg-slate-900 dark:hover:shadow-lg dark:hover:shadow-blue-950/50 dark:shadow-none">
        <h2 class="mb-4 font-semibold text-gray-900 dark:text-gray-100">Pilih Destinasi</h2>
        <div class="space-y-3">
          <template x-for="(d, i) in destinasi" :key="i">
            <div class="flex cursor-pointer items-center space-x-3 rounded-md p-2 transition"
              :class="i === selected ? 'bg-blue-100 dark:bg-blue-900/5' : 'hover:bg-blue-50 dark:hover:bg-blue-800/5'">
              <img :src="d.gambar" class="h-12 w-16 rounded-md object-cover">
              <div>
                <p class="text-sm font-medium text-gray-900 dark:text-gray-100" x-text="d.nama"></p>
                <p class="text-xs text-gray-500 dark:text-gray-400" x-text="d.lokasi"></p>
              </div>
            </div>
          </template>
        </div>
      </div>

      {{-- Detail Section --}}
      <div class="col-span-9">
        <div class="rounded-lg bg-white shadow p-4 dark:bg-slate-900 dark:hover:shadow-lg dark:hover:shadow-blue-950/50 dark:shadow-none">

          {{-- Preview Image Sebelum Tour --}}
          <div class="relative mb-4 aspect-video overflow-hidden rounded-lg" x-show="!started">
            <img :src="destinasi[selected].gambar" class="h-full w-full object-cover">
            <button class="absolute inset-0 flex items-center justify-center bg-black/25 text-3xl font-bold text-white"
              @click="window.location.href = '/widarapayung?scene=' + destinasi[selected].scene">
              ▶ Play
            </button>
          </div>

          {{-- Panorama Viewer --}}
          <div :id="'panorama-' + selected" class="h-[500px] w-full overflow-hidden rounded-lg" x-show="started"></div>

          {{-- Nama & Lokasi --}}
          <h2 class="mb-1 mt-4 text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="destinasi[selected].nama"></h2>
          <p class="mb-3 text-gray-600 dark:text-gray-400" x-text="destinasi[selected].lokasi"></p>

          {{-- Highlights --}}
          <div class="mb-4 flex flex-wrap gap-2">
            <template x-for="h in destinasi[selected].highlight" :key="h">
              <span class="rounded-full bg-orange-100 px-3 py-1 text-xs text-orange-600 dark:bg-orange-900 dark:text-orange-300" x-text="h"></span>
            </template>
          </div>

          {{-- Tombol Aksi --}}
          <div x-data="{ shareOpen: false }">
            <div class="flex flex-wrap gap-3">
              <button class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 border border-gray-300/25  dark:bg-gray-900 dark:hover:bg-gray-700"
                @click="window.location.href = '/widarapayung?scene=' + destinasi[selected].scene">
                Mulai Virtual Tour
              </button>
              <button class="rounded-lg bg-green-600 px-4 py-2 text-white hover:bg-green-700 border border-green-300/25  dark:bg-green-900/25 dark:hover:bg-green-700/25"
                @click="shareOpen = true">Bagikan</button>
            </div>

            {{-- Modal Bagikan --}}
            <div x-show="shareOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-transition>
              <div class="relative w-80 rounded-lg bg-white p-5 shadow-lg dark:bg-slate-900">
                <h3 class="mb-3 text-lg font-semibold text-gray-900 dark:text-gray-100">Bagikan Link</h3>

                {{-- Input link --}}
                <div class="flex items-center overflow-hidden rounded-lg border border-gray-300 dark:border-gray-700">
                  <input type="text" class="flex-1 px-2 py-1 text-sm bg-white dark:bg-slate-800 dark:text-gray-100" readonly value="{{ url('/widarapayung') }}"
                    id="shareLink">
                  <button onclick="navigator.clipboard.writeText(document.getElementById('shareLink').value)"
                    class="bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
                    Copy
                  </button>
                </div>

                {{-- Tombol share sosial --}}
                <div class="mt-4 flex gap-3">
                  <a :href="`https://www.facebook.com/sharer/sharer.php?u={{ url('/widarapayung') }}`" target="_blank"
                    class="rounded-lg bg-blue-700 px-3 py-2 text-sm text-white hover:bg-blue-800">
                    Facebook
                  </a>
                  <a :href="`https://twitter.com/intent/tweet?url={{ url('/widarapayung') }}`" target="_blank"
                    class="rounded-lg bg-sky-500 px-3 py-2 text-sm text-white hover:bg-sky-600">
                    Twitter
                  </a>
                  <a :href="`https://wa.me/?text={{ url('/widarapayung') }}`" target="_blank"
                    class="rounded-lg bg-green-500 px-3 py-2 text-sm text-white hover:bg-green-600">
                    WhatsApp
                  </a>
                </div>

                {{-- Tombol Close --}}
                <button @click="shareOpen = false" class="absolute right-2 top-2 text-gray-500 hover:text-black dark:hover:text-white">
                  ✖
                </button>
              </div>
            </div>
          </div>

          {{-- Tips --}}
          <div class="mt-6 rounded-lg bg-white p-4 shadow dark:bg-slate-800/25 dark:shadow-none">
            <h3 class="mb-3 font-semibold text-gray-900 dark:text-gray-100">Tips Melihat Virtual Tour</h3>
            <ul class="list-inside list-disc space-y-1 text-sm text-gray-600 dark:text-gray-400">
              <li>Gunakan koneksi internet yang stabil.</li>
              <li>Gerakkan mouse atau gunakan ponsel untuk menjelajahi panorama.</li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    function virtualTour(destinasi) {
      return {
        destinasi,
        selected: 0,
        viewer: null,
        started: false,

        select(i) {
          this.selected = i;
          this.started = false;
          if (this.viewer) {
            this.viewer.destroy();
            this.viewer = null;
          }
        },

        startTour() {
          this.started = true;

          this.$nextTick(() => {
            setTimeout(() => {
              let containerId = 'panorama-' + this.selected;
              let el = document.getElementById(containerId);
              if (!el) {
                console.error("Container tidak ditemukan:", containerId);
                return;
              }

              this.viewer = pannellum.viewer(containerId, {
                type: 'equirectangular',
                panorama: this.destinasi[this.selected].panorama,
                autoLoad: true,
                showZoomCtrl: true,
              });
            }, 100);
          });
        }
      }
    }
  </script>
@endpush
