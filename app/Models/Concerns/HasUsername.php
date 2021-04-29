<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasUsername
{
    public static function bootHasUsername()
    {
        static::creating(
            fn(Model $model) => $model->username = Str::slug($model->name)
        );
    }

    public function getRouteKeyName(): string
    {
        return 'username';
    }
}
