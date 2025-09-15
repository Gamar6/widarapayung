@props(['nama', 'lokasi', 'gambar', 'active' => false])

<div class="flex items-center space-x-3 cursor-pointer p-2 rounded-md {{ $active ? 'bg-blue-100' : 'hover:bg-blue-50' }}">
    <img src="{{ $gambar }}" class="w-16 h-12 object-cover rounded-md">
    <div>
        <p class="font-medium text-sm">{{ $nama }}</p>
        <p class="text-xs text-gray-500">{{ $lokasi }}</p>
    </div>
</div>