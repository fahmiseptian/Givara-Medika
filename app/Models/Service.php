<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'short_description',
        'description',
    ];
    protected $hidden = ['created_at', 'updated_at', 'media'];
    protected $appends = ['banner_url'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('banner')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']);
    }

    public function getBannerUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('banner');
        if (!$media) {
            return asset('frontend/images/default-banner.png');
        } else {
            if ($media->disk != 'public') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(intval(1140)));
            } else {
                return $media->getUrl();
            }
        }
    }
}
