<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight ">
            <i class="bi bi-person-plus-fill"></i>
            {{ isset($member) ? 'Edit Store' : 'Add Store' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-4">
                <div class="p-5">
                    <form 
                        method="POST" 
                        action="{{ isset($member) ? route('admin.store.update', $member->id) : route('admin.store.store') }}"
                        autocomplete="off"
                        spellcheck="false"
                    >
                        @csrf
                        @if(isset($member))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold text-primary">Store Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="form-control form-control-lg shadow-sm @error('name') is-invalid @enderror"
                                value="{{ old('name', isset($member) ? $member->name : '') }}" 
                                required 
                                placeholder="Enter full name"
                                autocomplete="off"
                                style="background: #f8fafc;"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold text-primary">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="form-control form-control-lg shadow-sm @error('email') is-invalid @enderror"
                                value="{{ old('email', isset($member) ? $member->email : '') }}" 
                                required 
                                placeholder="Enter active email"
                                autocomplete="off"
                                style="background: #f8fafc;"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(!isset($member))
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-primary">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-control form-control-lg shadow-sm @error('password') is-invalid @enderror"
                                required 
                                placeholder="Create password"
                                autocomplete="new-password"
                                style="background: #f8fafc;"
                                onfocus="this.removeAttribute('readonly');"
                                readonly
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('admin.member.index') }}" class="btn btn-outline-secondary px-4 py-2 shadow-sm">
                                <i class="bi bi-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm">
                                <i class="bi {{ isset($member) ? 'bi-save2' : 'bi-plus-circle' }}"></i>
                                {{ isset($member) ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>