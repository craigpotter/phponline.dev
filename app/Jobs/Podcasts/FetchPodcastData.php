<?php

declare(strict_types=1);

namespace App\Jobs\Podcasts;

use App\Models\Podcast;
use Illuminate\Bus\Queueable;
use shweshi\OpenGraph\OpenGraph;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class FetchPodcastData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Podcast $podcast,
    ) {}

    public function handle()
    {
        $data = (new OpenGraph())->fetch(
            url: $this->podcast->external_url,
            allMeta: true,
        );

        $this->podcast->update([
            'title' => $data['title'] ?? $this->podcast->title,
            'body' => $data['description'] ?? $this->podcast->body,
            'meta' => array_filter($data, fn($value) => !is_null($value) && $value !== '')
        ]);
    }
}
