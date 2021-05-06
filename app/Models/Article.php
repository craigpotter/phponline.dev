<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\Normalise;
use App\Events\Articles\ArticleCreated;
use App\Events\Articles\ArticleDeleted;
use App\Events\Articles\ArticleDenied;
use App\Events\Articles\ArticlePublished;
use App\Models\Builders\ArticleBuilder;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\HtmlString;
use Ramsey\Uuid\Uuid;

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

    public function getRouteKeyName(): string
    {
        return 'title';
    }

    public function markdownBody()
    {
        return new HtmlString(
            app('markdown')->convertToHtml($this->body ?? '')
        );
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
        );
    }

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(
            Topic::class,
            'article_topic',
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

    public function isPublished(): bool
    {
        return $this->status === 'published';
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

    public static function uuid(string $uuid): ?Article
    {
        return static::where('uuid', $uuid)->first();
    }
}
