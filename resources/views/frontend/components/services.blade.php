@php
use App\Models\Service;
use App\Models\ServicePage;
use App\Models\ServiceContent;

$servicePage = ServicePage::first();
$serviceContent = ServiceContent::first();

$services = Service::latest()->get()->map(function ($s) {
return [
'title' => $s->name,
'desc' => $s->short_description ?? '',
'img' => $s->getFirstMediaUrl('banner') ?: asset('images/default-service.png'),
'url' => '#',
];
});
@endphp

<section class="py-16 lg:py-20">
    <div class="container mx-auto max-w-7xl px-6 lg:px-10">
        {{-- Header --}}
        <div class="grid grid-cols-12 gap-8 mb-10">
            <div class="col-span-12 lg:col-span-6">
                <p class="text-[11px] font-semibold tracking-widest text-sky-600 uppercase">Our Service</p>
                <h2 class="mt-2 text-4xl lg:text-5xl font-extrabold leading-tight text-red-700">
                    {{ $servicePage->title ?? 'Your Headline or Tagline Here' }}
                </h2>
            </div>
            <div class="col-span-12 lg:col-span-6 lg:pl-6">
                <p class="text-sm lg:text-base leading-relaxed text-slate-700">
                    {!! $servicePage->content ?? 'Lorem ipsum dolor sit amet consectetur, quis integer egestas neque amet massa et parturient. Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas.' !!}
                </p>
            </div>
        </div>

        {{-- Cards --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($services as $s)
            <article class="group flex flex-col rounded-2xl bg-white shadow-sm ring-1 ring-slate-200/70 hover:shadow-lg transition">
                {{-- Gambar --}}
                <div class="overflow-hidden rounded-t-2xl">
                    <img
                        src="{{ $s['img'] }}"
                        alt="{{ $s['title'] }}"
                        class="h-48 w-full object-cover group-hover:scale-[1.02] transition">
                </div>

                {{-- Konten --}}
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-[15px] font-semibold text-slate-900">{{ $s['title'] }}</h3>
                    <p class="mt-1 text-xs text-slate-600">
                        {{ \Illuminate\Support\Str::limit($s['desc'], 90) }}
                    </p>

                    <div class="mt-4 pt-1">
                        <a href="{{ $s['url'] }}"
                            class="inline-flex items-center rounded-full bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Get Service
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="container mx-auto px-6 py-12" style="padding-bottom: 200px;">
    <div class="container mx-auto max-w-7xl px-6 lg:px-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            {{-- Bagian Kiri --}}
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-widest mb-3">Service</p>
                <h1 class="text-3xl md:text-4xl font-extrabold leading-tight text-red-700 mb-4">
                    {{ $serviceContent->title ?? 'Judul Service' }}
                </h1>
                <div class="text-slate-600 mb-6">
                    {!! $serviceContent->content ?? 'Deskripsi service belum tersedia.' !!}
                </div>
            </div>

            {{-- Bagian Kanan --}}
            <div class="flex justify-center">
                @if(isset($serviceContent->banner_url))
                    <img src="{{ $serviceContent->banner_url }}"
                        alt="Service Image"
                        class="rounded-lg shadow-md object-cover w-full max-w-md">
                @else
                    <img src="{{ asset('images/room.jpg') }}"
                        alt="Service Image"
                        class="rounded-lg shadow-md object-cover w-full max-w-md">
                @endif
            </div>

        </div>
    </div>
</section>