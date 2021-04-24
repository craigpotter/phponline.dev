<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\JobTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LocalUserSeeder extends Seeder
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

        User::create([
            'name' => 'James Sessford',
            'email' => 'hello@jamessessford.com',
            'password' => Hash::make('password'),
            'twitter' => 'sesticles',
            'github' => 'jamessessford',
            'username' => 'jamessessford',
            'available' => true,
            'company_id' => Company::factory([
                'name' => 'Preferred Management Solutions',
            ])->create()->id,
            'job_title_id' => JobTitle::factory([
                'name' => 'systems architect',
            ])->create()->id,
        ]);
    }
}
