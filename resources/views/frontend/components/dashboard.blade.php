@php
    $dashboard = \App\Models\Dashboard::findOrFail(1);
@endphp

<section class="relative w-full h-[732px] bg-no-repeat"
    style="background-image: url('{{ $dashboard->banner_url }}'); background-size: 70% 100%; background-position: right center;"
    role="img" aria-label="{{ $dashboard->title }}">

    <!-- Overlay gradient putih + blur di kiri -->
    <div
        class="absolute inset-0 bg-gradient-to-r
from-white from-[0%]
via-white/90 via-[20%]
via-white/40 via-[60%]
to-transparent to-[100%]">
    </div>

    <!-- Layer blur khusus kiri -->
    <div class="absolute top-0 left-0 w-1/3 h-full backdrop-blur-md"></div>

    <!-- Konten -->
    <div class="relative container mx-auto h-full flex items-center">
        <div class="px-8 md:px-16 py-12 max-w-3xl">
            <h1 class="text-6xl font-bold text-blue-900 leading-snug mb-6">
                {{ $dashboard->title }}
            </h1>
            <p class="text-xl max-w-sm text-blue-900 mb-6">
                {{ $dashboard->content }}
            </p>
            <a href="#contact"
                class="inline-block bg-blue-900 text-white px-6 py-3 rounded-full font-medium hover:bg-blue-800 transition">
                Contact Us
            </a>
        </div>
    </div>
</section>
