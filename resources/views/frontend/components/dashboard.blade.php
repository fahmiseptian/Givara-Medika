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
    style="background-image:url('{{ $dashboard->banner_url }}')"
    role="img" aria-label="{{ $dashboard->title }}">
    {{-- Overlay untuk kontras teks (lebih kuat di mobile) --}}
    <div class="pointer-events-none absolute inset-0
                bg-white/60 sm:bg-gradient-to-r sm:from-white sm:from-[0%]
                sm:via-white/70 sm:via-[18%]
                sm:via-white/30 sm:via-[55%]


                sm:to-transparent sm:to-[100%]">
    </div>

    {{-- Blur lembut sisi kiri (hanya md+) --}}
    <div class="pointer-events-none absolute top-0 left-0 h-full w-1/3 backdrop-blur-md hidden md:block"></div>

    {{-- Konten --}}
    <div class="relative mx-auto h-full container">
        <div class="flex h-full items-center">
            <div class="px-4 sm:px-6 lg:px-8 py-6 md:py-8 max-w-xl md:max-w-2xl">
                <p class="mb-3 text-xs tracking-widest uppercase text-blue-900/70">Welcome</p>

                <h1 class="text-blue-900 font-extrabold leading-tight
                           text-3xl sm:text-4xl md:text-5xl lg:text-6xl mb-4">
                    {{ $dashboard->title }}
                </h1>

                <p class="text-blue-900/90
                          text-sm sm:text-base md:text-lg lg:text-xl
                          max-w-md md:max-w-lg mb-6">
                    {{ $dashboard->content }}
                </p>

                <a href="#contact"
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