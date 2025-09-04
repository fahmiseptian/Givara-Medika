<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="bi bi-person-circle mr-2"></i> {{-- Menambahkan ikon profil --}}
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg"> {{-- Menambahkan dukungan dark mode dan konsistensi styling --}}
                <div class="p-6 max-w-xl"> {{-- Menyesuaikan padding agar konsisten --}}
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg"> {{-- Menambahkan dukungan dark mode dan konsistensi styling --}}
                <div class="p-6 max-w-xl"> {{-- Menyesuaikan padding agar konsisten --}}
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg"> {{-- Menambahkan dukungan dark mode dan konsistensi styling --}}
                <div class="p-6 max-w-xl"> {{-- Menyesuaikan padding agar konsisten --}}
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
