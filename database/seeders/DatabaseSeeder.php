<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Company;
use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Steve McDougall',
            'email' => 'juststevemcd@gmail.com',
            'password' => Hash::make('password'),
            'twitter' => 'JustSteveKing',
            'github' => 'JustSteveKing',
            'username' => 'juststeveking',
            'available' => true,
            'company_id' => Company::factory([
                'name' => 'sqft.capital',
            ])->create()->id,
            'job_title_id' => JobTitle::factory([
                'name' => 'technical lead',
            ])->create()->id,
        ]);

        Article::factory(50)->create();
    }
}
