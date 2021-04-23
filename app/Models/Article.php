<?php

declare(strict_types=1);

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Casts\Normalise;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\HasUuid;
use App\Events\Articles\ArticleDenied;
use App\Events\Articles\ArticleCreated;
use App\Events\Articles\ArticleDeleted;
use App\Models\Builders\ArticleBuilder;
use Illuminate\Database\Eloquent\Model;
use App\Events\Articles\ArticlePublished;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasSlug;
    use HasUuid;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'summary',
        'body',
        'status',
        'level',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'title' => Normalise::class,
    ];

    public function getSluggable(): string
    {
        return $this->title;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
        );
    }

    public function newEloquentBuilder($query): ArticleBuilder
    {
        return new ArticleBuilder($query);
    }

    public static function createWithAttributes(array $attributes): Article
    {
        $attributes['uuid'] = Uuid::uuid4()->toString();
        event(new ArticleCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public function publish(): void
    {
        event(new ArticlePublished($this->uuid));
    }

    public function deny(): void
    {
        event(new ArticleDenied($this->uuid));
    }

    public function remove(): void
    {
        event(new ArticleDeleted($this->uuid));
    }

    public static function uuid(string $uuid):? Article
    {
        return static::where('uuid', $uuid)->first();
    }
}
