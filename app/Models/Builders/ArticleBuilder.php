<?php

declare(strict_types=1);

namespace App\Models\Builders;

use App\Support\ArticleStatus;
use Illuminate\Database\Eloquent\Builder;

class ArticleBuilder extends Builder
{
    public function published(): self
    {
        $this->where('status', ArticleStatus::PUBLISHED);

        return $this;
    }
}
