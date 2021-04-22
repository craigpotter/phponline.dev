<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::created(
            fn(Model $model) => $model->uuid = Uuid::uuid4()->toString()
        );
    }
}
