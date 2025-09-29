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

<body class="font-sans antialiased bg-white">
    @include('frontend.components.navbar')
    <div class="max-w-3xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Kebijakan Privasi</h1>
        <div class="prose max-w-none">
            {!! $setting->privacy_policy ?? '<p>Kebijakan privasi belum tersedia.</p>' !!}
        </div>
    </div>
    @include('frontend.components.footer')
    @include('layouts.partials.js')

</body>

</html>