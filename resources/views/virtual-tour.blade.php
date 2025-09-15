@extends('app')
@section('title', 'Virtual Tour')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-10" 
         x-data="{ 
            destinasi: {{ json_encode($destinasi) }}, 
            selected: 0 
         }">

        <h1 class="text-3xl font-bold text-center mb-2">Virtual Tour</h1>
        <p class="text-gray-600 text-center mb-8">Lorem ipsum dolor sit amet consectetur adipisicing.</p>

        <div class="grid grid-cols-12 gap-6">
            <!-- Sidebar -->
            <div class="col-span-3 bg-white shadow rounded-lg p-4">
                <h2 class="font-semibold mb-4">Pilih Destinasi</h2>
                <div class="space-y-3">
                    <template x-for="(d, i) in destinasi" :key="i">
                        <div 
                            class="flex items-center space-x-3 cursor-pointer p-2 rounded-md"
                            :class="i === selected ? 'bg-blue-100' : 'hover:bg-blue-50'"
                            @click="selected = i">
                            
                            <img :src="d.gambar" class="w-16 h-12 object-cover rounded-md">
                            <div>
                                <p class="font-medium text-sm" x-text="d.nama"></p>
                                <p class="text-xs text-gray-500" x-text="d.lokasi"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-span-9">
                <div class="bg-white shadow rounded-lg p-4">
                    <!-- Video -->
                    <div class="aspect-video mb-4 rounded-lg overflow-hidden">
                        <iframe class="w-full h-full" 
                                :src="destinasi[selected].video" 
                                frameborder="0" allowfullscreen></iframe>
                    </div>

                    <!-- Nama & Lokasi -->
                    <h2 class="text-xl font-semibold mb-1" x-text="destinasi[selected].nama"></h2>
                    <p class="text-gray-600 mb-3" x-text="destinasi[selected].lokasi"></p>

                    <!-- Highlights -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <template x-for="h in destinasi[selected].highlight" :key="h">
                            <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs" x-text="h"></span>
                        </template>
                    </div>

                    <!-- Tombol -->
                    <div class="flex flex-wrap gap-3">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Mulai Virtual Tour</button>
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Tambah Favorit</button>
                        <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Rating</button>
                        <button class="px-4 py-2 bg-green-600 text-white rounded-lg">Bagikan</button>
                    </div>
                </div>

                <!-- Tips -->
                <div class="mt-6 bg-white shadow rounded-lg p-4">
                    <h3 class="font-semibold mb-3">Tips Melihat Virtual Tour</h3>
                    <ul class="list-disc list-inside text-gray-600 space-y-1 text-sm">
                        <li>Gunakan koneksi internet yang stabil.</li>
                        <li>Gunakan layar penuh untuk pengalaman maksimal.</li>
                        <li>Gunakan headset untuk kualitas audio lebih baik.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
