<!-- Floating WhatsApp Button -->
<div class="fixed bottom-4 right-4 z-50">
    <a
        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->wa_number) }}?text={{ urlencode('Halo kak, saya mau tanya.') }}"
        target="_blank"
        rel="noopener"
        aria-label="Chat WhatsApp"
        class="group relative flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] shadow-lg transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-[#25D366]/40">
        <!-- Ping effect -->
        <span class="absolute inset-0 rounded-full bg-[#25D366] opacity-30 animate-ping"></span>

        <!-- Badge notifikasi (opsional) -->
        <span class="absolute -top-0.5 -right-0.5 h-3 w-3 rounded-full bg-red-500 ring-2 ring-white"></span>

        <!-- Ikon WhatsApp (SVG) -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
            class="relative h-7 w-7 fill-white drop-shadow">
            <path d="M380.9 97.1C339 55.1 283.2 32 224.8 32 106.4 32 10.7 127.6 10.7 246c0 37.7 9.8 74.5 28.5 107L0 480l129.6-38.2c31.5 17.2 67.1 26.3 103.7 26.3h.1c118.4 0 214.1-95.6 214.1-214 0-58.4-23.2-113.8-66-156.9zM224.8 438.7h-.1c-32.6 0-64.6-8.7-92.4-25.1l-6.6-3.9-76.8 22.6 23-74.8-4.3-7c-17.9-29.2-27.4-62.9-27.4-97.5 0-101.3 82.5-183.8 184-183.8 49.2 0 95.3 19.2 130 54 34.7 34.8 55 80.9 55 130.1 0 101.3-82.6 183.8-184.4 183.8zM322.7 303c-5.3-2.7-31.3-15.4-36.2-17.2-4.9-1.8-8.5-2.7-12.1 2.7-3.6 5.3-13.9 17.2-17.1 20.7-3.1 3.6-6.3 4-11.6 1.3-5.3-2.7-22.3-8.2-42.5-26.2-15.7-14.1-26.3-31.5-29.3-36.8-3.1-5.3-.3-8.2 2.3-10.8 2.3-2.3 5.3-6.3 7.9-9.4 2.6-3.1 3.5-5.4 5.3-9 1.8-3.6.9-6.7-.4-9.4-1.3-2.7-12.1-29.2-16.6-40-4.4-10.6-8.9-9.2-12.1-9.4-3.1-.2-6.7-.2-10.3-.2-3.6 0-9.4 1.3-14.4 6.7-5 5.3-19 18.6-19 45.3 0 26.7 19.5 52.5 22.2 56.2 2.7 3.6 38.3 58.5 92.8 82.1 12.9 5.6 23 8.9 30.9 11.4 13 4.1 24.8 3.5 34.1 2.1 10.4-1.6 31.3-12.8 35.7-25.1 4.4-12.3 4.4-22.8 3.1-25.1-1.2-2.3-4.8-3.7-10.1-6.4z" />
        </svg>

        <!-- Label (muncul saat hover) -->
        <span
            class="pointer-events-none absolute right-16 hidden whitespace-nowrap rounded-full bg-gray-900 px-3 py-1 text-xs font-medium text-white opacity-0 shadow-lg transition group-hover:block group-hover:opacity-100 dark:bg-gray-800">
            Chat via WhatsApp
        </span>
    </a>
</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Alpine JS -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Tom Select JS -->
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.tom-select').forEach(function(el) {
            new TomSelect(el);
        });
    });
</script>

<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
<script>
    window.alert = function(message) {
        Swal.fire({
            title: 'Pemberitahuan',
            text: message,
            icon: 'info',
            confirmButtonText: 'OK',
            background: '#fff',
            color: '#000',
        });
    };

    window.confirm = function(message) {
        const e = window.event;
        const target = e?.target;

        Swal.fire({
            title: 'Confirmation',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                if (target?.tagName === 'A') {
                    const href = target.getAttribute('href');
                    if (href) window.location.href = href;
                } else if (target?.form) {
                    target.form.submit();
                }
            }
        });
        return false;
    };
</script>

<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/lang/summernote-id-ID.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if ($('#term-and-condition').length) {
            $('#term-and-condition').summernote({
                height: 400,
                lang: 'id-ID'
            });
        }
        if ($('#privacy-policy').length) {
            $('#privacy-policy').summernote({
                height: 400,
                lang: 'id-ID'
            });
        }
    });
</script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.datatable').each(function() {
            var $table = $(this);
            var theadCols = $table.find('thead tr').first().find('th').length;
            var tbodyCols = $table.find('tbody tr').first().find('td').length;
            // Pastikan jumlah kolom sama atau tabel kosong
            if (theadCols === tbodyCols || $table.find('tbody tr').length === 0) {
                $table.DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
                    }
                });
            }
        });
    });


    $(document).ready(function() {

    });
</script>
<script>
    function applySummernoteTheme() {
        if ($('body').hasClass('dark')) {
            $('.note-editable').attr('style', 'background-color:#1f2937 !important; color:#d1d5db !important;');
            $('.note-toolbar, .note-statusbar, .note-editor').attr('style', 'background-color:#111827 !important; border-color:#374151 !important;');
        } else {
            $('.note-editable').attr('style', 'background-color:#fff !important; color:#111 !important;');
            $('.note-toolbar, .note-statusbar, .note-editor').attr('style', 'background-color:#f8fafc !important; border-color:#e5e7eb !important;');
        }
    }

    $(document).ready(function() {
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        applySummernoteTheme();

        const observer = new MutationObserver(applySummernoteTheme);
        observer.observe(document.body, {
            attributes: true,
            attributeFilter: ['class']
        });
    });
</script>