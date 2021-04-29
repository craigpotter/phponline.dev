<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    public function run()
    {
        $topics = Topic::factory(20)->create();

        $topics->each(function (Topic $topic) {
            $topic->articles()->attach(
                Article::inRandomOrder()->first()->id
            );
        });
    }
}
