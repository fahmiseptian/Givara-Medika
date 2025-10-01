@php
    use App\Models\Doctor;
    use App\Models\DoctorContent;

    // Ambil konten halaman dokter dari DoctorContent
    $doctorContent = DoctorContent::first();
    $doctors = Doctor::latest()->get();
@endphp

<section class="container mx-auto md:px-12">
    <div class="min-h-screen bg-white pt-6">
        <div class="mx-auto max-w-6xl px-6 py-6">
            {{-- Bagian Header --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-6 animate-fadeInUp">
                <div class="max-w-xl">
                    <p class="text-xs uppercase tracking-widest text-slate-500 mb-3">Doctors</p>
                    <h1 class="text-4xl font-extrabold leading-tight text-red-700">
                        {{ $doctorContent->title ?? 'Judul Halaman Dokter' }}
                    </h1>
                    <p class="mt-4 text-md leading-relaxed text-slate-600">
                        {{ $doctorContent->description ?? 'Deskripsi halaman dokter di sini.' }}
                    </p>
                </div>
                <div>
                    <div class="mt-6 p-6 rounded-lg">
                        <p class="text-sm leading-relaxed text-slate-700">
                            {!! $doctorContent->content ?? 'Konten halaman dokter di sini.' !!}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Grid Doctors --}}
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse ($doctors as $doctor)
                    @php
                        $photo = $doctor->getFirstMediaUrl('doctor_images') ?: asset('images/default-doctor.png');
                    @endphp
                    <article class="relative overflow-hidden rounded-xl bg-white shadow-sm">
                        <img src="{{ $photo }}" alt="{{ $doctor->name }}" class="h-[380px] w-full object-cover">
                        {{-- Gradient putih di bawah (seperti gambar) --}}
                        <div
                            class="pointer-events-none absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-white via-white/80 to-transparent">
                        </div>

                        <div class="absolute inset-x-0 bottom-0 px-4 pb-4">
                            <h3 class="text-[15px] font-semibold text-red-600">{{ $doctor->name }}</h3>
                            <p class="mt-1 text-xs text-slate-600">
                                {{ \Illuminate\Support\Str::limit($doctor->content, 70) }}
                            </p>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center text-slate-500">
                        Tidak ada dokter yang tersedia saat ini.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
