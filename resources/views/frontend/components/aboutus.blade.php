@php
use App\Models\aboutus;
$dashboard = \App\Models\Dashboard::findOrFail(1);
$aboutus = App\Models\aboutus::findOrFail(1); // Mengambil data About Us dengan ID 1
@endphp
<section class="container mx-auto py-16 px-6 md:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        <!-- Kolom Kiri (Foto) -->
        <div class="grid grid-cols-2 gap-4">
            <!-- Banner 1 (tinggi penuh kiri) -->
            <div class="row-span-2">
                <img src="{{ $aboutus->banner1_url }}" alt="About 1"
                    class="w-full h-full object-cover rounded-bl-[70px] shadow">
            </div>

            <!-- Banner 2 (kanan atas) -->
            <div>
                <img src="{{ $aboutus->banner2_url }}" alt="About 2"
                    class="w-full h-full object-cover rounded-tr-[70px] shadow">
            </div>

            <!-- Banner 3 (kanan bawah) -->
            <div>
                <img src="{{ $aboutus->banner3_url }}" alt="About 3" class="w-full h-full object-cover shadow">
            </div>
        </div>


        <!-- Kolom Kanan (Konten) -->
        <div class="max-w-3xl">
            <!-- Subheading -->
            <p class="uppercase tracking-widest text-sm font-semibold text-gray-500 mb-3">
                About Us
            </p>

            <!-- Title -->
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-red-700 leading-tight mb-4">
                {{ $aboutus->title }}
            </h2>

            <!-- Content -->
            <p class="text-gray-600 text-base sm:text-lg md:text-xl mb-8 leading-relaxed">
                {{ $aboutus->content }}
            </p>

            <!-- Feature List -->
            <ul class="space-y-5">
                @foreach (range(1, 4) as $i)
                @php
                $text = $aboutus->{'text'.$i} ?? null;
                $icon = $aboutus->{'icon'.$i} ?? null;
                @endphp
                @if ($text)
                <li class="flex items-start gap-4">
                    <div
                        class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full
                               bg-gradient-to-br from-blue-800 to-blue-600
                               text-white shadow-md">
                        <i class="{{ $icon ?? 'bi bi-check-lg' }} text-xl"></i>
                    </div>
                    <p class="text-gray-800 text-base sm:text-lg font-medium leading-snug">
                        {{ $text }}
                    </p>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</section>

<!-- Our Video Section -->
<section class="container mx-auto max-w-7xl px-6 lg:px-10 py-16">
    <div class="text-center mb-10">
        <p class="uppercase tracking-widest text-sm font-semibold text-gray-500 mb-2">
            Our Video
        </p>

        <!-- Title -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-red-700 leading-tight mb-4">
            {{ $dashboard->title_vidio }}
        </h2>

        <!-- Content -->
        <p class="text-gray-600 text-base sm:text-lg md:text-xl mb-8 leading-relaxed">
            {{ $dashboard->content_vidio }}
        </p>
    </div>
    <div class="flex justify-center">
        @if (!empty($dashboard->video_url))
        <div class="w-full max-w-3xl aspect-video rounded-xl overflow-hidden shadow-lg border border-gray-200">
            <video controls class="w-full h-full bg-black rounded-xl">
                <source src="{{ $dashboard->video_url }}" type="video/mp4">
                Browser Anda tidak mendukung pemutaran video.
            </video>
        </div>
        @else
        <div class="w-full max-w-3xl aspect-video rounded-xl overflow-hidden shadow-lg border border-gray-200">
            <iframe
                src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
                class="w-full h-full">
            </iframe>
        </div>
        @endif
    </div>
</section>