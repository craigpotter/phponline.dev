<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Builders\PackageBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasSlug;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'external_url',
        'published',
        'meta',
        'user_id',
    ];

    protected $casts = [
        'published' => 'boolean',
        'meta' => 'json',
    ];

    public function getSluggable(): string
    {
        return $this->title;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
        );
    }

    public function newEloquentBuilder($query): PackageBuilder
    {
        return new PackageBuilder($query);
    }
}
