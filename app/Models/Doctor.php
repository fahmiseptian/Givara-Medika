<?php

namespace App\Models;

use Carbon\Carbon; // Import Carbon
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Doctor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'content',
    ];
    protected $hidden = ['created_at', 'updated_at', 'media'];
    protected $appends = ['profile_url']; // Mengganti 'profile' menjadi 'profile_url' agar sesuai dengan accessor

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('profile') // Mengganti 'banner' menjadi 'profile'
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']); // Menambahkan gif sebagai tipe yang diterima
    }

    public function getProfileUrlAttribute(): ?string // Mengganti 'getBannerUrlAttribute' menjadi 'getProfileUrlAttribute'
    {
        $media = $this->getFirstMedia('profile'); // Mengganti 'banner' menjadi 'profile'
        if (!$media) {
            // Menghapus logika $this->log yang tidak relevan untuk model Doctor
            return asset('frontend/images/default-profile.png'); // Mengganti default-banner.png menjadi default-profile.png
        } else {
            if ($media->disk != 'public') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(intval(1140)));
            } else {
                return $media->getUrl();
            }
        }
    }
}
