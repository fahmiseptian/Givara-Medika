<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-700 leading-tight">
            Term and Condition
        </h2>
    </x-slot>

    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <x-alert-form class="mb-3" />
                <form method="post" action="{{ route('admin.setting.term_and_condition_store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <textarea rows="5" name="term_and_condition" id="term-and-condition">
                        {{ isset($setting) && !old('term_and_condition') ? $setting->term_and_condition : old('term_and_condition') }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>