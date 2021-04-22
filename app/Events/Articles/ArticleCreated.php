<?php

declare(strict_types=1);

namespace App\Events\Articles;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ArticleCreated extends ShouldBeStored
{
    public function __construct(
        public array $articleAttributes,
    ) {}
}
