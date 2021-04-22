<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\Normalise;
use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasSlug;
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $casts = [
        'name' => Normalise::class,
    ];

    public function getSluggable(): string
    {
        return $this->name;
    }

    public function articles(): HasMany
    {
        return $this->hasMany(
            Article::class,
            'category_id',
        );
    }
}
