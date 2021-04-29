<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\Normalise;
use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Topic extends Model
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $casts = [
        'name' => Normalise::class,
    ];

    public $timestamps = false;

    public function getSluggable(): string
    {
        return $this->name;
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(
            Article::class,
            'article_topic',
        );
    }
}
