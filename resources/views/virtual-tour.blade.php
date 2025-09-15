@extends('app')
@section('title', 'Virtual Tour')

@push('meta')
  <meta name="description"
    content="Jelajahi destinasi wisata melalui virtual tour interaktif kami. Nikmati pengalaman 360 derajat dari kenyamanan rumah Anda." />
@endpush

@section('content')
  {{-- Header Section --}}
  <header class="border-b bg-slate-50/70">
    <div class="container mx-auto px-4 py-10 text-center">
      <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl">Virtual Tour</h1>
      <p class="mx-auto mt-3 max-w-2xl text-gray-600">Nikmati pengalaman 360 derajat dari kenyamanan rumah Anda.</p>
    </div>
  </header>
    <div class="max-w-7xl mx-auto px-4 py-10"
     x-data="virtualTour({{ json_encode($destinasi) }})">

    <div class="grid grid-cols-12 gap-6">
        <!-- Sidebar -->
        <div class="col-span-3 bg-white shadow rounded-lg p-4">
            <h2 class="font-semibold mb-4">Pilih Destinasi</h2>
            <div class="space-y-3">
                <template x-for="(d, i) in destinasi" :key="i">
                    <div
                        class="flex items-center space-x-3 cursor-pointer p-2 rounded-md transition"
                        :class="i === selected ? 'bg-blue-100' : 'hover:bg-blue-50'"
                        @click="select(i)"
                    >
                        <img :src="d.gambar" class="w-16 h-12 object-cover rounded-md">
                        <div>
                            <p class="font-medium text-sm" x-text="d.nama"></p>
                            <p class="text-xs text-gray-500" x-text="d.lokasi"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Detail -->
        <div class="col-span-9">
            <div class="bg-white shadow rounded-lg p-4">
                
                <!-- Preview (sebelum Play) -->
                <div class="aspect-video mb-4 rounded-lg overflow-hidden relative" x-show="!started">
                    <img :src="destinasi[selected].gambar" class="w-full h-full object-cover">
                    <button
                        class="absolute inset-0 flex items-center justify-center bg-black/40 text-white text-3xl font-bold"
                        @click="startTour()"
                    >
                        ▶ Play
                    </button>
                </div>

                <!-- Panorama Viewer (setelah Play) -->
                <div :id="'panorama-' + selected"
                     class="w-full h-[500px] rounded-lg overflow-hidden"
                     x-show="started"></div>

                <!-- Nama & Lokasi -->
                <h2 class="text-xl font-semibold mt-4 mb-1" x-text="destinasi[selected].nama"></h2>
                <p class="text-gray-600 mb-3" x-text="destinasi[selected].lokasi"></p>

                <!-- Highlights -->
                <div class="flex flex-wrap gap-2 mb-4">
                    <template x-for="h in destinasi[selected].highlight" :key="h">
                        <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs" x-text="h"></span>
                    </template>
                </div>

                <!-- Tombol -->
                <div class="flex flex-wrap gap-3">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg"
                        @click="startTour()">
                        Mulai Virtual Tour
                    </button>

                    <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg"
                        @click="if(viewer) viewer.toggleFullscreen()">
                        Mode Fullscreen
                    </button>

                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Rating</button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg">Bagikan</button>
                </div>
            </div>

            <!-- Tips -->
            <div class="mt-6 bg-white shadow rounded-lg p-4">
                <h3 class="font-semibold mb-3">Tips Melihat Virtual Tour</h3>
                <ul class="list-disc list-inside text-gray-600 space-y-1 text-sm">
                    <li>Gunakan koneksi internet yang stabil.</li>
                    <li>Aktifkan mode layar penuh untuk pengalaman maksimal.</li>
                    <li>Gerakkan mouse atau gunakan ponsel untuk menjelajahi panorama.</li>
                </ul>
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

                    // pastikan container ada
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
                }, 100); // kasih jeda 100ms
            });
        }
    }
}
</script>
@endpush
