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
      <p class="mx-auto mt-3 max-w-2xl text-gray-600">Kami menerima kritik dan saran dari Anda</p>
    </div>
  </header>

  {{-- Main Content --}}
  <main>
    {{-- Contact Form & Info Section --}}

    <section class="container mx-auto px-4 my-16" id="contact-form-section">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        {{-- Contact Form --}}
        <div>
          <div class="mx-auto max-w-3xl rounded-lg bg-white p-8 shadow-2xl">
            <div class="mb-6">
              <h2 class="text-2xl font-bold text-gray-900">Kirim Pesan</h2>
              <p class="mt-2 text-gray-600">Kritik dan saranmu sangat berarti bagi kami!</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
              @csrf

              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" required
                  class="bg-inputcolor/15 focus:border-inputcolor focus:ring-inputcolor mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm sm:text-sm">
              </div>

              <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                  class="bg-inputcolor/15 focus:border-inputcolor focus:ring-inputcolor mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm sm:text-sm">
              </div>

              <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                <textarea name="message" id="message" rows="4" required
                  class="bg-inputcolor/15 focus:border-inputcolor focus:ring-inputcolor mt-1 block w-full rounded-md border-gray-300 px-3 py-2 shadow-sm sm:text-sm"></textarea>
              </div>

              <button type="submit"
                class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                Kirim Pesan
              </button>
            </form>
          </div>
        </div>

        {{-- Contact Information --}}
        <div>
          <x-info-card
            icon="img/icon-loc.svg"
            title="Alamat"
            :description="[
              'Widarapayung Wetan, Sawah, Ladang, Sidayu',
              'Kec. Binangun, Kabupaten Cilacap, Jawa Tengah 53281',
            ]"
          />

          <x-info-card
            icon="img/icon-telp.svg"
            title="Telepon"
            :description="[
              '+62 813 2758 1412'
            ]"
          />

          <x-info-card
            icon="img/icon-ig.svg"
            title="Instagram"
            :description="['@pantaiindahwidarapayung_']"
            link="https://www.instagram.com/pantaiindahwidarapayung_/"
          />

          <x-info-card
            icon="img/icon-opr.svg"
            title="Oprasional"
            :description="[
              'Senin - Jumat: 08:00 - 17:00',
              'Sabtu - Minggu: 07:00 - 18:00',
            ]"
          />

          {{-- Google Maps --}}
          <div class="mx-auto mt-4 max-w-3xl rounded-lg bg-white p-8 shadow-2xl">
            <h2 class="text-2xl font-bold text-gray-900">Lokasi Kami</h2>
            <div class="mt-4">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.1160933372953!2d109.26389193515374!3d-7.698438457324463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e653f43ea3e7c15%3A0xd55bcf745515ee69!2sPantai%20Widarapayung!5e0!3m2!1sid!2sid!4v1757953313951!5m2!1sid!2sid"
                width="100%" height="300" style="border:0;" allowfullscreen loading="lazy">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </section>


    {{-- FAQ Section --}}

    <section class="container mx-auto px-4 my-16">
      <h2 class="text-center text-2xl font-bold text-gray-900 mb-10">Pertanyaan yang Sering Diajukan</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div class="space-y-6">
          <x-pertanyaan
            name="Di Pantai Widarapayung apakah memiliki makanan/camilan khas daerahnya?"
            pertanyaan="Ya, di Pantai Widarapayung terdapat beberapa makanan/camilan khas daerah seperti mendoan kasur, steak undur-undur laut, dan lain-lain."
          />
          <x-pertanyaan
            name="Apakah bisa camping di Pantai Widarapayung?"
            pertanyaan="Ya, pengunjung diperbolehkan untuk camping di area yang telah disediakan dengan mengikuti aturan yang berlaku."
          />
        </div>

        <div class="space-y-6">
          <x-pertanyaan
            name="Apakah toiletnya bersih?"
            pertanyaan="Tentu Saja, toiletnya bersih dan terawat."
          />
          <x-pertanyaan
            name="Apakah diperbolehkan berenang di pantai?"
            pertanyaan="Tentu, pengunjung diperbolehkan berenang, berselancar di area yang telah ditentukan. Namun, selalu perhatikan kondisi ombak dan ikuti petunjuk dari petugas keamanan pantai."
          />
        </div>

      </div>
    </section>

  </main>
@endsection