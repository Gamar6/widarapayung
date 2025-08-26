@extends('app')
@section('title', 'Hubungi Kami')

@push('meta')
  <meta name="description"
    content="Profil destinasi wisata: info lokasi, jam buka, tiket, fasilitas, aktivitas, dan tur virtual.">
@endpush

@section('content')
  {{-- Header Section --}}
  <header class="border-b bg-slate-50/70">
    <div class="container mx-auto px-4 py-10 text-center">
      <h1 class="text-3xl font-[Playfair_Display] font-bold md:text-4xl">Hubungi Kami</h1>
      <p class="mx-auto mt-3 max-w-2xl text-gray-600">Lorem ipsum dolor sit amet consectetur adipiscing.</p>
    </div>
  </header>

  <main>
    {{-- Contact Form and Info Section --}}
    <section class="mb-16" id="contact-form-section">
      <div class="grid grid-cols-2 gap-4 p-8">
        {{-- Contact Form --}}
        <div class="contact-form">
          <div class="mx-auto max-w-3xl rounded-lg bg-white p-8 shadow-2xl">
            <div class="mb-6">
              <h2 class="text-2xl font-bold text-gray-900">Kirim Pesan</h2>
              <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
              @csrf
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" required
                  class="bg-inputcolor/15 focus-border-inputcolor/100 focus:ring-inputcolor/100 mt-1 block w-full rounded-md border-gray-300 px-2 py-3 shadow-sm sm:text-sm">
              </div>

              <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                  class="bg-inputcolor/15 focus-border-inputcolor/100 focus:ring-inputcolor/100 mt-1 block w-full rounded-md border-gray-300 px-2 py-3 shadow-sm sm:text-sm">
              </div>

              <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                <textarea name="message" id="message" rows="4" required
                  class="bg-inputcolor/15 focus-border-inputcolor/100 focus:ring-inputcolor/100 mt-1 block w-full rounded-md border-gray-300 px-2 py-5 shadow-sm sm:text-sm"></textarea>
              </div>

              <button type="submit"
                class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Kirim Pesan
              </button>
            </form>
          </div>
        </div>

        {{-- Contact Information --}}
        <div class="contact-info">
          <x-info-card icon="img/icon-loc.svg" title="Alamat" :description="[
              'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
              'Quasi, officia porro alias sit maxime facere.',
          ]" />

          <x-info-card icon="img/icon-telp.svg" title="Telepon" :description="['+62 888 888', '+62 999 999']" />

          <x-info-card icon="img/icon-email.svg" title="Email" :description="['infowisata@domain.id', 'booking@domain.id']" />

          <x-info-card icon="img/icon-opr.svg" title="Oprasional" :description="['Senin - Jumat: 08:00 - 17:00', 'Sabtu - Minggu: 07:00 - 18:00']" />

          {{-- Google Maps Location --}}
          <div class="mx-auto mt-4 max-w-3xl rounded-lg bg-white p-8 shadow-2xl">
                <h2 class="text-2xl font-bold text-gray-900">Lokasi Kami</h2>
                <div class="mt-4">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15816.066670735186!2d109.21770863955078!3d-7.697721899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e653f68d10b1755%3A0x165e097613b7f8df!2sPantai%20Widarapayung!5e0!3m2!1sen!2sid!4v1693026427045!5m2!1sen!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded-lg">
                  </iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- FAQ Section --}}
    <section class="mx-24 mb-16 rounded-lg bg-white shadow-2xl">
      <h2 class="pt-8 text-center text-2xl font-bold text-gray-900">Pertanyaan yang Sering Diajukan</h2>
      <div class="grid grid-cols-2 gap-8 p-16">
        <div class="space-y-6">
          <div>
            <x-pertanyaan name="Lorem ipsum dolor sit amet." pertanyaan="Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione aliquid numquam ex veniam sapiente cum." />
          </div>
            <x-pertanyaan name="Lorem ipsum dolor sit amet." pertanyaan="Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione aliquid numquam ex veniam sapiente cum." />
          </div>

        <div class="space-y-6">
          <x-pertanyaan name="Lorem ipsum dolor sit amet." pertanyaan="Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione aliquid numquam ex veniam sapiente cum." />
          <x-pertanyaan name="Lorem ipsum dolor sit amet." pertanyaan="Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione aliquid numquam ex veniam sapiente cum." />
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
