@php
    use App\Models\aboutus;
    $aboutus = aboutus::findOrFail(1); // Mengambil data About Us dengan ID 1
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
        <div>
            <p class="uppercase text-lg font-semibold text-gray-500 mb-2">About Us</p>
            <h2 class="text-6xl md:text-5xl font-bold text-red-700 mb-4">
                {{ $aboutus->title }}
            </h2>
            <p class="text-gray-600 text-xl mb-6">
                {{ $aboutus->content }}
            </p>

            <!-- List Icon -->
            <ul class="space-y-5">
                @if ($aboutus->text1)
                    <li class="flex items-start space-x-4">
                        <div
                            class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-blue-900 text-white text-xl">
                            <i class="{{ $aboutus->icon1 }}"></i>
                        </div>
                        <p class="text-gray-700 text-lg">{{ $aboutus->text1 }}</p>
                    </li>
                @endif
                @if ($aboutus->text2)
                    <li class="flex items-start space-x-4">
                        <div
                            class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-blue-900 text-white text-xl">
                            <i class="{{ $aboutus->icon2 }}"></i>
                        </div>
                        <p class="text-gray-700 text-lg">{{ $aboutus->text2 }}</p>
                    </li>
                @endif
                @if ($aboutus->text3)
                    <li class="flex items-start space-x-4">
                        <div
                            class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-blue-900 text-white text-xl">
                            <i class="{{ $aboutus->icon3 }}"></i>
                        </div>
                        <p class="text-gray-700 text-lg">{{ $aboutus->text3 }}</p>
                    </li>
                @endif
                @if ($aboutus->text4)
                    <li class="flex items-start space-x-4">
                        <div
                            class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-blue-900 text-white text-xl">
                            <i class="{{ $aboutus->icon4 }}"></i>
                        </div>
                        <p class="text-gray-700 text-lg">{{ $aboutus->text4 }}</p>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</section>
