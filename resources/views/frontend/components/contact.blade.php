@php
/** @var \App\Models\Dashboard $dashboard */
$dashboard = \App\Models\Dashboard::findOrFail(1);
$contactus = \App\Models\contactus::findOrFail(1);
@endphp

<section
    class="relative w-full
            h-full sm:min-h-[44vh] lg:min-h-[52vh] xl:min-h-[60vh]
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

    <div class="relative container mx-auto px-6 py-16">
        {{-- Bagian Heading --}}
        <div class="max-w-xl mb-10">
            <p class="uppercase text-xs tracking-widest font-semibold text-blue-900/70 mb-3">
                Contact
            </p>
            <h2 class="text-3xl md:text-5xl font-extrabold text-blue-900 mb-4">
                {{ $contactus->title }}
            </h2>
            <p class="text-blue-900/90 text-base md:text-lg">
                {{ $contactus->content }}
            </p>
        </div>
    </div>
</section>