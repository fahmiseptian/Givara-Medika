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

                    {{-- Add User Button --}}
                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('admin.user.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:bg-gray-500 dark:active:bg-gray-700">
                        <i class="bi bi-plus-circle mr-2"></i> {{ __('Add User') }}
                        </a>
                    </div>

                    {{-- User Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600 mr-3">
                                            Edit
                                        </a>
                                        <a href="{{ route('admin.user.destroy',$user->id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')){ document.getElementById('delete-user-{{ $user->id }}').submit(); }" class="text-red-600 hover:underline">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300 bg-white dark:bg-gray-800">No users found.</td>
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