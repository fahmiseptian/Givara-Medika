<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-star-fill mr-2"></i> {{-- Icon untuk halaman review --}}
            {{ __('Review Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> {{-- Adjust width and padding for consistency --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> {{-- Dark mode support --}}
                <div class="p-6">
                    {{-- Review page update feature starts here --}}
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Edit Review Page Content') }}
                    </h3>

                    {{-- Assume $reviewPage is an instance of ReviewPage model to be edited. --}}
                    {{-- Make sure $reviewPage is passed from the controller to this view. --}}
                    <form action="{{ route('admin.review.page.update', 1) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Title') }}
                            </label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('title', $reviewPage->title) }}" required>
                            @error('title')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Content') }}
                            </label>
                            <textarea name="content" id="content" rows="5"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content', $reviewPage->content) }}</textarea>
                            @error('content')
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
                    {{-- End of review page update feature --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>