<!-- Header -->
<header class="bg-white dark:bg-gray-900 shadow w-full">
    <div class="max-w-7xl mx-auto py-3 px-4 flex justify-between items-center">
        {{ $header }}

        <div class="flex items-center gap-3">
            <!-- Tombol Dark/Light -->
            <button
                @click="dark = !dark; dark ? localStorage.setItem('theme','dark') : localStorage.setItem('theme','light')"
                class="px-3 py-2 rounded-md border border-gray-300 text-gray-700 dark:text-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800"
                aria-label="Toggle Dark Mode">

                <template x-if="!dark">
                    <i class="bi bi-moon-stars text-xl"></i> <!-- Icon Bulan (mode terang) -->
                </template>
                <template x-if="dark">
                    <i class="bi bi-sun text-xl"></i> <!-- Icon Matahari (mode gelap) -->
                </template>
            </button>

            <!-- Tombol Hamburger (hanya mobile) -->
            <button @click="open = true"
                class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md px-3 py-2 border border-gray-300 dark:border-gray-600 md:hidden"
                type="button" aria-label="Buka sidebar">
                <i class="bi bi-list text-3xl"></i>
            </button>
        </div>
    </div>
</header>
