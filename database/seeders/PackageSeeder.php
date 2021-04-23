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
    ];

    public function run()
    {
        foreach ($this->packages as $package) {
            Package::create($package);
        }
    }
}
