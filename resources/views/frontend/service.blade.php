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
    @php
    use App\Models\SeoMeta;
    $seo = SeoMeta::where('page', 'services')->first();
    @endphp
    <meta name="description" content="{{ $seo->meta_description ?? 'Default description' }}">
    <meta name="keywords" content="{{ $seo->meta_keywords ?? '' }}">
    <meta property="og:title" content="{{ $seo->meta_title ?? '' }}">
    <meta property="og:description" content="{{ $seo->meta_description ?? '' }}">
    <meta property="og:image" content="{{ $seo->meta_image ?? asset('default.jpg') }}">
</head>

<body class="font-sans antialiased bg-white">
    @include('frontend.components.navbar')
    @include('frontend.components.services')
    @include('frontend.components.footer')
    @include('layouts.partials.js')

</body>

</html>