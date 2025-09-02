<!-- Sidebar -->
<nav
    class="sidebar bg-white border-end border-gray-200 vh-100 p-3 shadow-sm"
    :class="{'sidebar-mobile-open': open, 'sidebar-mobile-closed': !open && window.innerWidth < 768}"
    x-cloak>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <a href="#" class="d-flex align-items-center text-decoration-none">
            <img src="{{ $setting->logo_url }}" class="me-2" style="height: 36px; width: auto;" />
            <span x-show="open || window.innerWidth >= 768" x-transition.opacity class="fw-bold text-dark ms-1">
                {{ $setting->store_name }}
            </span>
        </a>

        <!-- Tombol tutup (mobile) -->
        <button
            @click="open = false"
            class="btn btn-sm btn-light border ms-2 d-md-none"
            type="button"
            aria-label="Tutup sidebar">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <ul class="nav nav-pills flex-column mb-auto gap-1">
        @if(Auth::user() && Auth::user()->role === 'admin')
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-dark' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>Dashboard</span>
            </a>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard') ? 'active' : 'text-dark' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>Dashboard</span>
            </a>
        </li>
        @endif
        <li>
            <a href="{{ route('profile.edit') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('profile.edit') ? 'active' : 'text-dark' }}">
                <i class="bi bi-person me-2"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center text-dark {{ request()->routeIs('admin.setting.index') || request()->routeIs('admin.setting.privacy_policy') || request()->routeIs('admin.setting.term_and_condition') ? ' active' : 'text-dark' }}" href="#settingSubmenu" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('admin.setting.index') || request()->routeIs('admin.setting.privacy_policy') || request()->routeIs('admin.setting.term_and_condition') ? 'true' : 'false' }}">
                <span>
                    <i class="bi bi-gear me-2"></i>
                    <span class="nav-text">Settings</span>
                </span>
            </a>
            <ul class="collapse list-unstyled ps-4 {{ request()->routeIs('admin.setting.index') || request()->routeIs('admin.setting.privacy_policy') || request()->routeIs('admin.setting.term_and_condition') ? 'show' : 'text-dark' }}" id="settingSubmenu">
                <li>
                    <a class="nav-link{{ request()->routeIs('admin.setting.index') ? ' active' : 'text-dark' }}" href="{{ route('admin.setting.index') }}">
                        <span class="nav-text">Site Settings</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link{{ request()->routeIs('admin.setting.privacy_policy') ? ' active' : 'text-dark' }}" href="{{ route('admin.setting.privacy_policy') }}">
                        <span class="nav-text">Privacy Policy</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link{{ request()->routeIs('admin.setting.term_and_condition') ? ' active' : 'text-dark' }}" href="{{ route('admin.setting.term_and_condition') }}">
                        <span class="nav-text">Terms & Conditions</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="mt-auto pt-4 border-top">
        <div class="d-flex align-items-center mb-3">
            <i class="bi bi-person-circle fs-4 text-secondary"></i>
            <div x-show="open || window.innerWidth >= 768" x-transition.opacity class="ms-2">
                <div class="fw-semibold text-dark">{{ Auth::user()->name }}</div>
                <div class="text-muted small">{{ Auth::user()->email }}</div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right"></i>
                <span x-show="open || window.innerWidth >= 768" x-transition.opacity>Logout</span>
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