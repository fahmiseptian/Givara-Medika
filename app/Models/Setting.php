<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'setting';
    protected $fillable = [
        'store_name',
        'slogan',
        'bio',
        'address',
        'email',
        'phone_number',
        'wa_number',
        'term_and_condition',
        'privacy_policy',
        'link_playstore',
        'link_appstore',
        'link_fb',
        'link_twitter',
        'link_ig'
    ];
    protected $hidden = ['created_at', 'updated_at', 'media'];
    protected $appends = ['logo_url'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg']);
    }

    public function getLogoUrlAttribute($value)
    {
        $media = $this->getFirstMedia('logo');
        if (!$media) {
            if (isset($this->log) && isset($this->log->logo_url)) {
                return $this->log->logo_url;
            } else {
                return asset('frontend/images/logo-flooring.png');
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
