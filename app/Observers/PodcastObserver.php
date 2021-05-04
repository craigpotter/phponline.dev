<?php

declare(strict_types=1);

namespace App\Observers;

use App\Jobs\Podcasts\FetchFeedItems;
use App\Models\Podcast;

class PodcastObserver
{
    public function created(Podcast $podcast): void
    {
        if (! is_null($podcast->feed_url)) {
            FetchFeedItems::dispatch(
                $podcast->id,
                $podcast->feed_url,
            );
        }
    }
}
