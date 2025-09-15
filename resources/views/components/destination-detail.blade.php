@props(['destinasi'])

<div class="bg-white shadow rounded-lg p-4">
    <!-- Video -->
    <div class="aspect-video mb-4 rounded-lg overflow-hidden">
        <iframe class="w-full h-full" src="{{ $destinasi['video'] }}" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- Nama -->
    <h2 class="text-xl font-semibold mb-1">{{ $destinasi['nama'] }}</h2>
    <p class="text-gray-600 mb-3">{{ $destinasi['lokasi'] }}</p>

    <!-- Highlights -->
    <div class="flex flex-wrap gap-2 mb-4">
        @foreach($destinasi['highlight'] as $h)
            <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs">{{ $h }}</span>
        @endforeach
    </div>

    <!-- Tombol -->
    <div class="flex flex-wrap gap-3">
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Mulai Virtual Tour</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Tambah Favorit</button>
        <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Rating</button>
        <button class="px-4 py-2 bg-green-600 text-white rounded-lg">Bagikan</button>
    </div>
</div>
