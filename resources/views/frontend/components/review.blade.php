<style>
    /* Hide scrollbar but still scrollable */
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
use App\Models\Review;
use App\Models\ReviewPage;

// Get reviewPage data (title & description)
$reviewPage = \App\Models\ReviewPage::first();

// Get reviews from database
$reviews = \App\Models\Review::latest()->get();

// Split reviews into two columns
$colA = $reviews->values()->filter(fn($v,$k)=>$k % 2 === 0);
$colB = $reviews->values()->filter(fn($v,$k)=>$k % 2 === 1);
@endphp

<section class="bg-red-600">
    <div class="mx-auto max-w-7xl px-6 lg:px-10 py-16">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            {{-- LEFT: card columns (2 stacked columns) --}}
            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 gap-6" style="height:414px;">
                    {{-- Left column --}}
                    <div class="flex flex-col gap-6 scrollbox">
                        @foreach($colA as $rev)
                        <article class="rounded-xl bg-white p-4 shadow transition">
                            <div class="flex items-center gap-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ $rev->profile_url ?? asset('images/default-user.png') }}" alt="{{ $rev->name }}">
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-slate-800 text-sm leading-tight">{{ $rev->name }}</h4>
                                    <div class="mt-1 text-yellow-400 text-sm">
                                        @for($i=0;$i<$rev->star;$i++) <i class="bi bi-star-fill"></i> @endfor
                                        @for($i=$rev->star;$i<5;$i++) <i class="bi bi-star"></i> @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 text-xs leading-relaxed text-slate-600">
                                {{ $rev->content }}
                            </p>
                        </article>
                        @endforeach
                    </div>

                    {{-- Right column (offset for mockup look) --}}
                    <div class="flex flex-col gap-6 mt-10 scrollbox">
                        @foreach($colB as $rev)
                        <article class="rounded-xl bg-white p-4 shadow transition">
                            <div class="flex items-center gap-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ $rev->profile_url ?? asset('images/default-user.png') }}" alt="{{ $rev->name }}">
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-slate-800 text-sm leading-tight">{{ $rev->name }}</h4>
                                    <div class="mt-1 text-yellow-400 text-sm">
                                        @for($i=0;$i<$rev->star;$i++) <i class="bi bi-star-fill"></i> @endfor
                                        @for($i=$rev->star;$i<5;$i++) <i class="bi bi-star"></i> @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 text-xs leading-relaxed text-slate-600">
                                {{ $rev->content }}
                            </p>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- RIGHT: title + description + button --}}
            <div class="lg:col-span-5 text-white lg:pl-8">
                <p class="text-[11px] font-semibold tracking-widest uppercase opacity-90">
                    {{ 'Customer Review' }}
                </p>
                <h2 class="mt-4 text-4xl xl:text-5xl font-extrabold leading-tight">
                    {{ $reviewPage?->title ?? 'Review Title' }}
                </h2>
                <p class="mt-5 text-base/7 opacity-95 max-w-xl">
                    {{ $reviewPage?->content ?? 'No review description yet.' }}
                </p>
                <a href="#contact"
                    class="mt-6 inline-flex items-center rounded-full bg-white px-6 py-2.5 text-sm font-semibold text-red-700 hover:bg-slate-100">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>