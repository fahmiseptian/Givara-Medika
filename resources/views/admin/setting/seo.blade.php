<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="bi bi-globe2 mr-2"></i> {{ __('SEO Meta Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <x-alert-form class="mb-6" />
                    <div class="space-y-8">
                        @foreach($seoMetas as $seoMeta)
                            <form method="POST" action="{{ route('admin.setting.seo_update', $seoMeta->id) }}" enctype="multipart/form-data" class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-3">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Page</label>
                                    <input type="text" name="page" value="{{ $seoMeta->page }}" class="w-full bg-gray-100 dark:bg-gray-800 border-none text-gray-700 dark:text-gray-300 rounded-md" readonly>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ old('meta_title', $seoMeta->meta_title) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Meta Description</label>
                                    <textarea name="meta_description" rows="2" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">{{ old('meta_description', $seoMeta->meta_description) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $seoMeta->meta_keywords) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                                    <div class="flex items-center space-x-4">
                                        @php
                                            // Cek apakah ada media image dari Spatie Media Library
                                            $media = $seoMeta->getFirstMedia('meta_image');
                                        @endphp
                                        @if($media)
                                            <img src="{{ $media->getUrl() }}" alt="SEO Image" class="h-16 w-16 object-cover rounded border border-gray-300 dark:border-gray-700">
                                        @endif
                                        <input type="file" name="image" class="block text-gray-800 dark:text-gray-300">
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <x-primary-button class="py-2 px-6 text-sm">{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
