<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    //
    use HasFactory;
    use InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->performOnCollections('thumbnails')
            ->fit(Fit::Contain, 368, 232)
            ->nonQueued();
    }

    public function thumbnail(): Attribute
    {
        return Attribute::get(fn() => $this->getMedia('thumbnails')->first()?->getUrl());
    }
}
