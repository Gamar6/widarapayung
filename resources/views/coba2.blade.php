<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Section 3</title>
    @vite('./resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <!-- Layout head (opsional, taruh di layouts/app.blade.php) --> 
    <!-- Fonts --> 
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet"> 
    <!-- Alpine --> 
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> 
    <!-- resources/views/sections/virtual-360.blade.php --> 
    <section x-data="virtual360()" class="relative isolate text-white" style="font-family:'Montserrat', ui-sans-serif, system-ui;" > 
        <!-- Background --> 
        <div class="absolute inset-0 -z-10"> 
            <div class="h-full w-full bg-center bg-cover" style="background-image:url('{{ asset('img/hero.png') }}')"></div> 
            <div class="absolute inset-0 bg-black/50"></div> 
        </div> 
        <div class="container mx-auto px-4 py-16 sm:py-20 md:py-24"> 
            <!-- Heading --> 
            <div class="text-center max-w-3xl mx-auto"> 
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-wide drop-shadow-md" style="font-family:'Playfair Display', serif;"> 
                    Keindahan Dalam 360° 
                </h2> 
                <p class="mt-2 text-sm md:text-base text-white/85 font-semibold tracking-wide uppercase"> 
                    Nikmati Keindahan Alam dengan View 360° 
                </p> 
            </div>
            <!-- Mosaic Grid -->
<div class="mt-10 md:mt-12 grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-6 max-w-6xl mx-auto">
  <template x-for="(item, i) in slides[index].items" :key="i">
    <figure
      :class="itemClass(i)"
      class="relative group"
    >
      <img
        :src="item.src"
        :alt="item.label"
        class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.03]"
        loading="lazy"
      />
      <figcaption class="absolute bottom-0 left-0 right-0 p-3 text-sm font-semibold">
        <span class="inline-block px-2 py-1 rounded bg-black/40 ring-1 ring-white/20 backdrop-blur">
          <span x-text="item.label"></span>
        </span>
      </figcaption>
      <div class="pointer-events-none absolute inset-0 ring-1 ring-white/10 rounded-xl"></div>
    </figure>
  </template>
</div>

<!-- Controls + Title -->
<div class="mt-10 md:mt-12 max-w-5xl mx-auto">
  <div class="grid grid-cols-3 items-center">
    <button
      @click="prev"
      class="justify-self-start inline-flex items-center gap-2 text-white font-extrabold tracking-wider uppercase hover:text-white/90"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      Prev
    </button>

    <div class="text-center">
      <h3 class="text-xl md:text-2xl font-extrabold tracking-wide uppercase">
        <span x-text="slides[index].title"></span>
      </h3>
    </div>

    <button
      @click="next"
      class="justify-self-end inline-flex items-center gap-2 text-white font-extrabold tracking-wider uppercase hover:text-white/90"
    >
      Next
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>
  </div>

  <div class="mt-6 flex justify-center">
    <a href="#explore"
       class="inline-flex items-center justify-center px-8 py-3 border border-white/70 rounded-md uppercase tracking-wider font-semibold hover:bg-white/10 transition-colors">
      Explore Now
    </a>
  </div>
</div>
</div> 
</section> 
<script> 
function virtual360() 
{ return 
    { index: 0, 
    slides: [ { title: 'Pantai Widarapayung', items: [ { src: 'https://placehold.co/700x700?text=Spot+1', label: 'Spot 1' }, { src: 'https://placehold.co/1200x700?text=Spot+2', label: 'Spot 2' }, { src: 'https://placehold.co/1200x700?text=Spot+3', label: 'Spot 3' }, { src: 'https://placehold.co/700x700?text=Spot+4', label: 'Spot 4' }, ], }, { title: 'Pantai Widarapayung', items: [ { src: 'https://placehold.co/700x700?text=Spot+A', label: 'Spot A' }, { src: 'https://placehold.co/1200x700?text=Spot+B', label: 'Spot B' }, { src: 'https://placehold.co/1200x700?text=Spot+C', label: 'Spot C' }, { src: 'https://placehold.co/700x700?text=Spot+D', label: 'Spot D' }, ], }, ], prev() { this.index = (this.index - 1 + this.slides.length) % this.slides.length }, next() { this.index = (this.index + 1) % this.slides.length }, itemClass(i) { Mosaic layout mirip desain: 0 & 3 kotak, 1 & 2 wide return [ 'rounded-xl overflow-hidden bg-black/20 ring-1 ring-white/10', 'md:[&>img]:h-full md:[&>img]:w-full', i === 0 ? 'md:row-span-2 md:col-span-1 aspect-square' : i === 1 ? 'md:col-span-2 aspect-[16/9]' : i === 2 ? 'md:col-span-2 aspect-[16/9]' : 'md:row-span-2 md:col-span-1 aspect-square' ].join(' ') } } } </script>


</body>
</html>