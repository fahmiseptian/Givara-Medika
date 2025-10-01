<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Carbon\Carbon;

class Patnership extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'patnership'; 
    protected $guarded = [];
    protected $appends = ['logo_url'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']);
    }

    public function getLogoUrlAttribute()
    {
        $media = $this->getFirstMedia('logo');
        if (!$media) {
            return asset('frontend/images/default-logo.png');
        } else {
            if ($media->disk != 'public') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(1140));
            } else {
                return $media->getUrl();
            }
        }
    }
}
