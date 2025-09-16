@php
$setting = setting();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{
        dark: localStorage.getItem('theme') === 'dark' ||
              (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
        open: window.innerWidth >= 768,
        get isDesktop(){ return window.innerWidth >= 768 },
      }"
    :class="{ 'dark': dark }">

<head>
    @include('layouts.partials.css')
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    {{-- Sidebar fixed (tetap seperti kode Anda) --}}
    @include('layouts.navigation')

    {{-- Wrapper konten: kasih margin-left dinamis saat desktop --}}
    <div
        x-init="
        // sinkron saat resize
        window.addEventListener('resize', () => {
          open = window.innerWidth >= 768 ? open : false; // bebas: bisa pakai logika Anda
        });
      "
        class="min-h-screen transition-all duration-200 ease-in-out"
        :class="{
        // Desktop: geser konten sesuai lebar sidebar
        'md:ml-[250px]': open && isDesktop,
        'md:ml-[70px]':  !open && isDesktop,
        // Mobile: konten full, sidebar overlay
        'ml-0': !isDesktop
      }">
        {{-- (opsional) Jika ada top nav fixed, tambahkan pt sesuai tinggi nav --}}
        {{-- <div class="pt-[56px] md:pt-[64px]"> --}}

        <!-- Page Heading -->
        @if (isset($header))
        @include('layouts.partials.nav')
        @endif

        <!-- Konten Halaman (tidak lagi ketiban) -->
        <main class="p-4">
            {{ $slot }}
        </main>

        {{-- </div> --}}
    </div>

    @include('layouts.partials.js')
</body>

</html>