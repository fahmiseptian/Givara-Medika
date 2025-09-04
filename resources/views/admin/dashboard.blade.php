<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-speedometer mr-2"></i> {{-- Menambahkan ikon dashboard --}}
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> {{-- Menyesuaikan lebar dan padding agar konsisten --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> {{-- Menambahkan dukungan dark mode --}}
                <div class="p-6">
                    <p class="text-gray-900 dark:text-gray-100"> {{-- Menambahkan dukungan dark mode untuk teks --}}
                        {{ __("You're logged in!") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
