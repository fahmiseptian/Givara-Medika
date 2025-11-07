<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-briefcase mr-2"></i> {{-- Icon for service page --}}
            {{ __('Service Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- Service page update feature starts here --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Edit About us Page Content') }}
                    </h3>

                    {{-- Assume $aboutusPage is an instance of aboutusPage model to be edited --}}
                    <form action="{{ route('admin.aboutus.updatePage', $aboutusPage->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Title') }}
                            </label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('title', $aboutusPage->title) }}" required>
                            @error('title')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Content') }}
                            </label>
                            <div class="summernote-container prose max-w-none">
                                <textarea name="content" id="content" rows="5"
                                    class="summernote mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content', $aboutusPage->content) }}</textarea>
                            </div>
                            @error('content')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="vision_and_mission"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Vision and Mision') }}
                            </label>
                            <div class="summernote-container prose max-w-none">
                                <textarea name="vision_and_mission" id="vision_and_mission" rows="5"
                                    class="summernote mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('vision_and_mission', $aboutusPage->vision_and_mission) }}</textarea>
                            </div>
                            @error('vision_and_mission')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="banner" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Upload Image
                            </label>
                            <input type="file" name="banner" id="banner"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @if (isset($aboutusPage->banner_url))
                                <div class="mt-2">
                                    <img src="{{ $aboutusPage->banner_url }}" alt="Banner Saat Ini"
                                        class="h-24 rounded">
                                </div>
                            @endif
                            @error('banner')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                    {{-- End of service page update feature --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
