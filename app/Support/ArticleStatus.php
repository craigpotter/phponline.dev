<?php

declare(strict_types=1);

namespace App\Support;

class ArticleStatus
{
    public const DRAFT = 'draft'; // not ready to submit for approval
    public const DENIED = 'denied'; // did not pass approval
    public const PENDING = 'pending'; // awaiting approval
    public const PUBLISHED = 'published'; // passed approval

    public const ALL = [
        self::DRAFT,
        self::DENIED,
        self::PUBLISHED,
    ];
}
