<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;
use App\Reactors\Articles\ArticleCreatedReactor;
use App\Projectors\Articles\ArticleStatusProjector;

class EventSourcingServiceProvider extends ServiceProvider
{
    public function register()
    {
        Projectionist::addProjectors([
            ArticleStatusProjector::class,
        ]);

        Projectionist::addReactors([
            ArticleCreatedReactor::class,
        ]);
    }

    public function boot()
    {
        //
    }
}
