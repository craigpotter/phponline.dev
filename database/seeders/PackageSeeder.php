<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    private $packages = [
        [
            'title' => 'URI Builder',
            'external_url' => 'https://packagist.org/packages/juststeveking/uri-builder',
            'user_id' => 1,
        ],
        [
            'title' => 'Companies House Laravel',
            'external_url' => 'https://packagist.org/packages/juststeveking/companies-house-laravel',
            'user_id' => 1,
        ],
        [
            'title' => 'PHP SDK',
            'external_url' => 'https://packagist.org/packages/juststeveking/php-sdk',
            'user_id' => 1,
        ],
        [
            'title' => 'Cypher Query Builder',
            'external_url' => 'https://packagist.org/packages/juststeveking/cypher-query-builder',
            'user_id' => 1,
        ],
        [
            'title' => 'Laravel Feature Flags',
            'external_url' => 'https://packagist.org/packages/juststeveking/laravel-feature-flags',
            'user_id' => 1,
        ],
        [
            'title' => 'Twig Asset Version Extension',
            'external_url' => 'https://packagist.org/packages/railto/twig-asset-version-extension',
            'user_id' => 1,
        ],
        [
            'title' => 'PSR Log',
            'external_url' => 'https://packagist.org/packages/psr/log',
            'user_id' => 1,
        ],
        [
            'title' => 'Laravel IDE Helper',
            'external_url' => 'https://packagist.org/packages/barryvdh/laravel-ide-helper',
            'user_id' => 1,
        ]
    ];

    public function run()
    {
        foreach ($this->packages as $package) {
            Package::create($package);
        }
    }
}
