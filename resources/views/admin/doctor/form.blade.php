<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-person-plus mr-2"></i> {{-- Menambahkan ikon dokter --}}
            {{ isset($doctor) ? __('Edit Dokter') : __('Tambah Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ isset($doctor) ? __('Form Edit Dokter') : __('Form Tambah Dokter') }}
                    </h3>

                    <form
                        action="{{ isset($doctor) ? route('admin.doctor.updateDoctor', $doctor->id) : route('admin.doctor.storeDoctor') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($doctor))
                            @method('PUT')
                        @endif

                        {{-- Nama Dokter --}}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Nama Dokter') }}
                            </label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('name', $doctor->name ?? '') }}" required>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Spesialisasi --}}
                        {{-- <div class="mb-4">
                            <label for="specialty" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Spesialisasi') }}
                            </label>
                            <input type="text" name="specialty" id="specialty"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('specialty', $doctor->specialty ?? '') }}" required>
                            @error('specialty')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Deskripsi') }}
                            </label>
                            <textarea name="description" id="description" rows="5"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('description', $doctor->content ?? '') }}</textarea>
                            @error('description')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gambar Dokter --}}
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Gambar Dokter') }}
                            </label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('image')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror

                            {{-- Tampilkan gambar yang sudah ada jika ada --}}
                            @if (isset($doctor) && $doctor->getFirstMediaUrl('doctor_images'))
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Gambar Saat Ini:') }}
                                    </p>
                                    <img src="{{ $doctor->getFirstMediaUrl('doctor_images') }}"
                                        alt="Current Doctor Image" class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                                {{ isset($doctor) ? __('Simpan Perubahan') : __('Tambah Dokter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
