@php
$setting = setting();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    dark: localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
}" :class="{ 'dark': dark }">

<head>
    @include('layouts.partials.css')

    <style>
        /* Hilangkan scrollbar tapi tetap bisa discroll */
        .scrollbox {
            content-visibility: auto;
            height: 600px;
            overflow: auto;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
        }
        .scrollbox::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
    </style>
</head>

<body class="font-sans antialiased bg-white">
    @include('frontend.components.navbar')
    @include('frontend.components.dashboard')
    @include('frontend.components.headline')
    @include('frontend.components.aboutus')
    @include('frontend.components.doctor')
    @include('frontend.components.service')




    @php
    // === contoh data (ganti dengan data dari DB) ===
    $reviews = collect(range(1,10))->map(fn($i)=>[
    'name' => "Reviewer’s Name",
    'avatar' => 'http://127.0.0.1:8080/storage/14/d1.jpg',
    'rating' => 5,
    'text' => 'Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas neque amet massa et parturient.',
    ]);

    // bagi jadi 2 kolom agar offset mudah diatur
    $colA = $reviews->values()->filter(fn($v,$k)=>$k % 2 === 0);
    $colB = $reviews->values()->filter(fn($v,$k)=>$k % 2 === 1);
    @endphp

    <section class="bg-red-600 py-16">
        <div class="mx-auto max-w-7xl px-4 pt-6" style="height: 674px;">
            <div class="grid gap-10 lg:grid-cols-12 items-start">
                <div class="lg:col-span-7">
                    <div class="relative h-[620px] overflow-y-auto pr-3">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="h-[300px] md:h-[420px] overflow-y-auto pr-2">
                                <div class="flex gap-4">
                                    {{-- Kolom Kiri --}}
                                    <div class="flex w-1/2 flex-col gap-4 h-[300px] overflow-y-scroll scrollbox">
                                        @foreach($colA as $rev)
                                        <article class="w-full rounded-xl bg-white p-3 shadow-sm flex flex-col items-center">
                                            <h4 class="font-semibold text-slate-800 text-sm text-center">{{ $rev['name'] }}</h4>
                                            <img class="h-10 w-10 rounded-full object-cover mt-2" src="{{ $rev['avatar'] }}" alt="{{ $rev['name'] }}">
                                            <div class="mt-2 flex gap-1 text-yellow-400 justify-center">
                                                @for($i=0;$i<$rev['rating'];$i++) <i class="bi bi-star-fill"></i> @endfor
                                                    @for($i=$rev['rating'];$i<5;$i++) <i class="bi bi-star"></i> @endfor
                                            </div>
                                            <p class="mt-2 text-xs leading-relaxed text-slate-600 text-center">{{ $rev['text'] }}</p>
                                        </article>
                                        @endforeach
                                    </div>

                                    {{-- Kolom Kanan --}}
                                    <div class="flex w-1/2 flex-col gap-4 h-[300px] overflow-y-scroll scrollbox md:mt-6">
                                        @foreach($colB as $rev)
                                        <article class="w-full rounded-xl bg-white p-3 shadow-sm flex flex-col items-center">
                                            <h4 class="font-semibold text-slate-800 text-sm text-center">{{ $rev['name'] }}</h4>
                                            <img class="h-10 w-10 rounded-full object-cover mt-2" src="{{ $rev['avatar'] }}" alt="{{ $rev['name'] }}">
                                            <div class="mt-2 flex gap-1 text-yellow-400 justify-center">
                                                @for($i=0;$i<$rev['rating'];$i++) <i class="bi bi-star-fill"></i> @endfor
                                                    @for($i=$rev['rating'];$i<5;$i++) <i class="bi bi-star"></i> @endfor
                                            </div>
                                            <p class="mt-2 text-xs leading-relaxed text-slate-600 text-center">{{ $rev['text'] }}</p>
                                        </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-col gap-10 justify-center items-start" style="margin-left: 120px; min-height: 500px;">
                                {{-- RIGHT TITLE AREA --}}
                                <div class="lg:col-span-5 text-white">
                                    <p class="text-lg font-bold tracking-widest uppercase opacity-90">Customer Reviews</p>
                                    <h2 class="mt-5 text-6xl font-extrabold leading-tight drop-shadow-lg">
                                        Your Headline<br class="hidden md:block"> or Tagline Here
                                    </h2>
                                    <p class="mt-6 text-xl text-white/90 max-w-xl">
                                        We truly value every review from our customers. Here are some of their testimonials about our service.
                                    </p>

                                    <a href="#contact"
                                        class=" inline-flex rounded-full bg-white px-8 py-4 text-lg font-bold text-sky-700 hover:bg-slate-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-white shadow-lg transition-all duration-200" style="margin-top: 20px; color: black;">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('layouts.partials.js')

</body>

</html>