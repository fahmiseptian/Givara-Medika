@php
    $setting = setting();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    dark: localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
}" :class="{ 'dark': dark }">

<head>
    @include('layouts.partials.css')
</head>

<body class="font-sans antialiased bg-white">
    @include('frontend.components.navbar')
    @include('frontend.components.dashboard')
    @include('frontend.components.headline')
    @include('frontend.components.aboutus')

    @php
        use App\Models\Doctor;
        use App\Models\DoctorPage;
        $doctorPage = DoctorPage::first();
        $doctors = Doctor::latest()->take(3)->get();
    @endphp

    <section class="bg-blue-900 py-24 px-6 md:px-12">
            <div class="container mx-auto">
            <div class="flex justify-between items-center mb-8">
                <span class="text-white uppercase text-sm tracking-wide">Our Doctors</span>
                {{-- Asumsi ada route 'frontend.doctors.index' untuk melihat semua dokter. Jika tidak ada, tautan akan mengarah ke '#' --}}
                <a href="#" class="flex items-center text-white hover:underline">
                    See more <i class="bi bi-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 items-start">
                <!-- Kolom kiri (headline + text dari DoctorPage) -->
                <div class="flex flex-col justify-center">
                    {{-- Mengambil headline dari objek $doctorPage. Jika tidak ada, gunakan teks default. --}}
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-snug">
                        {{ $doctorPage->headline ?? 'Your Headline or Tagline Here' }}
                    </h2>
                    {{-- Mengambil deskripsi dari objek $doctorPage. Jika tidak ada, gunakan teks default. --}}
                    <p class="text-gray-300 mb-20">
                        {{ $doctorPage->description ?? 'Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas neque amet massa et parturient.' }}
                    </p>
                    <a href="#contact"
                        class="inline-block bg-white text-blue-900 px-4 py-3 rounded-full font-medium hover:bg-gray-100 transition w-50 mt-auto text-center">
                        Contact Us
                    </a>
                </div>

                {{-- Loop untuk menampilkan dokter dari koleksi $doctors --}}
                @forelse ($doctors as $doctor)
                    <div class="relative bg-white rounded-xl shadow overflow-hidden w-full h-96 bg-cover bg-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
                        style="background-image: url('{{ $doctor->getFirstMediaUrl('doctor_images') ?: asset('images/default-doctor.png') }}');">
                        <div
                            class="absolute bottom-0 left-0 right-0 h-2/5 bg-gradient-to-t from-white via-white/70 to-transparent p-4 flex flex-col justify-end">
                            {{-- Menampilkan nama dokter --}}
                            <h3 class="text-lg font-semibold text-red-600">{{ $doctor->name }}</h3>
                            {{-- Menampilkan deskripsi dokter, dibatasi hingga 50 karakter --}}
                            <p class="text-gray-600 text-sm mt-1">{{ Str::limit($doctor->content, 50) }}</p>
                        </div>
                    </div>
                @empty
                    {{-- Pesan jika tidak ada dokter yang tersedia --}}
                    <div class="col-span-full text-center text-gray-300">
                        Tidak ada dokter yang tersedia saat ini.
                    </div>
                @endforelse
            </div>
        </div>
    </section>



    @include('layouts.partials.js')

</body>

</html>
