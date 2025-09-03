<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight ">
            {{ __('Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-12 ms-0">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-alert-form class="mb-3" />

                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('admin.member.create') }}" class="btn btn-primary shadow">
                        <i class="bi bi-plus-circle me-1"></i> Add Member
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle rounded shadow-sm overflow-hidden">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 60px;">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-nowrap">Created At</th>
                                <th class="text-center" style="width: 160px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $index => $member)
                            <tr>
                                <td class="text-center fw-bold">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-person-circle fs-5 text-secondary"></i>
                                        <span>{{ $member->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark px-2 py-1">
                                        <i class="bi bi-envelope me-1"></i>{{ $member->email }}
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    <span class="badge bg-success bg-opacity-10 text-success">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $member->created_at ? $member->created_at->format('d-m-Y H:i') : '-' }}
                                    </span>
                                </td>
                                <td class="text-center d-flex justify-content-center">
                                    <a href="{{ route('admin.member.edit', $member->id) }}" class="btn btn-warning btn-sm me-1 shadow-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.member.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this member?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-2">
                                    <i class="bi bi-emoji-frown fs-3 d-block mb-2"></i>
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