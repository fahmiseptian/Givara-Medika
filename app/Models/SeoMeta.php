<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SeoMeta extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'seo_meta';
    protected $fillable = ['page', 'meta_title', 'meta_description', 'meta_keywords', 'meta_image'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('meta_image')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/svg', 'image/gif']);
    }
}
