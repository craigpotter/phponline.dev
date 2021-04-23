<?php

declare(strict_types=1);

namespace App\Observers;

use App\Jobs\Packages\FetchPackageMetaJob;
use App\Models\Package;

class PackageObserver
{
    public function created(Package $package)
    {
        FetchPackageMetaJob::dispatch($package);
    }
}
