<div>
  <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
</div>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Wisata Pantai - Akomodasi & Destinasi Terbaik</title>
  <meta name="description"
    content="Jelajahi wisata pantai, akomodasi, dan destinasi pilihan dengan tampilan modern dan responsif." />
  <link rel="canonical" href="{{ url()->current() }}" />
  <meta property="og:title" content="Wisata Pantai" />
  <meta property="og:description" content="Akomodasi & destinasi pilihan untuk liburan Anda." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@500;700&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Alpine.js (CDN) -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <style>
    /* Font defaults + small utilities using Tailwind layers */
    @layer base {

      html,
      body {
        font-family: 'Montserrat', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif;
      }
    }

    @layer utilities {
      .font-playfair {
        font-family: 'Playfair Display', Georgia, 'Times New Roman', serif;
      }

      @keyframes wheel {
        0% {
          opacity: 0;
          transform: translate(-50%, 0);
        }

        30% {
          opacity: 1;
        }

        100% {
          opacity: 0;
          transform: translate(-50%, 16px);
        }
      }

      .animate-wheel {
        animation: wheel 1.6s ease-in-out infinite;
      }
    }
  </style>
</head>

<body class="bg-white text-gray-900 antialiased">
  @include('components.navbar')
  <main>
    @yield('content')
  </main>
  @include('components.footer')
</body>

</html>
