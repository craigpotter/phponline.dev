<?php

declare(strict_types=1);

namespace App\Events\Articles;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ArticleDeleted extends ShouldBeStored
{
    public function __construct(
        public string $articleUuid,
    ) {}
}
