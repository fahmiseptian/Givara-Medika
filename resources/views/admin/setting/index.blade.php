<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg fw-semibold text-gray-700 leading-tight">
            Site Settings
        </h2>
    </x-slot>

    <div class="container my-4">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <x-alert-form class="mb-3" />
                <form method="post" action="{{ route('admin.setting.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 d-flex flex-column align-items-center">
                        <div class="position-relative mb-2">
                            <img src="{{ $setting->logo_url ?? '' }}" alt="{{ $setting->store_name }}" width="120"
                                id="preview" class="img-thumbnail rounded-circle shadow-sm border border-3 border-primary" style="object-fit:cover; height:120px;">
                            <label for="logo" class="position-absolute bottom-0 end-0 translate-middle p-1 bg-white rounded-circle shadow" style="cursor:pointer;">
                                <i class="bi bi-pencil-square text-primary"></i>
                                <input class="d-none" accept="image/*" type="file" id="logo" name="logo" />
                            </label>
                        </div>
                        <div class="mt-2">
                            <span class="fw-bold text-secondary">Change Logo</span>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="store_name" name="store_name"
                                    value="{{ isset($setting) && !old('store_name') ? $setting->store_name : old('store_name') }}"
                                    placeholder="Enter store name" />
                                <label for="store_name" class="fw-bold">Store Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="slogan" name="slogan"
                                    value="{{ isset($setting) && !old('slogan') ? $setting->slogan : old('slogan') }}"
                                    placeholder="Enter slogan" />
                                <label for="slogan" class="fw-bold">Slogan</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ isset($setting) && !old('address') ? $setting->address : old('address') }}"
                                    placeholder="Enter address" />
                                <label for="address" class="fw-bold">Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ isset($setting) && !old('email') ? $setting->email : old('email') }}"
                                    placeholder="Enter email" />
                                <label for="email" class="fw-bold">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ isset($setting) && !old('phone_number') ? $setting->phone_number : old('phone_number') }}"
                                    placeholder="Enter phone number" />
                                <label for="phone_number" class="fw-bold">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="wa_number" name="wa_number"
                                    value="{{ isset($setting) && !old('wa_number') ? $setting->wa_number : old('wa_number') }}"
                                    placeholder="Enter WhatsApp number" />
                                <label for="wa_number" class="fw-bold">WhatsApp Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="link_fb" name="link_fb"
                                    value="{{ isset($setting) && !old('link_fb') ? $setting->link_fb : old('link_fb') }}"
                                    placeholder="Enter Facebook link" />
                                <label for="link_fb" class="fw-bold">Facebook Link</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="link_twitter" name="link_twitter"
                                    value="{{ isset($setting) && !old('link_twitter') ? $setting->link_twitter : old('link_twitter') }}"
                                    placeholder="Enter Twitter link" />
                                <label for="link_twitter" class="fw-bold">Twitter Link</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="link_ig" name="link_ig"
                                    value="{{ isset($setting) && !old('link_ig') ? $setting->link_ig : old('link_ig') }}"
                                    placeholder="Enter Instagram link" />
                                <label for="link_ig" class="fw-bold">Instagram Link</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-5 py-2 rounded-3 shadow-sm fw-semibold">
                            <i class="bi bi-save me-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Preview logo image on upload
        document.addEventListener('DOMContentLoaded', function () {
            const inputLogo = document.getElementById('logo');
            const preview = document.getElementById('preview');
            if (inputLogo) {
                inputLogo.addEventListener('change', function (e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function (ev) {
                            preview.src = ev.target.result;
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }
        });
    </script>
</x-app-layout>