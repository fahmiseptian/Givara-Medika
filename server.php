<?php
$public = __DIR__ . '/public';
$uri    = $_SERVER['REQUEST_URI'];

// handle file di /storage agar bisa tampil sebagai gambar
if (strpos($uri, '/storage/') === 0) {
    $path = $public . $uri;
    if (is_file($path)) {
        // Deteksi mime type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime  = finfo_file($finfo, $path);
        finfo_close($finfo);

        header("Content-Type: $mime");
        header("Content-Length: " . filesize($path));
        readfile($path);
        exit;
    }
}

if (!is_dir($public)) {
    http_response_code(500);
    echo "Folder 'public' tidak ditemukan. Harusnya ada di " . $public;
    exit;
}

// Set working dir ke /public lalu jalankan index.php Laravel
chdir($public);
require $public . '/index.php';
