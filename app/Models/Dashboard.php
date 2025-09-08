<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

class Dashboard extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'dashboard';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'media'];
    protected $appends = ['banner_url']; // Mengganti 'logo_url' menjadi 'banner_url'

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('banner') // Mengganti 'logo' menjadi 'banner'
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']); // Menambahkan gif sebagai tipe yang diterima
    }

    public function getBannerUrlAttribute($value) // Mengganti 'getLogoUrlAttribute' menjadi 'getBannerUrlAttribute'
    {
        $media = $this->getFirstMedia('banner');
        if (!$media) {
            if (isset($this->log) && isset($this->log->banner_url)) {
                return $this->log->banner_url;
            } else {
                return asset('frontend/images/default-banner.png');
            }
        } else {
            if ($media->disk != 'public') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(intval(1140)));
            } else {
                return $media->getUrl();
            }
        }
    }
}
