<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-envelope-fill mr-2"></i>
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Edit Contact Us Content') }}
                    </h3>

                    {{-- $contactus is a collection/array containing 3 data, each with 1 title & 1 content --}}
                    @if (isset($contactus) && count($contactus) === 3)
                        <form action="{{ route('admin.contactus.update', 1) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            @foreach ($contactus as $i => $item)
                                <div class="mb-4">
                                    <label for="title{{ $i+1 }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Title {{ $i+1 }}
                                    </label>
                                    <input type="text" name="title{{ $i+1 }}" id="title{{ $i+1 }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                        value="{{ old('title'.($i+1), $item->title ?? '') }}" required>
                                    @error('title'.($i+1))
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="content{{ $i+1 }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Content {{ $i+1 }}
                                    </label>
                                    <textarea name="content{{ $i+1 }}" id="content{{ $i+1 }}" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">{{ old('content'.($i+1), $item->content ?? '') }}</textarea>
                                    @error('content'.($i+1))
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    @else
                        <p class="text-gray-900 dark:text-gray-100">
                            No Contact Us content found to edit. Please create new content if needed.
                        </p>
                        {{-- Button to create new Contact Us content if needed --}}
                        {{-- <a href="{{ route('admin.contactus.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                            Create New Contact Us Content
                        </a> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
