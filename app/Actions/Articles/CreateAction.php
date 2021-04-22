<?php

declare(strict_types=1);

namespace App\Actions\Articles;

use App\Models\Article;

class CreateAction
{
    public function handle(array $attributes): Article
    {
        return Article::createWithAttributes(
            attributes: $attributes,
        );
    }
}
