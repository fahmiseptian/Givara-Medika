<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-gear mr-2"></i> {{-- Service icon --}}
            {{ isset($service) ? __('Edit Service') : __('Add Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ isset($service) ? __('Edit Service Form') : __('Add Service Form') }}
                    </h3>

                    <form
                        action="{{ isset($service) ? route('admin.service.update', $service->id) : route('admin.service.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($service))
                            @method('PUT')
                        @endif

                        {{-- Service Name --}}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Service Name') }}
                            </label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('name', $service->name ?? '') }}" required>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Short Description --}}
                        <div class="mb-4">
                            <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Short Description') }}
                            </label>
                            <input type="text" name="short_description" id="short_description"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('short_description', $service->short_description ?? '') }}">
                            @error('short_description')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Description') }}
                            </label>
                            <textarea name="description" id="description" rows="5"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('description', $service->description ?? '') }}</textarea>
                            @error('description')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Banner Image --}}
                        <div class="mb-4">
                            <label for="banner" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Banner Image') }}
                            </label>
                            <input type="file" name="banner" id="banner"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('banner')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror

                            {{-- Show current image if exists --}}
                            @if (isset($service) && $service->getFirstMediaUrl('banner'))
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Current Image:') }}</p>
                                    <img src="{{ $service->getFirstMediaUrl('banner') }}"
                                        alt="Current Service Banner" class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                                {{ isset($service) ? __('Update Service') : __('Add Service') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
