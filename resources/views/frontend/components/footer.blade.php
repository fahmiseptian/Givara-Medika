<footer class="bg-gray-100 text-gray-700">
    <div class="mx-auto max-w-7xl px-6 py-12">
        <div class="grid gap-10 md:grid-cols-12">
            <!-- Brand / Logo -->
            <div class="md:col-span-3">
                <a href="{{ url('/') }}" class="flex flex-col items-center gap-2">
                    <img src="{{ $setting->logo_url }}" alt="{{ $setting->store_name }}" class="h-40 w-40 rounded-full mb-2">
                    <div class="text-center">
                        <p class="text-xl font-semibold tracking-wide">{{ $setting->store_name }}</p>
                        <p class="text-xs text-gray-500 -mt-1">{{ $setting->slogan }}</p>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <div class="md:col-span-2">
                <h4 class="mb-4 text-lg font-semibold text-gray-900">Navigation</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/') }}" class="hover:text-sky-600 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-4 0h4" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}" class="hover:text-sky-600 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/doctors') }}" class="hover:text-sky-600 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M8 7a4 4 0 118 0 4 4 0 01-8 0zm8 8a6 6 0 00-12 0v1a1 1 0 001 1h10a1 1 0 001-1v-1z" />
                            </svg>
                            Doctors
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/services') }}" class="hover:text-sky-600 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 17v-2a4 4 0 018 0v2M5 21h14a2 2 0 002-2v-7a2 2 0 00-2-2h-1V7a5 5 0 00-10 0v3H5a2 2 0 00-2 2v7a2 2 0 002 2z" />
                            </svg>
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/reviews') }}" class="hover:text-sky-600 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            Reviews
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="hover:text-sky-600 transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 10.5a8.38 8.38 0 01-1.9.5 4.48 4.48 0 00-7.6 0 8.38 8.38 0 01-1.9-.5A9 9 0 003 19a9 9 0 0018 0 9 9 0 00-0-8.5z" />
                            </svg>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Internet Policies -->
            <div class="md:col-span-2">
                <h4 class="mb-4 text-lg font-semibold text-gray-900">Internet Policies</h4>
                <ul class="space-y-3">
                    <li><a class="hover:text-gray-900" href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                    <li><a class="hover:text-gray-900" href="{{ url('/terms-conditions') }}">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Get In Touch -->
            <div class="md:col-span-3">
                <h4 class="mb-4 text-lg font-semibold text-gray-900">Get In Touch</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <!-- phone icon -->
                        <svg class="mt-0.5 h-5 w-5 flex-none text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79a15.54 15.54 0 006.59 6.59l1.82-1.82a1 1 0 011.01-.24 11.36 11.36 0 003.57.57 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h2.11a1 1 0 011 1 11.36 11.36 0 00.57 3.57 1 1 0 01-.24 1.01l-1.82 1.82z" />
                        </svg>
                        <div>
                            <p class="font-medium">Emergency Line (24 Hour):</p>
                            <a href="tel:+{{ $setting->phone_number }}" class="text-sky-600 hover:underline">{{ $setting->phone_number }}</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <!-- mail icon -->
                        <svg class="mt-0.5 h-5 w-5 flex-none text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4a2 2 0 00-2 2v.4l10 6.25L22 6.4V6a2 2 0 00-2-2zm0 4.25l-8 5-8-5V18a2 2 0 002 2h16a2 2 0 002-2V8.25z" />
                        </svg>
                        <div>
                            <p class="font-medium">General Inquiries:</p>
                            <a href="mailto:{{ $setting->email }}" class="text-sky-600 hover:underline">{{ $setting->email }}</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <!-- globe icon -->
                        <svg class="mt-0.5 h-5 w-5 flex-none text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm6.93 6h-3.26a15.7 15.7 0 00-1.14-3.48A8.031 8.031 0 0118.93 8zM12 4a13.5 13.5 0 011.72 4H10.3A13.5 13.5 0 0112 4zM4.07 8a8.031 8.031 0 013.4-3.48A15.7 15.7 0 006.33 8zM4 12a7.97 7.97 0 01.22-2h3.73a17.3 17.3 0 000 4H4.22A7.97 7.97 0 014 12zm.07 4h3.26a15.7 15.7 0 001.14 3.48A8.031 8.031 0 014.07 16zM12 20a13.5 13.5 0 01-1.72-4h3.42A13.5 13.5 0 0112 20zm4.53-.52A15.7 15.7 0 0017.67 16h3.26a8.031 8.031 0 01-4.4 3.48zM19.78 14h-3.73a17.3 17.3 0 000-4h3.73a7.97 7.97 0 010 4zM8.47 19.48A15.7 15.7 0 016.33 16H3.07a8.031 8.031 0 004.4 3.48z" />
                        </svg>
                        <a href="https://givaramedical.com" class="mt-0.5 text-sky-600 hover:underline" target="_blank" rel="noopener">www.givaramedical.com</a>
                    </li>
                    <li class="flex items-start gap-3">
                        <!-- map icon -->
                        <svg class="mt-0.5 h-5 w-5 flex-none text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5A2.5 2.5 0 1114.5 9 2.5 2.5 0 0112 11.5z" />
                        </svg>
                        <span class="mt-0.5">{{ $setting->address }}</span>
                    </li>
                </ul>
            </div>

            <!-- Social -->
            <div class="md:col-span-2">
                <div class="mt-6">
                    <p class="mb-3 font-semibold">Find Us</p>
                    <div class="flex items-center gap-3">
                        <a aria-label="Facebook" href="{{ $setting->link_fb }}" target="_blank" rel="noopener" class="rounded-md p-2 hover:bg-gray-200">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22 12a10 10 0 10-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0022 12z" />
                            </svg>
                        </a>
                        <a aria-label="Instagram" href="{{ $setting->link_ig }}" target="_blank" rel="noopener" class="rounded-md p-2 hover:bg-gray-200">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5zm10 2H7a3 3 0 00-3 3v10a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3zm-5 3.8A4.2 4.2 0 1112 17.2 4.2 4.2 0 0112 7.8zm0 2a2.2 2.2 0 102.2 2.2A2.2 2.2 0 0012 9.8zm5.3-.9a1 1 0 111-1 1 1 0 01-1 1z" />
                            </svg>
                        </a>
                        <a aria-label="Twitter" href="{{ $setting->link_twitter }}" target="_blank" rel="noopener" class="rounded-md p-2 hover:bg-gray-200">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.46 6c-.77.35-1.6.59-2.47.7a4.3 4.3 0 001.88-2.38 8.59 8.59 0 01-2.72 1.04 4.28 4.28 0 00-7.29 3.9A12.13 12.13 0 013 5.15a4.28 4.28 0 001.32 5.71c-.7-.02-1.36-.21-1.94-.53v.05a4.28 4.28 0 003.43 4.19c-.33.09-.68.14-1.04.14-.25 0-.5-.02-.74-.07a4.29 4.29 0 004 2.98A8.6 8.6 0 012 19.54a12.13 12.13 0 006.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.39-.01-.58A8.72 8.72 0 0024 4.59a8.5 8.5 0 01-2.54.7z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bottom bar -->
    <div class="border-t border-gray-200">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-6 py-4 text-sm text-gray-500 md:flex-row">
            <p>© <span id="year"></span> {{ $setting->store_name }}. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="{{ url('/privacy-policy') }}" class="hover:text-gray-700">Privacy Policy</a>
                <a href="{{ url('/terms-conditions') }}" class="hover:text-gray-700">Terms</a>
            </div>
        </div>
    </div>
</footer>