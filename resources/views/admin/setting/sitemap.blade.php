<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="bi bi-diagram-3 mr-2"></i> {{ __('Website Sitemap') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Sitemap & Links</h3>
                    <ul class="list-disc pl-6 space-y-2">
                        @php
                            $seoMeta = \App\Models\SeoMeta::all();
                        @endphp
                        @foreach($seoMeta as $meta)
                            <li>
                                <a href="{{ url($meta->page === 'home' ? '/' : $meta->page) }}" class="text-indigo-600 hover:underline" target="_blank">
                                    {{ $meta->title ?? ($meta->page === 'home' ? '/' : $meta->page) }}
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ url('/sitemap.xml') }}" class="text-indigo-600 hover:underline" target="_blank">Sitemap XML</a>
                        </li>
                    </ul>
                    <div class="mt-6">
                        <label for="sitemap-url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Sitemap URL (read only)
                        </label>
                        <input type="text" id="sitemap-url" readonly
                            class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            value="{{ url('/sitemap.xml') }}">
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            All links above are clickable. If you add a new page, please update the SEO Meta data so this sitemap will also be updated.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
