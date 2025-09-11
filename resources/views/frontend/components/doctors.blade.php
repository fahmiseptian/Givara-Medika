<section class="container mx-auto md:px-12">
    <div class="min-h-screen bg-white pt-6">
        <div class="mx-auto max-w-6xl px-6 py-6">
            {{-- Bagian Header --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-6">
                <div class="max-w-xl">
                    <p class="text-xs uppercase tracking-widest text-slate-500 mb-3">Doctors</p>
                    <h1 class="text-4xl font-extrabold leading-tight text-red-700">
                        {{ $doctorPage->headline ?? 'Your Headline or Tagline Here' }}
                    </h1>
                    <p class="mt-4 text-md leading-relaxed text-slate-600">
                        {{ $doctorPage->description ?? 'Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas neque amet massa et parturient.' }}
                    </p>
                </div>
                <div>
                    <div class="mt-6 p-6 rounded-lg">
                        <p class="text-sm leading-relaxed text-slate-700">
                            Lorem ipsum dolor sit amet consectetur. Dignissim molestie mi arcu in fermentum in nulla
                            non.
                            Turpis consequat eleifend est mattis netus duis mattis aenean tellus. Mauris rhoncus risus
                            convallis in ultricies ac accumsan tellus.
                        </p>
                        <p class="mt-4 text-sm leading-relaxed text-slate-700">
                            Mi tellus porttitor quam turpis. Pharetra fringilla ac ut ultricies a id tempor egestas.
                            Nisl
                            dictum ut nunc urna. Diam et varius ac bibendum lacus nisl tristique nunc.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Grid Doctors --}}
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach (range(1, 8) as $i)
                    <article class="relative overflow-hidden rounded-xl bg-white shadow-sm">
                        <img src="http://127.0.0.1:8000/storage/10/WhatsApp-Image-2025-09-08-at-22.59.20_bcadeb4e.jpg"
                            alt="1" class="h-80 w-full object-cover">
                        {{-- Gradient putih di bawah (seperti gambar) --}}
                        <div
                            class="pointer-events-none absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-white via-white/80 to-transparent">
                        </div>

                        <div class="absolute inset-x-0 bottom-0 px-4 pb-4">
                            <h3 class="text-[15px] font-semibold text-red-600"> Doctor’s Name</h3>
                            <p class="mt-1 text-xs text-slate-600">
                                Lorem ipsum dolor sit amet consectetur.
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
