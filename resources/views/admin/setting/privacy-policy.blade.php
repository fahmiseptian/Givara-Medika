<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-700 leading-tight">
            Privacy Policy
        </h2>
    </x-slot>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body ">
                <x-alert-form class="mb-3" />
                <form method="post" action="{{ route('admin.setting.privacy_policy_store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <textarea rows="5" name="privacy_policy" id="privacy-policy">
                        {{ isset($setting) && !old('privacy_policy') ? $setting->privacy_policy : old('privacy_policy') }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>