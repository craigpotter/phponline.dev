<?php

declare(strict_types=1);

namespace App\Console\Commands\Packages;

use App\Models\Package;
use Illuminate\Console\Command;

class PublishPackages extends Command
{
    protected $signature = 'package:publish';

    protected $description = 'Publish any unpublished packages';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Package::query()->unPublished()
            ->get()
            ->each(fn(Package $package) => $package->update(['published' => true]));
    }
}
