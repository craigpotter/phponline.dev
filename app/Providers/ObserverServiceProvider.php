<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Package;
use App\Models\Podcast;
use App\Observers\PackageObserver;
use App\Observers\PodcastObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot()
    {
        Package::observe(PackageObserver::class);
        Podcast::observe(PodcastObserver::class);
    }
}
