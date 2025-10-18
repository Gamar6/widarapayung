@props([
    'name',
    'pertanyaan'
])

<div>
  <h3 class="font-bold text-gray-900 dark:text-gray-100">{{ $name }}</h3>
  <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $pertanyaan }}</p>
</div>