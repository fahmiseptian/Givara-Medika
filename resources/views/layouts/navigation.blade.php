<!-- Sidebar -->
<nav class="fixed top-0 left-0 h-screen bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 p-3 shadow-sm dark:shadow-lg transition-all duration-200 ease-in-out z-[1031]
           md:relative md:z-30"
    :class="{
        // Mobile state (default for small screens)
        'w-[220px] min-w-[220px] max-w-[80vw]': true, // Base mobile width
        '-translate-x-full': !open && window.innerWidth < 768, // Mobile closed
        'translate-x-0': open && window.innerWidth < 768, // Mobile open
    
        // Desktop state (default for large screens)
        'md:w-[250px] md:min-w-[250px] md:max-w-[250px]': open && window.innerWidth >= 768, // Desktop open
        'md:w-[70px] md:min-w-[70px] md:max-w-[70px]': !open && window.innerWidth >= 768 // Desktop collapsed
    }"
    x-cloak>
    <div class="flex items-center justify-between mb-4">
        <a href="#" class="flex items-center no-underline">
            <img src="{{ $setting->logo_url }}" class="mr-2 h-9 w-auto" />
            <span x-show="open || window.innerWidth >= 768" x-transition.opacity
                class="font-bold text-gray-900 dark:text-gray-200 ml-1">
                {{ $setting->store_name }}
            </span>
        </a>

        <!-- Tombol tutup (mobile) -->
        <button @click="open = false"
            class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 ml-2 md:hidden"
            type="button" aria-label="Tutup sidebar">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <ul class="flex flex-col mb-auto space-y-1">
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center py-2 px-3 rounded-md transition-colors duration-200 relative {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}">
                <i class="bi bi-speedometer2 mr-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}"
                class="flex items-center py-2 px-3 rounded-md transition-colors duration-200 relative {{ request()->routeIs('profile.edit') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}">
                <i class="bi bi-person mr-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>Profile</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.headline') }}"
                class="flex items-center py-2 px-3 rounded-md transition-colors duration-200 relative {{ request()->routeIs('admin.headline') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}">
                <i class="bi bi-newspaper mr-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>Headline</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.aboutus') }}"
                class="flex items-center py-2 px-3 rounded-md transition-colors duration-200 relative {{ request()->routeIs('admin.aboutus') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}">
                <i class="bi bi-info-circle mr-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>About Us</span>
            </a>
        </li>
        <li x-data="{ submenuOpen: {{ request()->routeIs('admin.doctor.*') ? 'true' : 'false' }} }">
            <a @click="submenuOpen = !submenuOpen"
                class="flex items-center py-2 px-3 rounded-md cursor-pointer transition-colors duration-200 relative
                      {{ request()->routeIs('admin.doctor.*') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}">
                <i class="bi bi-person-plus mr-2"></i> {{-- Icon untuk Dokter --}}
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Dokter</span>
                <i class="bi bi-chevron-down ml-auto transition-transform duration-200"
                    :class="{ 'rotate-180': submenuOpen }"></i>
            </a>
            <ul x-show="submenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-y-0"
                x-transition:enter-end="opacity-100 transform scale-y-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-y-100"
                x-transition:leave-end="opacity-0 transform scale-y-0" class="pl-4 mt-1 space-y-1 list-none origin-top">
                <li>
                    <a class="block py-2 px-3 rounded-md text-sm transition-colors duration-200 relative
                              {{ request()->routeIs('admin.doctor') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}"
                        href="{{ route('admin.doctor') }}">
                        <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Halaman
                            Dokter</span>
                    </a>
                </li>
                <li>
                    <a class="block py-2 px-3 rounded-md text-sm transition-colors duration-200 relative
                              {{ request()->routeIs('admin.doctor.list') || request()->routeIs('admin.doctor.createDoctor') || request()->routeIs('admin.doctor.editDoctor') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}"
                        href="{{ route('admin.doctor.list') }}">
                        <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Daftar
                            Dokter</span>
                    </a>
                </li>
            </ul>
        </li>
        <li x-data="{ submenuOpen: {{ request()->routeIs('admin.member.index') || request()->routeIs('admin.store.index') ? 'true' : 'false' }} }">
            <a @click="submenuOpen = !submenuOpen"
                class="flex items-center py-2 px-3 rounded-md cursor-pointer transition-colors duration-200 relative
                      {{ request()->routeIs('admin.member.index') || request()->routeIs('admin.store.index') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}">
                <i class="bi bi-people mr-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Costomer</span>
                <i class="bi bi-chevron-down ml-auto transition-transform duration-200"
                    :class="{ 'rotate-180': submenuOpen }"></i>
            </a>
            <ul x-show="submenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-y-0"
                x-transition:enter-end="opacity-100 transform scale-y-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-y-100"
                x-transition:leave-end="opacity-0 transform scale-y-0" class="pl-4 mt-1 space-y-1 list-none origin-top">
                <li>
                    <a class="block py-2 px-3 rounded-md text-sm transition-colors duration-200 relative
                              {{ request()->routeIs('admin.member.index') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}"
                        href="{{ route('admin.member.index') }}">
                        <span x-show="open || window.innerWidth >= 768" x-transition.opacity
                            class="nav-text">Member</span>
                    </a>
                </li>
                <li>
                    <a class="block py-2 px-3 rounded-md text-sm transition-colors duration-200 relative
                              {{ request()->routeIs('admin.store.index') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}"
                        href="{{ route('admin.store.index') }}">
                        <span x-show="open || window.innerWidth >= 768" x-transition.opacity
                            class="nav-text">Store</span>
                    </a>
                </li>
            </ul>
        </li>
        <li x-data="{ submenuOpen: {{ request()->routeIs('admin.setting.index') || request()->routeIs('admin.setting.privacy_policy') || request()->routeIs('admin.setting.term_and_condition') ? 'true' : 'false' }} }">
            <a @click="submenuOpen = !submenuOpen"
                class="flex items-center py-2 px-3 rounded-md cursor-pointer transition-colors duration-200 relative
                      {{ request()->routeIs('admin.setting.index') || request()->routeIs('admin.setting.privacy_policy') || request()->routeIs('admin.setting.term_and_condition') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}">
                <i class="bi bi-gear mr-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Settings</span>
                <i class="bi bi-chevron-down ml-auto transition-transform duration-200"
                    :class="{ 'rotate-180': submenuOpen }"></i>
            </a>
            <ul x-show="submenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-y-0"
                x-transition:enter-end="opacity-100 transform scale-y-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-y-100"
                x-transition:leave-end="opacity-0 transform scale-y-0" class="pl-4 mt-1 space-y-1 list-none origin-top">
                <li>
                    <a class="block py-2 px-3 rounded-md text-sm transition-colors duration-200 relative
                              {{ request()->routeIs('admin.setting.index') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}"
                        href="{{ route('admin.setting.index') }}">
                        <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Site
                            Settings</span>
                    </a>
                </li>
                <li>
                    <a class="block py-2 px-3 rounded-md text-sm transition-colors duration-200 relative
                              {{ request()->routeIs('admin.setting.privacy_policy') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}"
                        href="{{ route('admin.setting.privacy_policy') }}">
                        <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Privacy
                            Policy</span>
                    </a>
                </li>
                <li>
                    <a class="block py-2 px-3 rounded-md text-sm transition-colors duration-200 relative
                              {{ request()->routeIs('admin.setting.term_and_condition') ? 'bg-gray-200 dark:bg-gray-700 text-primary' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-primary' }}"
                        href="{{ route('admin.setting.term_and_condition') }}">
                        <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="nav-text">Terms &
                            Conditions</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="mt-auto pt-4 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center mb-3">
            <i class="bi bi-person-circle text-xl text-gray-600 dark:text-gray-400"></i>
            <div x-show="open || window.innerWidth >= 768" x-transition.opacity class="ml-2">
                <div class="font-semibold text-gray-900 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center px-4 py-2 border border-red-600 text-base font-medium rounded-md text-red-600 bg-white dark:bg-gray-800 hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <i class="bi bi-box-arrow-right"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="ml-2">Logout</span>
            </button>
        </form>
    </div>
</nav>
<!-- Script untuk menutup sidebar saat resize ke desktop -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.effect(() => {
            if (window.innerWidth >= 768) {
                document.querySelectorAll('[x-data]').forEach(el => {
                    if (el.__x) el.__x.$data.open = true;
                });
            }
        });
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                document.querySelectorAll('[x-data]').forEach(el => {
                    if (el.__x) el.__x.$data.open = true;
                });
            } else {
                document.querySelectorAll('[x-data]').forEach(el => {
                    if (el.__x) el.__x.$data.open = false;
                });
            }
        });
    });
</script>
