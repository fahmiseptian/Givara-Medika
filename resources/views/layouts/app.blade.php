@php
    $setting = setting();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    dark: localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
}" :class="{ 'dark': dark }">

<head>
    @include('layouts.partials.css')
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div x-data="{ open: window.innerWidth >= 768 }" x-init="window.addEventListener('resize', () => {
        open = window.innerWidth >= 768;
    });" class="flex">
        @include('layouts.navigation')

        <div class="flex-grow p-4">
            <!-- Page Heading -->
            @if (isset($header))
                @include('layouts.partials.nav')
            @endif

            <!-- Konten Halaman (mentok pojok kiri) -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @include('layouts.partials.js')
    </div>
</body>

</html>
