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
    @include('frontend.components.doctor')
    @include('frontend.components.doctors')

    @include('layouts.partials.js')

</body>

</html>
