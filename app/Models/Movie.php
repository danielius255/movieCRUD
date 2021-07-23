<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Movie extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'imdb',
        'seen',
        'schedule',
        'user_id'
        ];

    public static function booted()
    {
        static::creating(function($movie)
        {
                $movie->user_id=\Auth::id();
        });
    }
    public function registerMediaConversions(Media $media = null): void
    {
    $this->addMediaConversion('thumb')
            ->width(200)
            ->height(160);
    }
}
