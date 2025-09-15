<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-speedometer mr-2"></i> {{-- Ikon umum untuk halaman admin --}}
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Edit Konten About Us') }}
                    </h3>

                    {{-- Asumsi variabel $aboutus adalah instance model Aboutus yang akan diedit. --}}
                    {{-- Anda perlu memastikan variabel $aboutus ini dilewatkan dari controller ke view ini. --}}
                    @if (isset($aboutus))
                        <form action="{{ route('admin.aboutus.update', $aboutus->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Atau @method('PUT') jika rute Anda menggunakan PUT/PATCH --}}

                            <div class="mb-4">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Judul') }}
                                </label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('title', $aboutus->title) }}" required>
                                @error('title')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Konten') }}
                                </label>
                                <textarea name="content" id="content" rows="5"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content', $aboutus->content) }}</textarea>
                                @error('content')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Banner 1 --}}
                            <div class="mb-4">
                                <label for="banner1"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Banner 1') }}
                                </label>
                                <input type="file" name="banner1" id="banner1"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('banner1')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                                @if (isset($aboutus->banner1_url) && $aboutus->banner1_url)
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Banner 1 Saat Ini:') }}
                                        </p>
                                        <img src="{{ $aboutus->banner1_url }}" alt="Current Banner 1"
                                            class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                                    </div>
                                @endif
                            </div>

                            {{-- Banner 2 --}}
                            <div class="mb-4">
                                <label for="banner2"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Banner 2') }}
                                </label>
                                <input type="file" name="banner2" id="banner2"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('banner2')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                                @if (isset($aboutus->banner2_url) && $aboutus->banner2_url)
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Banner 2 Saat Ini:') }}
                                        </p>
                                        <img src="{{ $aboutus->banner2_url }}" alt="Current Banner 2"
                                            class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                                    </div>
                                @endif
                            </div>

                            {{-- Banner 3 --}}
                            <div class="mb-4">
                                <label for="banner3"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Banner 3') }}
                                </label>
                                <input type="file" name="banner3" id="banner3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('banner3')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                                @if (isset($aboutus->banner3_url) && $aboutus->banner3_url)
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Banner 3 Saat Ini:') }}
                                        </p>
                                        <img src="{{ $aboutus->banner3_url }}" alt="Current Banner 3"
                                            class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                                    </div>
                                @endif
                            </div>

                            {{-- Icon 1 & Text 1 --}}
                            <div class="mb-4">
                                <label for="icon1"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Ikon 1 (misal: bi bi-star)') }}
                                </label>
                                <input type="text" name="icon1" id="icon1"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('icon1', $aboutus->icon1) }}">
                                @error('icon1')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="text1"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Teks 1') }}
                                </label>
                                <input type="text" name="text1" id="text1"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('text1', $aboutus->text1) }}">
                                @error('text1')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Icon 2 & Text 2 --}}
                            <div class="mb-4">
                                <label for="icon2"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Ikon 2 (misal: bi bi-check-circle)') }}
                                </label>
                                <input type="text" name="icon2" id="icon2"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('icon2', $aboutus->icon2) }}">
                                @error('icon2')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="text2"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Teks 2') }}
                                </label>
                                <input type="text" name="text2" id="text2"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('text2', $aboutus->text2) }}">
                                @error('text2')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Icon 3 & Text 3 --}}
                            <div class="mb-4">
                                <label for="icon3"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Ikon 3 (misal: bi bi-award)') }}
                                </label>
                                <input type="text" name="icon3" id="icon3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('icon3', $aboutus->icon3) }}">
                                @error('icon3')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="text3"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Teks 3') }}
                                </label>
                                <input type="text" name="text3" id="text3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('text3', $aboutus->text3) }}">
                                @error('text3')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Icon 4 & Text 4 --}}
                            <div class="mb-4">
                                <label for="icon4"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Ikon 4 (misal: bi bi-people)') }}
                                </label>
                                <input type="text" name="icon4" id="icon4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('icon4', $aboutus->icon4) }}">
                                @error('icon4')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="text4"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Teks 4') }}
                                </label>
                                <input type="text" name="text4" id="text4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('text4', $aboutus->text4) }}">
                                @error('text4')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                                    {{ __('Simpan Perubahan') }}
                                </button>
                            </div>
                        </form>
                    @else
                        <p class="text-gray-900 dark:text-gray-100">
                            {{ __('Tidak ada konten About Us yang ditemukan untuk diedit. Silakan buat konten baru jika diperlukan.') }}
                        </p>
                        {{-- Anda bisa menambahkan tombol untuk membuat konten About Us baru di sini jika diinginkan --}}
                        {{-- <a href="{{ route('admin.aboutus.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                            {{ __('Buat Konten About Us Baru') }}
                        </a> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
