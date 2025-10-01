<nav class="navbar bg-blue-accent text-white">

    <div class="flex">
        <a href="{{ url('/') }}" class="btn btn-ghost normal-case text-xl">
            <img src="{{ $setting->logo_url }}" class="h-10 w-10 rounded-full" alt="Logo">
            <!-- {{ $setting->store_name }} -->
        </a>
        <div class="flex-none hidden md:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/doctors') }}">Doctors</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/reviews') }}">Reviews</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="flex-none md:hidden ml-auto">
        <details class="dropdown dropdown-end">
            <summary class="m-1 btn">☰</summary>
            <ul class="p-2 shadow menu dropdown-content dropdown-end z-[1] bg-blue-accent rounded-box w-52">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/doctors') }}">Doctors</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/reviews') }}">Reviews</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </details>
    </div>
</nav>
