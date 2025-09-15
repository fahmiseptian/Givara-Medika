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
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>