<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Builders\PodcastBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Podcast extends Model
{
    use HasSlug;

    protected $fillable = [
        'uuid',
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

    public function getImage(): string
    {
        if (! is_null($this->meta['twitter:image']) || trim($this->meta['twitter:image']) !== '') {
            return $this->meta['twitter:image'];
        }

        if (! is_null($this->meta['og:image']) || trim($this->meta['og:image']) !== '') {
            return $this->meta['og:image'];
        }

        return 'https://ui-avatars.com/api/?name='.urlencode($this->title).'&color=7F9CF5&background=EBF4FF';
    }

    public function newEloquentBuilder($query): PodcastBuilder
    {
        return new PodcastBuilder($query);
    }
}
