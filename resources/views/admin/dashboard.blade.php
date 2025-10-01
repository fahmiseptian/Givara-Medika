<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-speedometer mr-2"></i> {{-- Add dashboard icon --}}
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> {{-- Adjust width and padding for consistency --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> {{-- Add dark mode support --}}
                <div class="p-6">
                    {{-- Dashboard update feature starts here --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Edit Dashboard Content') }}
                    </h3>

                    {{-- Assume $dashboard variable is an instance of Dashboard model to be edited. --}}
                    {{-- Make sure this variable is passed from the controller to this view. --}}
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

                            {{-- Show existing banner if available. Assume 'banner_url' column exists in Dashboard model. --}}
                            @if (isset($dashboard->banner_url) && $dashboard->banner_url)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Current Banner:') }}
                                </p>
                                <img src="{{ $dashboard->banner_url }}" alt="Current Banner"
                                    class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                            </div>
                            @endif
                        </div>


                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Title') }}
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
                                {{ __('Content') }}
                            </label>
                            <textarea name="content" id="content" rows="5"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content', $dashboard->content) }}</textarea>
                            @error('content')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Note for Our Video --}}
                        <div class="mb-4">
                            <div class="text-xs text-gray-500 dark:text-gray-400 italic">
                                <strong>Note:</strong> "Our Video" will be displayed on the website homepage. Make sure the uploaded video is relevant and short in duration so visitors do not get bored. Recommended format: MP4, maximum file size 50MB.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="video"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Upload Video') }}
                            </label>
                            <input type="file" name="video" id="video" accept="video/*"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                            @error('video')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror

                            {{-- Show existing video if available --}}
                            @if (isset($dashboard->video_url) && $dashboard->video_url)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Current Video:') }}</p>
                                <video controls class="mt-1 max-w-xs h-auto rounded-md shadow-sm">
                                    <source src="{{ $dashboard->video_url }}" type="video/mp4">
                                    {{ __('Your browser does not support video playback.') }}
                                </video>
                            </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="title_vidio"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Judul Video
                            </label>
                            <input type="text" name="title_vidio" id="title_vidio"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('title_vidio', $dashboard->title_vidio) }}" required>
                            @error('title_vidio')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content_vidio"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Konten Video
                            </label>
                            <textarea name="content_vidio" id="content_vidio" rows="5"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content_vidio', $dashboard->content_vidio) }}</textarea>
                            @error('content_vidio')
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
                    @else
                    <p class="text-gray-900 dark:text-gray-100">
                        {{ __('No dashboard content found to edit. Please create new content if needed.') }}
                    </p>
                    {{-- You can add a button to create new dashboard content here if desired --}}
                    {{-- <a href="{{ route('admin.dashboard.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                    {{ __('Create New Dashboard Content') }}
                    </a> --}}
                    @endif
                    {{-- End of dashboard update feature --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>