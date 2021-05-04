<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Podcast;
use Illuminate\Database\Seeder;

class PodcastSeeder extends Seeder
{
    private $podcasts = [
        // [
        //     'title' => 'BaseCode',
        //     'external_url' => 'https://basecodefieldguide.com/podcast/',
        // ],
        // [
        //     'title' => 'Laravel News Podcast',
        //     'external_url' => 'https://laravel-news.com/podcast',
        // ],
        // [
        //     'title' => 'PHP Town Hall',
        //     'external_url' => 'https://phptownhall.com/',
        // ],
        [
            'title' => 'Full Stack Radio',
            'external_url' => 'http://fullstackradio.com/',
            'feed_url' => 'https://feeds.transistor.fm/full-stack-radio',
        ],
    ];

    public function run()
    {
        foreach ($this->podcasts as $podcast) {
            Podcast::create([
                'title' => $podcast['title'],
                'external_url' => $podcast['external_url'],
                'feed_url' => $podcast['feed_url'],
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        }
    }
}
