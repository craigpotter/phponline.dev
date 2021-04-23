<?php

declare(strict_types=1);

namespace App\Support;

class ArticleLevel
{
    public const BEGINNER = 'beginner';
    public const INTERMEDIATE = 'intermediate';
    public const ADVANCED = 'advanced';

    public const ALL = [
        self::BEGINNER,
        self::INTERMEDIATE,
        self::ADVANCED,
    ];
}
