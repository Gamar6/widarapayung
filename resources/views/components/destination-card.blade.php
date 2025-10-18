@props(['nama', 'lokasi', 'gambar', 'active' => false])

<div 
  {{ $attributes->merge([
    'class' => 'flex items-center space-x-3 cursor-pointer p-2 rounded-md ' . 
      ($active 
        ? 'bg-blue-100 dark:bg-blue-900' 
        : 'hover:bg-blue-50 dark:hover:bg-blue-800')
  ]) }}
>
    <img src="{{ $gambar }}" alt="{{ $nama }}" class="w-16 h-12 object-cover rounded-md">
    <div>
        <p class="font-medium text-sm text-gray-900 dark:text-gray-100">{{ $nama }}</p>
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $lokasi }}</p>
    </div>
</div>
