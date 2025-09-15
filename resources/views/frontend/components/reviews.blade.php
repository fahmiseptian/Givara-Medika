@php
/** @var \App\Models\Dashboard $dashboard */
$dashboard = \App\Models\Dashboard::findOrFail(1);
@endphp

<section
    class="relative w-full
            h-screen sm:min-h-[44vh] lg:min-h-[52vh] xl:min-h-[60vh]
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
                Review
            </p>
            <h2 class="text-3xl md:text-5xl font-extrabold text-blue-900 mb-4">
                Your Headline
            </h2>
            <p class="text-blue-900/90 text-base md:text-lg">
                Lorem ipsum dolor sit amet consectetur. Dignissim molestie mi arcu in fermentum in nulla non.
                Turpis consequat eleifend est mat
            </p>
        </div>

        {{-- Swiper --}}
        <div class="swiper reviewSwiper">
            <div class="swiper-wrapper">
                {{-- Card Review --}}
                @for($i=1; $i<=6; $i++)
                    <div class="swiper-slide">
                    <div class="bg-white rounded-xl shadow-md p-6 text-center mx-2">
                        <img src="{{ asset('images/user'.$i.'.jpg') }}"
                            alt="Reviewer"
                            class="w-16 h-16 rounded-full mx-auto mb-4 object-cover">
                        <h5 class="font-semibold text-blue-900">Reviewer’s Name</h5>
                        <div class="flex justify-center text-yellow-400 my-2">
                            @for($star=0; $star<5; $star++)
                                <i class="bi bi-star-fill"></i>
                                @endfor
                        </div>
                        <p class="text-sm text-slate-600">
                            Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas neque amet massa et parturient.
                        </p>
                    </div>
            </div>
            @endfor
        </div>

        <!-- {{-- Navigasi --}}
        <div class="flex justify-between mt-6">
            <div class="swiper-button-prev text-blue-900"></div>
            <div class="swiper-button-next text-blue-900"></div>
        </div> -->
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".reviewSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                }, // Tablet
                1024: {
                    slidesPerView: 4
                }, // Desktop
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>