<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-blue-900 text-white px-6 py-3 shadow-md">
    <div class="container mx-auto flex items-center ">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-3">
            <img src="{{ $setting->logo_url }}" alt="Logo" class="h-12 w-12 rounded-full">
            {{-- <span class="hidden md:block font-bold text-lg">{{ $setting->store_name }}</span> --}}
        </a>

        <!-- Menu -->
        <ul class="flex space-x-8 text-gray-300 font-medium ml-12">
            <li><a href="{{ url('/') }}" class="hover:text-white">Home</a></li>
            <li><a href="{{ url('/about') }}" class="hover:text-white">About Us</a></li>
            <li><a href="{{ url('/doctors') }}" class="hover:text-white">Doctors</a></li>
            <li><a href="{{ url('/services') }}" class="hover:text-white">Service</a></li>
            <li><a href="{{ url('/reviews') }}" class="hover:text-white">Review</a></li>
            <li><a href="{{ url('/contact') }}" class="hover:text-white">Contact</a></li>
        </ul>
    </div>
</nav>
