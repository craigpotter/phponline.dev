<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Podcast extends Model
{
    use HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'external_url',
        'feed_url',
        'published',
        'meta',
        'user_id',
    ];

    protected $casts = [
        'published' => 'boolean',
        'meta' => 'json',
    ];

    public function getSluggable(): string
    {
        return $this->title;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
        );
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(
            PodcastEpisode::class,
            'podcast_id',
        );
    }
}
