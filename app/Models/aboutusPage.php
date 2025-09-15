<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Carbon\Carbon;

class AboutusPage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'aboutus_pages';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['banner_url'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('banner')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/gif']);
    }

    public function getBannerUrlAttribute()
    {
        $media = $this->getFirstMedia('banner');
        if (!$media) {
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
