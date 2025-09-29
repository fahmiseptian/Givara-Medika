@php
    /** @var \App\Models\Dashboard $dashboard */
    $dashboard = \App\Models\Dashboard::findOrFail(1);
@endphp

<section
    class="relative w-full
            min-h-[38vh] sm:min-h-[44vh] lg:min-h-[52vh] xl:min-h-[60vh]
            bg-no-repeat
            bg-cover sm:bg-[length:82%_100%] md:bg-[length:70%_100%] lg:bg-[length:60%_100%]
            bg-center sm:bg-right"
    style="background-image:url('{{ $dashboard->banner_url }}')" role="img" aria-label="{{ $dashboard->title }}">

    {{-- Overlay untuk kontras teks --}}
    <div
        class="pointer-events-none absolute inset-0 
                bg-gradient-to-r 
                from-white/95 from-[0%] 
                via-white/80 via-[40%] 
                to-transparent to-[100%] 
                backdrop-blur-[4px]
                w-full sm:w-[55%]">
    </div>

    {{-- Konten --}}
    <div class="relative mx-auto h-full container">
        <div class="flex h-full items-center">
            <div class="px-4 sm:px-6 lg:px-8 py-6 md:py-8 max-w-xl md:max-w-2xl mt-0 md:mt-20">
                <p class="mb-3 text-xs tracking-widest uppercase text-blue-900/70">Welcome</p>

                <h1
                    class="text-blue-900 font-extrabold leading-tight
                           text-3xl sm:text-4xl md:text-5xl lg:text-6xl mb-4">
                    {{ $dashboard->title }}
                </h1>

                <p
                    class="text-blue-900/90
                          text-sm sm:text-base md:text-lg lg:text-xl
                          max-w-md md:max-w-lg mb-6">
                    {{ $dashboard->content }}
                </p>

                <a href="https://wa.me/{{ $setting->wa_number }}?text=Halo%20saya%20ingin%20bertanya%20tentang%20layanan%20Anda" target="_blank" rel="noopener"
                    class="inline-flex items-center justify-center
                          rounded-full bg-blue-900 text-white
                          px-5 py-2.5 sm:px-6 sm:py-3
                          text-sm sm:text-base font-semibold
                          shadow hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
