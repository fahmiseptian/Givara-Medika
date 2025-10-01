<!-- Alpine.js (untuk modal ringan) -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@php
    use App\Models\Patnership;
    $patnerships = Patnership::get();
@endphp

<section x-data="partnerModal()" class="bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 py-12">
        <h2 class="mb-8 text-center text-2xl font-bold text-gray-800">Partnership</h2>

        <!-- GRID -->
        <ul class="mx-auto grid max-w-5xl grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-5">
            @foreach($patnerships as $partner)
            <li class="flex flex-col items-center">
                <button
                    @click="open('{{ addslashes($partner->name) }}')"
                    class="group flex h-36 w-36 items-center justify-center rounded-full bg-white shadow-sm ring-1 ring-gray-200 transition hover:shadow-md focus:outline-none focus:ring-4 focus:ring-gray-300"
                    aria-label="{{ $partner->name }}">
                    @if($partner->logo_url)
                        <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                            class="max-h-16 w-auto object-contain grayscale transition group-hover:grayscale-0">
                    @else
                        <span class="text-gray-400">No Logo</span>
                    @endif
                </button>
                <p class="mt-3 text-sm font-medium text-gray-700 text-center">{{ $partner->short_name ?? $partner->name }}</p>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- MODAL -->
    <div
        x-show="show"
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
        @keydown.escape.window="close()"
        style="display:none">
        <div x-transition
            class="w-full max-w-2xl rounded-2xl bg-white p-6 shadow-xl">
            <div class="mb-4 flex items-start justify-between gap-4">
                <h3 class="text-xl font-semibold text-gray-900" x-text="active?.name"></h3>
                <button @click="close()" class="rounded-md p-2 text-gray-500 hover:bg-gray-100">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6.225 4.811L4.811 6.225 10.586 12l-5.775 5.775 1.414 1.414L12 13.414l5.775 5.775 1.414-1.414L13.414 12l5.775-5.775-1.414-1.414L12 10.586z" />
                    </svg>
                </button>
            </div>

            <div class="space-y-3 text-sm text-gray-700">
                <template x-for="line in active?.lines" :key="line">
                    <p x-html="line"></p>
                </template>
            </div>

            <div class="mt-6 flex flex-wrap gap-3">
                <a x-show="active?.tel"
                    :href="`tel:${active.tel}`"
                    class="rounded-lg border px-3 py-2 text-sm font-medium hover:bg-gray-50">Call</a>
                <a x-show="active?.email"
                    :href="`mailto:${active.email}`"
                    class="rounded-lg border px-3 py-2 text-sm font-medium hover:bg-gray-50">Email</a>
                <a x-show="active?.website"
                    :href="active.website" target="_blank" rel="noopener"
                    class="rounded-lg border px-3 py-2 text-sm font-medium hover:bg-gray-50">Website</a>
            </div>
        </div>
    </div>
</section>

<script>
    function partnerModal() {
        // Data di-push dari backend ke frontend
        const partners = [
            @foreach($patnerships as $partner)
            {
                name: @json($partner->name),
                tel: @json($partner->tel ?? null),
                email: @json($partner->email ?? null),
                website: @json($partner->website ?? null),
                lines: [
                    @if($partner->lines)
                        @foreach((is_array($partner->lines) ? $partner->lines : json_decode($partner->lines, true)) as $line)
                            @json($line),
                        @endforeach
                    @else
                        @if($partner->address)
                            @json($partner->address),
                        @endif
                        @if($partner->tel)
                            'Tel: <a class="text-sky-600 hover:underline" href="tel:{{ $partner->tel }}">{{ $partner->tel }}</a>',
                        @endif
                        @if($partner->email)
                            'Email: <a class="text-sky-600 hover:underline" href="mailto:{{ $partner->email }}">{{ $partner->email }}</a>',
                        @endif
                        @if($partner->website)
                            'Website: <a class="text-sky-600 hover:underline" target="_blank" rel="noopener" href="{{ $partner->website }}">{{ $partner->website }}</a>',
                        @endif
                    @endif
                ]
            },
            @endforeach
        ];

        return {
            show: false,
            active: null,
            open(name) {
                this.active = partners.find(p => p.name === name);
                this.show = true;
                document.body.style.overflow = 'hidden';
            },
            close() {
                this.show = false;
                document.body.style.overflow = '';
            }
        }
    }
</script>