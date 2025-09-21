<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="bi bi-people-fill mr-2"></i>
            {{ __('Admin Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <x-alert-form class="mb-6" />

                    {{-- Form User Admin --}}
                    <form method="POST" action="{{ isset($user) ? route('admin.user.update', $user->id) : route('admin.user.store') }}">
                        @csrf
                        @if(isset($user))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('name', $user->name ?? '') }}" required>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                value="{{ old('email', $user->email ?? '') }}" required>
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jika create user, password wajib diisi --}}
                        @if(!isset($user))
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                            <input type="password" name="password" id="password"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                required>
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        @else
                        {{-- Jika edit user, password opsional --}}
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password <span class="text-xs text-gray-500">(Kosongkan jika tidak ingin mengubah password)</span></label>
                            <input type="password" name="password" id="password"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                autocomplete="new-password">
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        @endif

                        <div class="flex items-center space-x-2">
                            <x-primary-button>
                                {{ isset($user) ? __('Update') : __('Create') }}
                            </x-primary-button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>