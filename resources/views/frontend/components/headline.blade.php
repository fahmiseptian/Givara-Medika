@php
use App\Models\Headline;
$headlines = Headline::query()->latest()->take(3)->get();
@endphp

<section class="container mx-auto py-12 border-b">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($headlines as $headline)
        <article class="group h-full rounded-xl bg-white p-5 shadow-sm transition
                            hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-start gap-4">
                {{-- Icon bulat --}}
                <div class="flex-shrink-0">
                    <div class="grid h-16 w-16 place-items-center rounded-full
                                    bg-gradient-to-br from-blue-50 to-blue-100
                                    ring-1 ring-blue-200">
                        <i class="{{ $headline->icon ?: 'bi bi-bullseye' }}
                                      text-2xl text-blue-700" aria-hidden="true"></i>
                    </div>
                </div>

                {{-- Judul + isi --}}
                <div class="min-w-0">
                    <h3 class="text-lg font-semibold text-blue-900 leading-snug">
                        {{ $headline->title }}
                    </h3>
                    <p class="mt-2 text-sm text-slate-600">
                        {{ $headline->content }}
                    </p>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</section>