<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
</div>

@props([
    'icon',
    'title',
    'description' => []
])

<div class="mx-auto max-w-3xl shadow-2xl p-8 bg-white rounded-lg mt-4 mb-4">
  <div class="flex items-start gap-4">
    <img src="{{ $icon }}" alt="icon {{ strtolower($title) }}" class="w-12 h-12">
    <div>
      <h2 class="text-2xl font-bold text-gray-900">{{ $title }}</h2>
      @foreach($description as $desc)
        <p class="mt-2 text-gray-600">{{ $desc }}</p>
      @endforeach
    </div>
  </div>
</div>
