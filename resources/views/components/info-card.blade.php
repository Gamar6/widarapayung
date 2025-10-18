@props([
  'icon',
  'title',
  'description' => [],
  'link' => null,
])

<div class="mx-auto max-w-3xl shadow-2xl p-8 bg-white dark:bg-gray-800/25 dark:hover:shadow-lg dark:hover:shadow-blue-950/50 rounded-lg mb-4">
  <div class="flex items-start gap-4">
    
    {{-- Icon Bulat --}}
    <div class="flex-shrink-0">
      @if($link)
        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="inline-block">
          <img src="{{ $icon }}" alt="icon {{ strtolower($title) }}" class="w-12 h-12 object-contain rounded-full">
        </a>
      @else
        <img src="{{ $icon }}" alt="icon {{ strtolower($title) }}" class="w-12 h-12 object-contain rounded-full">
      @endif
    </div>

    {{-- Konten --}}
    <div>
      <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $title }}</h2>
      @foreach($description as $desc)
        @if($link)
          <p class="mt-2 text-gray-600 dark:text-gray-300">
            <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="hover:underline">
              {{ $desc }}
            </a>
          </p>
        @else
          <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $desc }}</p>
        @endif
      @endforeach
    </div>
  </div>
</div>
