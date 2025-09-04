<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-alert-form class="mb-4" />

                <div class="flex justify-end mb-4">
                    <a href="{{ route('admin.member.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <i class="bi bi-plus-circle mr-2"></i> Add Member
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table
                        class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg overflow-hidden shadow-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider w-16">
                                    No
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider whitespace-nowrap">
                                    Created At
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider w-40">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($members as $index => $member)
                                <tr
                                    class="hover:bg-gray-50 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-900">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center font-bold text-gray-900 dark:text-white">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <i class="bi bi-person-circle text-lg text-secondary"></i>
                                            <span class="text-gray-900 dark:text-white">{{ $member->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                                            <i class="bi bi-envelope mr-1"></i>{{ $member->email }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                            <i class="bi bi-calendar-event mr-1"></i>
                                            {{ $member->created_at ? $member->created_at->format('d-m-Y H:i') : '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('admin.member.edit', $member->id) }}"
                                                class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                <i class="bi bi-pencil-square mr-1"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.member.destroy', $member->id) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this member?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    <i class="bi bi-trash mr-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        <i class="bi bi-emoji-frown text-3xl block mb-2"></i>
                                        No member data found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
