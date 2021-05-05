<?php

declare(strict_types=1);

namespace App\Jobs\Podcasts;

use App\Actions\Podcasts\ConvertToObject;
use App\Models\PodcastEpisode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Laminas\Feed\Reader\Reader;

class FetchFeedItems implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public int $podcastId,
        public string $feedUrl,
    ) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $feed = Reader::import($this->feedUrl);

        foreach ($feed as $item) {
            // Covert Feed item into DTO
            $handler = new ConvertToObject();

            $episode = $handler->handle(item: $item);

            PodcastEpisode::create([
                'title' => $episode->title,
                'description' => $episode->description,
                'show_notes' => $episode->showNotes,
                'external_url' => $episode->link,
                'media' => [
                    'url' => $episode->media->url,
                    'length' => $episode->media->length,
                    'type' => $episode->media->type,
                ],
                'published_at' => $episode->pubDate,
                'podcast_id' => $this->podcastId,
            ]);
        }
    }
}
