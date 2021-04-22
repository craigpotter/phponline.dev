<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\Normalise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => Normalise::class,
    ];

    public function users(): HasMany
    {
        return $this->hasMany(
            User::class,
            'company_id',
        );
    }
}
