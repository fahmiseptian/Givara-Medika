<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-newspaper mr-2"></i>
            {{ __('Headline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Daftar Konten Headline') }}
                    </h3>

                    @if (isset($headlines) && $headlines->count() > 0)
                        @foreach ($headlines as $headline)
                            <div
                                class="mb-8 p-6 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                    {{ __('Edit Headline') }} #{{ $headline->id }} - {{ $headline->title }}
                                </h4>

                                <form action="{{ route('admin.headline.update', $headline->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') {{-- Gunakan PUT untuk update --}}

                                    <!-- Judul -->
                                    <div class="mb-4">
                                        <label for="title_{{ $headline->id }}"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('Judul') }}
                                        </label>
                                        <input type="text" name="title" id="title_{{ $headline->id }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                                      focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 
                                                      dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                            value="{{ old('title', $headline->title) }}" required>
                                        @error('title')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Ikon -->
                                    <div class="mb-4">
                                        <label for="icon_{{ $headline->id }}"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('Ikon') }}
                                        </label>
                                        <input type="text" name="icon" id="icon_{{ $headline->id }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                                      focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 
                                                      dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                            value="{{ old('icon', $headline->icon) }}">
                                        @error('icon')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                            {{ __('Masukkan nama kelas ikon (misal: bi bi-star, fa fa-home).') }}
                                        </p>
                                    </div>

                                    <!-- Konten -->
                                    <div class="mb-4">
                                        <label for="content_{{ $headline->id }}"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('Konten') }}
                                        </label>
                                        <textarea name="content" id="content_{{ $headline->id }}" rows="5"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                                         focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 
                                                         dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content', $headline->content) }}</textarea>
                                        @error('content')
                                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tombol -->
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent 
                                                       rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                                                       hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 
                                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                                       transition ease-in-out duration-150 dark:bg-gray-600 
                                                       dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                                            {{ __('Simpan Perubahan') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-900 dark:text-gray-100">
                            {{ __('Tidak ada konten headline yang ditemukan untuk diedit. Silakan buat konten baru jika diperlukan.') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
