<?php

declare(strict_types=1);

namespace App\Events\Articles;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ArticleDenied extends ShouldBeStored
{
    public function __construct(
        public string $articleUuid,
    ) {}
}
