<style>
    /* Hilangkan scrollbar tapi tetap bisa discroll */
    .scrollbox {
        content-visibility: auto;
        height: 350px;
        overflow: auto;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */
    }

    .scrollbox::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, Opera */
    }
</style>
@php
// contoh data (ganti dg data DB kamu)
$reviews = collect(range(1,20))->map(fn($i)=>[
'name' => "Reviewer’s Name",
'avatar' => 'http://127.0.0.1:8080/storage/14/d1.jpg',
'rating' => 5,
'text' => 'Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas neque amet massa et parturient.',
]);

$colA = $reviews->values()->filter(fn($v,$k)=>$k % 2 === 0);
$colB = $reviews->values()->filter(fn($v,$k)=>$k % 2 === 1);
@endphp

<section class="bg-red-600">
    <div class="mx-auto max-w-7xl px-6 lg:px-10 py-16">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            {{-- KIRI: kolom kartu (2 kolom bertingkat) --}}
            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 gap-6" style="height:414px;">
                    {{-- Kolom kiri --}}
                    <div class="flex flex-col gap-6 scrollbox">
                        @foreach($colA as $rev)
                        <article class="rounded-xl bg-white p-4 shadow transition">
                            <div class="flex items-center gap-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ $rev['avatar'] }}" alt="{{ $rev['name'] }}">
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-slate-800 text-sm leading-tight">{{ $rev['name'] }}</h4>
                                    <div class="mt-1 text-yellow-400 text-sm">
                                        @for($i=0;$i<$rev['rating'];$i++) <i class="bi bi-star-fill"></i> @endfor
                                            @for($i=$rev['rating'];$i<5;$i++) <i class="bi bi-star"></i> @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 text-xs leading-relaxed text-slate-600">
                                {{ $rev['text'] }}
                            </p>
                        </article>
                        @endforeach
                    </div>

                    {{-- Kolom kanan (offset supaya turun seperti mockup) --}}
                    <div class="flex flex-col gap-6 mt-10 scrollbox">
                        @foreach($colB as $rev)
                        <article class="rounded-xl bg-white p-4 shadow transition">
                            <div class="flex items-center gap-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ $rev['avatar'] }}" alt="{{ $rev['name'] }}">
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-slate-800 text-sm leading-tight">{{ $rev['name'] }}</h4>
                                    <div class="mt-1 text-yellow-400 text-sm">
                                        @for($i=0;$i<$rev['rating'];$i++) <i class="bi bi-star-fill"></i> @endfor
                                            @for($i=$rev['rating'];$i<5;$i++) <i class="bi bi-star"></i> @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 text-xs leading-relaxed text-slate-600">
                                {{ $rev['text'] }}
                            </p>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- KANAN: judul + deskripsi + tombol --}}
            <div class="lg:col-span-5 text-white lg:pl-8">
                <p class="text-[11px] font-semibold tracking-widest uppercase opacity-90">Customer Review</p>
                <h2 class="mt-4 text-4xl xl:text-5xl font-extrabold leading-tight">
                    Your Headline<br class="hidden lg:block"> or Tagline Here
                </h2>
                <p class="mt-5 text-base/7 opacity-95 max-w-xl">
                    Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas neque amet massa et parturient.
                </p>
                <a href="#contact"
                    class="mt-6 inline-flex items-center rounded-full bg-white px-6 py-2.5 text-sm font-semibold text-red-700 hover:bg-slate-100">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>