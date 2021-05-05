<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PodcastEpisode extends Model
{
    use HasUuid;
    
    protected $fillable = [
        'title',
        'description',
        'show_notes',
        'external_url',
        'media',
        'podcast_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'media' => 'json',
    ];

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(
            Podcast::class,
            'podcast_id',
        );
    }
}
