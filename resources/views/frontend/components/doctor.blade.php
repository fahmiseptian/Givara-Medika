@php
use App\Models\Doctor;
use App\Models\DoctorPage;

$doctorPage = DoctorPage::first();
$doctors = Doctor::latest()->take(3)->get();
@endphp

<section class="bg-[#071752] py-16">
    <div class="container mx-auto max-w-7xl px-6 lg:px-10">
        <div class="relative">
            {{-- See more (kanan atas) --}}
            <a href="{{ Route::has('frontend.doctors.index') ? route('frontend.doctors.index') : '#'}}"
                class="absolute right-0 -top-2 hidden lg:flex items-center gap-2 text-white/90 hover:text-white">
                <span class="text-sm">See more</span>
                <span class="inline-grid place-items-center h-7 w-7 rounded-full border border-white/40">
                    <i class="bi bi-arrow-right"></i>
                </span>
            </a>

            <div class="grid grid-cols-12 gap-6 items-start">
                {{-- Kiri: judul & deskripsi --}}
                <div class="col-span-12 lg:col-span-4">
                    <p class="uppercase tracking-widest text-[11px] text-white/70 mb-3">Our Doctors</p>
                    <h2 class="text-white font-extrabold leading-tight text-3xl xl:text-4xl 2xl:text-[34px] mb-4">
                        {{ $doctorPage->headline ?? 'Your Headline or Tagline Here' }}
                    </h2>
                    <p class="text-white/80 text-sm md:text-base max-w-md">
                        {{ $doctorPage->description ?? 'Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas neque amet massa et parturient.' }}
                    </p>

                    <a href="#contact"
                        class="mt-8 inline-flex items-center rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-[#071752] hover:bg-gray-100">
                        Contact Us
                    </a>
                </div>

                {{-- Kanan: 3 kartu dokter --}}
                <div class="col-span-12 lg:col-span-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($doctors as $doctor)
                        @php
                        $photo = $doctor->getFirstMediaUrl('doctor_images') ?: asset('images/default-doctor.png');
                        @endphp
                        <article class="relative overflow-hidden rounded-xl bg-white shadow-sm">
                            <img src="{{ $photo }}" alt="{{ $doctor->name }}" class="h-80 w-full object-cover">
                            {{-- Gradient putih di bawah (seperti gambar) --}}
                            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-white via-white/80 to-transparent"></div>

                            <div class="absolute inset-x-0 bottom-0 px-4 pb-4">
                                <h3 class="text-[15px] font-semibold text-red-600"> {{ $doctor->name }} </h3>
                                <p class="mt-1 text-xs text-slate-600">
                                    {{ \Illuminate\Support\Str::limit($doctor->content, 70) }}
                                </p>
                            </div>
                        </article>
                        @empty
                        <div class="col-span-full text-center text-white/80">
                            Tidak ada dokter yang tersedia saat ini.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>