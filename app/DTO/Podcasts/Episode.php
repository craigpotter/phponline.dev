<?php

declare(strict_types=1);

namespace App\DTO\Podcasts;

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class Episode extends DataTransferObject
{
    public ?string $title;
    public ?string $link;
    public ?string $description;
    public ?string $showNotes;
    public ?string $pubDate;
    public ?EpisodeMedia $media;

    public static function hydrate(array $attributes): self
    {
        return new self(
            title: $attributes['title'],
            link: $attributes['link'],
            description: $attributes['description'],
            showNotes: $attributes['showNotes'],
            pubDate: Carbon::parse($attributes['pubDate']),
            media: new EpisodeMedia(
                url: $attributes['media']['url'],
                length: $attributes['media']['length'],
                type: $attributes['media']['type'],
            ),
        );
    }
}
