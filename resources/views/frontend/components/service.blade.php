 @php
 use App\Models\Service;

 $services = Service::latest()->take(4)->get()->map(function($service) {
 return [
 'title' => $service->name,
 'desc' => $service->short_description ?? '',
 'img' => $service->getFirstMediaUrl('banner') ?: asset('images/default-service.png'),
 'url' => '#'
 ];
 });
 @endphp

 <section class="py-14 mt-16">
     <div class="container mx-auto px-4">
         @php
         use App\Models\ServicePage;
         $servicePage = ServicePage::first();
         @endphp
         {{-- Header --}}
         <div class="grid md:grid-cols-2 gap-8 items-start mb-10">
             <div>
                 <p class="text-xs font-semibold tracking-widest text-sky-600 uppercase">Our Service</p>
                 <h2 class="mt-2 text-4xl md:text-4xl font-extrabold leading-tight text-red-600">
                     {{ $servicePage->title ?? 'Your Headline' }} <br class="hidden md:block">
                     <span class="text-red-700">
                         {{-- Jika ingin memisahkan tagline, bisa tambahkan field di model. Untuk sekarang, pakai bagian dari title --}}
                         or Tagline Here
                     </span>
                 </h2>
             </div>
             <div class="text-md md:text-base leading-relaxed flex items-end h-full">
                 <p class="w-full mt-auto">
                     {{ $servicePage->content ?? 'Lorem ipsum dolor sit amet consectetur, quis integer egestas neque amet massa et parturient. Lorem ipsum dolor sit amet consectetur. Mattis quis integer egestas.' }}
                 </p>
             </div>
         </div>

         {{-- Cards --}}
         <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 mt-16">
             @foreach ($services as $i => $s)
             <div
                 class="group rounded-2xl bg-white p-1 shadow-sm hover:shadow-lg transition"
                 style="width:313px; height:600px; min-width:313px; min-height:500px; max-width:313px; max-height:500px;">
                 <div class="overflow-hidden rounded-xl" style="height:300px;">
                     <img src="{{ $s['img'] }}" alt="{{ $s['title'] }}"
                         class="h-full w-full object-cover group-hover:scale-[1.02] transition" />
                 </div>

                 <div class="mt-4">
                     <h3 class="font-semibold text-slate-900">{{ $s['title'] }}</h3>
                     <p class="mt-1 text-sm text-slate-600">
                         {{ $s['desc'] }}
                     </p>
                 </div>

                 <div class="mt-4">
                     <a href="{{ $s['url'] }}"
                         class="inline-flex items-center justify-center rounded-full px-4 py-2 text-sm
                                  font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none
                                  focus-visible:ring-2 focus-visible:ring-red-500">
                         Get Service
                     </a>
                 </div>
             </div>
             @endforeach
         </div>
     </div>
 </section>