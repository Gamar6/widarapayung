@props(['destinasi'])

<div class="rounded-lg bg-white p-4 shadow" x-data="{
    started: false,
    viewer: null,
    initPanorama() {
        console.log('Initializing panorama...');
        console.log('Panorama URL:', '{{ $destinasi['panorama'] }}');
        try {
            this.viewer = pannellum.viewer('panorama-{{ Str::slug($destinasi['nama']) }}', {
                type: 'equirectangular',
                panorama: '{{ $destinasi['panorama'] }}',
                autoLoad: true,
                showZoomCtrl: true,
                onError: function(err) {
                    console.error('Pannellum Error:', err);
                }
            });
        } catch (e) {
            console.error('Error initializing panorama:', e);
        }
    }
}">

  <!-- Preview sebelum Play -->
  <div class="relative mb-4 aspect-video overflow-hidden rounded-lg" x-show="!started">
    <img src="{{ $destinasi['gambar'] }}" class="h-full w-full object-cover">
    <button class="absolute inset-0 flex items-center justify-center bg-black/40 text-2xl font-bold text-white"
      @click="
                started = true;
                $nextTick(() => {
                    viewer = pannellum.viewer('panorama-{{ Str::slug($destinasi['nama']) }}', {
                        type: 'equirectangular',
                        panorama: '{{ $destinasi['panorama'] }}',
                        autoLoad: true,
                        showZoomCtrl: true,
                    });
                });
            ">
      ▶ Play
    </button>
  </div>

  <!-- Panorama Viewer setelah Play -->
  <div id="panorama-{{ Str::slug($destinasi['nama']) }}" class="h-[500px] w-full overflow-hidden rounded-lg"
    x-show="started"></div>

  <!-- Nama -->
  <h2 class="mb-1 mt-4 text-xl font-semibold">{{ $destinasi['nama'] }}</h2>
  <p class="mb-3 text-gray-600">{{ $destinasi['lokasi'] }}</p>

  <!-- Highlights -->
  <div class="mb-4 flex flex-wrap gap-2">
    @foreach ($destinasi['highlight'] as $h)
      <span class="rounded-full bg-orange-100 px-3 py-1 text-xs text-orange-600">{{ $h }}</span>
    @endforeach
  </div>

  <!-- Tombol -->
  <div class="flex flex-wrap gap-3">
    <button class="rounded-lg bg-blue-600 px-4 py-2 text-white"
      @click="
                started = true;
                $nextTick(() => {
                    initPanorama();
                });
            ">
      Mulai Virtual Tour
    </button>

    <button class="rounded-lg bg-gray-200 px-4 py-2 text-gray-700" @click="if(viewer) viewer.toggleFullscreen()">
      Mode Fullscreen
    </button>

    <button class="rounded-lg bg-yellow-500 px-4 py-2 text-white">Rating</button>
    <button class="rounded-lg bg-green-600 px-4 py-2 text-white">Bagikan</button>
  </div>
</div>
