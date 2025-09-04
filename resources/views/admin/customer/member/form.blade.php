<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            <i class="bi bi-person-plus-fill"></i>
            {{ isset($member) ? 'Edit Member' : 'Add Member' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <form method="POST"
                        action="{{ isset($member) ? route('admin.member.update', $member->id) : route('admin.member.store') }}"
                        autocomplete="off" spellcheck="false">
                        @csrf
                        @if (isset($member))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full
                                Name</label>
                            <input type="text" name="name" id="name"
                                class="block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm
                                    dark:bg-gray-700 dark:placeholder-gray-500 dark:text-white
                                    {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 dark:border-gray-600 focus:ring-primary focus:border-primary' }}"
                                value="{{ old('name', isset($member) ? $member->name : '') }}" required
                                placeholder="Enter full name" autocomplete="off">
                            @error('name')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                            <input type="email" name="email" id="email"
                                class="block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm
                                    dark:bg-gray-700 dark:placeholder-gray-500 dark:text-white
                                    {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 dark:border-gray-600 focus:ring-primary focus:border-primary' }}"
                                value="{{ old('email', isset($member) ? $member->email : '') }}" required
                                placeholder="Enter active email" autocomplete="off">
                            @error('email')
                                <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (!isset($member))
                            <div class="mb-4">
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                                <input type="password" name="password" id="password"
                                    class="block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm
                                    dark:bg-gray-700 dark:placeholder-gray-500 dark:text-white
                                    {{ $errors->has('password') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 dark:border-gray-600 focus:ring-primary focus:border-primary' }}"
                                    required placeholder="Create password" autocomplete="new-password"
                                    onfocus="this.removeAttribute('readonly');" readonly>
                                @error('password')
                                    <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        <div class="flex justify-end space-x-2 mt-4">
                            <a href="{{ route('admin.member.index') }}"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md shadow-sm text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                <i class="bi bi-arrow-left mr-2"></i> Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                <i class="bi {{ isset($member) ? 'bi-save2' : 'bi-plus-circle' }} mr-2"></i>
                                {{ isset($member) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
