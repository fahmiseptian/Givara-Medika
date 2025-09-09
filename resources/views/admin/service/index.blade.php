<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-gear mr-2"></i> {{-- Service list icon --}}
            {{ __('Service List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Service Management') }}
                    </h3>

                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('admin.service.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                            <i class="bi bi-plus-circle mr-2"></i> {{ __('Add New Service') }}
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('Image') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        {{ __('Description') }}
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ __('Actions') }}</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($services as $service)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($service->getFirstMediaUrl('banner'))
                                                <img src="{{ $service->getFirstMediaUrl('banner') }}"
                                                    alt="{{ $service->name }}"
                                                    class="h-16 w-16 object-cover rounded-full">
                                            @else
                                                <img src="{{ asset('images/default-service.png') }}"
                                                    alt="Default Service" class="h-16 w-16 object-cover rounded-full">
                                            @endif
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $service->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                            {{ Str::limit($service->short_description, 50) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.service.edit', $service->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600 mr-3">
                                                {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('admin.service.destroy', $service->id) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this service?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"
                                            class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500 dark:text-gray-300">
                                            {{ __('No service data available.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
