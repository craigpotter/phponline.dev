<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PodcastEpisode extends Model
{
    protected $fillable = [
        'title',
        'description',
        'show_notes',
        'external_url',
        'copyright',
        'podcast_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(
            Podcast::class,
            'podcast_id',
        );
    }
}
