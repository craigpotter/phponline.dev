<?php

declare(strict_types=1);

namespace App\Jobs\Packages;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Spatie\Packagist\PackagistClient;

class FetchPackageMetaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $info;

    public function __construct(
        public Package $package,
    ) {
        $urlInfo = parse_url($package->external_url);
        $this->info = Str::after($urlInfo['path'], "/packages/");
    }

    public function handle(PackagistClient $packagist)
    {
        $metaData = $packagist->getPackageMetadata($this->info);

        $releases = collect($metaData['packages'][$this->info]);

        $this->package->update([
            'title' => $releases->last()['name'],
            'body' => $releases->last()['description'],
            'meta' => $releases->last()
        ]);
    }
}
