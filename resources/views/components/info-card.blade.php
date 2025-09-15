@props([
    'icon',
    'title',
    'description' => [],
    'link' => null, // optional, kalau mau icon/teks bisa klik
])

<div class="mx-auto max-w-3xl shadow-2xl p-8 bg-white rounded-lg mt-4 mb-4">
  <div class="flex items-start gap-4">
    
    {{-- Icon Bulat --}}
    <div class="flex-shrink-0">
      @if($link)
        <a href="{{ $link }}" target="_blank" rel="noopener noreferrer">
          <img src="{{ $icon }}" alt="icon {{ strtolower($title) }}" class="w-12 h-12 object-contain rounded-full">
        </a>
      @else
        <img src="{{ $icon }}" alt="icon {{ strtolower($title) }}" class="w-12 h-12 object-contain rounded-full">
      @endif
    </div>

    {{-- Konten --}}
    <div>
      <h2 class="text-2xl font-bold text-gray-900">{{ $title }}</h2>
      @foreach($description as $desc)
        @if($link)
          <p class="mt-2 text-gray-600">
            <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="hover:underline">
              {{ $desc }}
            </a>
          </p>
        @else
          <p class="mt-2 text-gray-600">{{ $desc }}</p>
        @endif
      @endforeach
    </div>
  </div>
</div>
