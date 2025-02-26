<?php

namespace App\Models;

use App\Enums\Rating;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    public function ratings(): HasMany
    {
        return $this->hasMany(ServiceRating::class);
    }

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
