@php
    use App\Models\aboutus;
    $dashboard = \App\Models\Dashboard::findOrFail(1);
    $aboutus = App\Models\aboutus::findOrFail(1); // Mengambil data About Us dengan ID 1
@endphp
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
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen class="w-full h-full">
                </iframe>
            </div>
        @endif
    </div>
</section>
