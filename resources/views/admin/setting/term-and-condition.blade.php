<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="bi bi-journal-text mr-2"></i> {{-- Menggunakan ikon untuk Syarat dan Ketentuan --}}
            {{ __('Term and Condition') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <x-alert-form class="mb-6" /> {{-- Menyesuaikan margin bawah --}}
                    <form method="post" action="{{ route('admin.setting.term_and_condition_store') }}">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="term-and-condition" :value="__('Term and Condition Content')" />
                            <textarea id="term-and-condition" name="term_and_condition" rows="10"
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ old('term_and_condition', $setting->term_and_condition ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('term_and_condition')" class="mt-2" />
                        </div>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
