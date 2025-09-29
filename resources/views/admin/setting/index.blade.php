<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="bi bi-gear mr-2"></i> {{-- Menggunakan ikon pengaturan --}}
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <x-alert-form class="mb-6" /> {{-- Menyesuaikan margin bawah --}}
                    <form method="post" action="{{ route('admin.setting.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6 flex flex-col items-center"> {{-- Menyesuaikan margin bawah dan kelas Tailwind --}}
                            <div class="relative mb-2">
                                <img src="{{ $setting->logo_url ?? asset('images/default-logo.png') }}"
                                    alt="{{ $setting->store_name ?? 'Store Logo' }}" width="120" id="preview"
                                    class="w-32 h-32 object-cover rounded-full shadow-md border-4 border-indigo-500 dark:border-indigo-400">
                                {{-- Menggunakan kelas Tailwind untuk styling --}}
                                <label for="logo"
                                    class="absolute bottom-0 right-0 transform translate-x-1/4 translate-y-1/4 p-2 bg-white dark:bg-gray-700 rounded-full shadow-md cursor-pointer">
                                    {{-- Menggunakan kelas Tailwind untuk styling dan dark mode --}}
                                    <i class="bi bi-pencil-square text-indigo-600 dark:text-indigo-400 text-lg"></i>
                                    {{-- Menggunakan warna indigo untuk ikon dan dark mode --}}
                                    <input class="hidden" accept="image/*" type="file" id="logo"
                                        name="logo" /> {{-- Menggunakan kelas hidden --}}
                                </label>
                            </div>
                            <div class="mt-2">
                                <span
                                    class="font-semibold text-gray-600 dark:text-gray-400">{{ __('Change Logo') }}</span>
                                {{-- Menggunakan kelas Tailwind untuk teks dan dark mode --}}
                            </div>
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" /> {{-- Menambahkan pesan error untuk logo --}}
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> {{-- Menggunakan grid Tailwind untuk layout responsif --}}
                            <div>
                                <x-input-label for="store_name" :value="__('Store Name')" />
                                <x-text-input id="store_name" name="store_name" type="text" class="mt-1 block w-full"
                                    :value="old('store_name', $setting->store_name ?? '')" autocomplete="organization" />
                                <x-input-error :messages="$errors->get('store_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="slogan" :value="__('Slogan')" />
                                <x-text-input id="slogan" name="slogan" type="text" class="mt-1 block w-full"
                                    :value="old('slogan', $setting->slogan ?? '')" />
                                <x-input-error :messages="$errors->get('slogan')" class="mt-2" />
                            </div>
                            <div class="md:col-span-2"> {{-- Menggunakan col-span-2 untuk lebar penuh pada medium screen ke atas --}}
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                    :value="old('address', $setting->address ?? '')" autocomplete="street-address" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $setting->email ?? '')" autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" name="phone_number" type="text"
                                    class="mt-1 block w-full" :value="old('phone_number', $setting->phone_number ?? '')" autocomplete="tel" />
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="wa_number" :value="__('WhatsApp Number')" />
                                <x-text-input id="wa_number" name="wa_number" type="text" class="mt-1 block w-full"
                                    :value="old('wa_number', $setting->wa_number ?? '')" />
                                <x-input-error :messages="$errors->get('wa_number')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="text_wa" :value="__('WhatsApp Text')" />
                                <x-text-input id="text_wa" name="text_wa" type="text" class="mt-1 block w-full"
                                    :value="old('text_wa', $setting->text_wa ?? '')" />
                                <x-input-error :messages="$errors->get('text_wa')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="link_gmaps" :value="__('Google maps Link')" />
                                <x-text-input id="link_gmaps" name="link_gmaps" type="text" class="mt-1 block w-full"
                                    :value="old('link_gmaps', $setting->link_gmaps ?? '')" />
                                <x-input-error :messages="$errors->get('link_gmaps')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="link_fb" :value="__('Facebook Link')" />
                                <x-text-input id="link_fb" name="link_fb" type="text" class="mt-1 block w-full"
                                    :value="old('link_fb', $setting->link_fb ?? '')" />
                                <x-input-error :messages="$errors->get('link_fb')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="link_twitter" :value="__('Twitter Link')" />
                                <x-text-input id="link_twitter" name="link_twitter" type="text"
                                    class="mt-1 block w-full" :value="old('link_twitter', $setting->link_twitter ?? '')" />
                                <x-input-error :messages="$errors->get('link_twitter')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="link_ig" :value="__('Instagram Link')" />
                                <x-text-input id="link_ig" name="link_ig" type="text" class="mt-1 block w-full"
                                    :value="old('link_ig', $setting->link_ig ?? '')" />
                                <x-input-error :messages="$errors->get('link_ig')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-6"> {{-- Menggunakan kelas Tailwind untuk posisi dan margin --}}
                            <x-primary-button class="ms-3"> {{-- Menggunakan komponen tombol utama --}}
                                <i class="bi bi-save mr-2"></i> {{ __('Save') }}
                            </x-primary-button>

                            @if (session('status') === 'setting-updated')
                                {{-- Menambahkan notifikasi status simpan --}}
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Preview logo image on upload
        document.addEventListener('DOMContentLoaded', function() {
            const inputLogo = document.getElementById('logo');
            const preview = document.getElementById('preview');
            if (inputLogo) {
                inputLogo.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(ev) {
                            preview.src = ev.target.result;
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }
        });
    </script>
</x-app-layout>
