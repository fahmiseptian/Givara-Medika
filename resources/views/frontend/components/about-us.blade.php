@php
    // Ambil data dari model AboutusPage
    use App\Models\AboutusPage;
    $aboutus = \App\Models\AboutusPage::first();
@endphp

@if ($aboutus)
    <section class="container mx-auto md:px-12 animate-fadeInUp">
        <div class="min-h-screen bg-white pt-6">
            <div class="mx-auto max-w-6xl px-6 py-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-6">
                    {{-- Kolom Kiri (Text) --}}
                    <div class="max-w-xl">
                        <p class="text-xs uppercase tracking-widest text-slate-500 mb-3">About Us</p>
                        <h1 class="text-4xl font-extrabold leading-tight text-red-700">
                            {{ $aboutus->title }}
                        </h1>
                        <div class="mt-4 text-md prose leading-relaxed text-slate-600">
                            {!! $aboutus->content !!}
                        </div>
                    </div>

                    {{-- Kolom Kanan (Gambar) --}}
                    <div class="flex flex-col gap-6">
                        <img src="{{ $aboutus->banner_url }}" alt="Banner About Us"
                            class="rounded-lg shadow object-cover w-full h-56 md:h-64">

                        <div class="max-w-xl mt-4">
                            <div class="mt-4 text-md prose leading-relaxed text-slate-600">
                                {!! $aboutus->vision_and_mission !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
