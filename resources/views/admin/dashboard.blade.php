<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-speedometer mr-2"></i> {{-- Menambahkan ikon dashboard --}}
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> {{-- Menyesuaikan lebar dan padding agar konsisten --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> {{-- Menambahkan dukungan dark mode --}}
                <div class="p-6">
                    {{-- Fitur update dashboard dimulai di sini --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Edit Konten Dashboard') }}
                    </h3>

                    {{-- Asumsi variabel $dashboard adalah instance model Dashboard yang akan diedit. --}}
                    {{-- Anda perlu memastikan variabel $dashboard ini dilewatkan dari controller ke view ini. --}}
                    @if (isset($dashboard))
                        <form action="{{ route('admin.dashboard.update', $dashboard->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="mb-4">
                                <label for="banner"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Banner') }}
                                </label>
                                <input type="file" name="banner" id="banner"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                                @error('banner')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror

                                {{-- Tampilkan banner yang sudah ada jika ada. Asumsi ada kolom 'banner_url' di model Dashboard. --}}
                                @if (isset($dashboard->banner_url) && $dashboard->banner_url)
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Banner Saat Ini:') }}
                                        </p>
                                        <img src="{{ $dashboard->banner_url }}" alt="Current Banner"
                                            class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                                    </div>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Judul') }}
                                </label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                    value="{{ old('title', $dashboard->title) }}" required>
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
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content', $dashboard->content) }}</textarea>
                                @error('content')
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
                            {{ __('Tidak ada konten dashboard yang ditemukan untuk diedit. Silakan buat konten baru jika diperlukan.') }}
                        </p>
                        {{-- Anda bisa menambahkan tombol untuk membuat konten dashboard baru di sini jika diinginkan --}}
                        {{-- <a href="{{ route('admin.dashboard.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                            {{ __('Buat Konten Dashboard Baru') }}
                        </a> --}}
                    @endif
                    {{-- Akhir fitur update dashboard --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
