@php
$setting = setting();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.css')
</head>

<body class="font-sans antialiased">
    <div x-data="{ open: window.innerWidth >= 768 }" x-init="
    window.addEventListener('resize', () => {
        open = window.innerWidth >= 768;
    });" class="d-flex">
        @include('layouts.navigation')

        <div class="flex-grow-1 p-4">
            <!-- Page Heading -->
            @if (isset($header))
            @include('layouts.partials.nav')
            @endif

            <!-- Konten Halaman (mentok pojok kiri) -->
            <main class="ms-0" style="margin-left:0;">
                {{ $slot }}
            </main>
        </div>

        @include('layouts.partials.js')
    </div>
</body>

</html>