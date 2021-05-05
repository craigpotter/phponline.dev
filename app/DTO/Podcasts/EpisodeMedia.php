<?php

declare(strict_types=1);

namespace App\DTO\Podcasts;

use Spatie\DataTransferObject\DataTransferObject;

class EpisodeMedia extends DataTransferObject
{
    public ?string $url;
    public ?int $length;
    public ?string $type;
}
