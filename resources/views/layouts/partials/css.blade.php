<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $setting->store_name }}</title>
<!-- Logo Situs -->
<link rel="icon" type="image/png" href="{{ $setting->logo_url }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Tom Select CSS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">

<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">

<style>
    :root {
        --color-primary: #0d6efd;
        /* Biru Bootstrap */
        --color-secondary: #6c757d;
        /* Abu-abu Bootstrap */
        --color-background: #f8f9fa;
        /* Background terang */
        --color-font: #212529;
        /* Warna teks utama */
    }

    /* Terapkan warna ke elemen utama */
    body {
        background-color: var(--color-background);
        color: var(--color-font);
    }

    .bg-primary {
        background-color: var(--color-primary) !important;
    }

    .bg-secondary {
        background-color: var(--color-secondary) !important;
    }

    .text-primary {
        color: var(--color-primary) !important;
    }

    .text-secondary {
        color: var(--color-secondary) !important;
    }

    .text-main {
        color: var(--color-font) !important;
    }

    .sidebar {
        width: 250px;
        min-width: 250px;
        max-width: 250px;
        transition: all 0.2s ease;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
        z-index: 100;
        background: var(--color-background);
    }

    /* Sidebar collapsed (desktop) */
    @media (min-width: 768px) {
        .sidebar-collapsed {
            width: 70px !important;
            min-width: 70px !important;
            max-width: 70px !important;
        }
    }

    /* Sidebar mobile: slide in/out */
    @media (max-width: 767.98px) {
        .sidebar {
            left: 0;
            top: 0;
            height: 100vh;
            position: fixed;
            z-index: 1031;
            width: 220px !important;
            min-width: 220px !important;
            max-width: 80vw;
            transform: translateX(-100%);
            transition: transform 0.2s;
            background: var(--color-background);
        }

        .sidebar-mobile-open {
            transform: translateX(0) !important;
        }

        .sidebar-mobile-closed {
            transform: translateX(-100%) !important;
        }
    }

    [x-cloak] {
        display: none !important;
    }

    .nav-link.active {
        position: relative;
        color: var(--color-primary) !important;
        background-color: transparent !important;
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        top: 8px;
        right: 0;
        width: 2px;
        height: calc(100% - 16px);
        background-color: var(--color-primary);
        border-radius: 2px;
    }

    .nav-link {
        border-radius: 0.375rem;
        transition: background 0.2s, color 0.2s;
        position: relative;
    }

    .nav-link:not(.active):hover {
        background: var(--color-background);
        color: var(--color-primary);
    }

    /* Z-index untuk tombol hamburger */
    .z-1030 {
        z-index: 1030 !important;
    }
</style>