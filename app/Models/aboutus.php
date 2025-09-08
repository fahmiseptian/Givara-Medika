<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class aboutus extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'aboutuses'; // Menentukan nama tabel sesuai migrasi

    protected $fillable = [ // Menentukan kolom yang dapat diisi secara massal sesuai migrasi
        'title',
        'content',
        'icon1',
        'text1',
        'icon2',
        'text2',
        'icon3',
        'text3',
        'icon4',
        'text4',
    ];

    protected $appends = ['banner1_url', 'banner2_url', 'banner3_url'];

    public function registerMediaCollections(): void
    {
        // Mendefinisikan tiga koleksi media untuk tiga gambar
        $this
            ->addMediaCollection('banner1')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']);

        $this
            ->addMediaCollection('banner2')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']);

        $this
            ->addMediaCollection('banner3')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']);
    }

    /**
     * Mendapatkan URL untuk banner pertama.
     */
    public function getBanner1UrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('banner1');
        if (!$media) {
            // Mengembalikan gambar default jika tidak ada media
            return asset('frontend/images/default-banner.png');
        } else {
            if ($media->disk !== 'public') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(1140));
            } else {
                return $media->getUrl();
            }
        }
    }

    /**
     * Mendapatkan URL untuk banner kedua.
     */
    public function getBanner2UrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('banner2');
        if (!$media) {
            // Mengembalikan gambar default jika tidak ada media
            return asset('frontend/images/default-banner.png');
        } else {
            if ($media->disk !== 'public') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(1140));
            } else {
                return $media->getUrl();
            }
        }
    }

    /**
     * Mendapatkan URL untuk banner ketiga.
     */
    public function getBanner3UrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('banner3');
        if (!$media) {
            // Mengembalikan gambar default jika tidak ada media
            return asset('frontend/images/default-banner.png');
        } else {
            if ($media->disk !== 'public') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(1140));
            } else {
                return $media->getUrl();
            }
        }
    }
}
