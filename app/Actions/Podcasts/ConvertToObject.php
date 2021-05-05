<?php

declare(strict_types=1);

namespace App\Actions\Podcasts;

use Carbon\Carbon;
use App\DTO\Podcasts\Episode;
use App\DTO\Podcasts\EpisodeMedia;
use Laminas\Feed\Reader\Entry\Rss;

class ConvertToObject
{
    public function handle(Rss $item): Episode
    {
        // Convert the XML element into actual XML
        $xml = simplexml_load_string($item->saveXML());

        // Cast both parts into an array
        $podcastEpisode = (array) $xml;
        $media = (array) $podcastEpisode['enclosure'];

        // Create a DTO to return
        $episode = Episode::hydrate([
            'title' => $item->getTitle(),
            'link' => $podcastEpisode['link'],
            'description' => $item->getDescription(),
            'showNotes' => $item->getContent(),
            'pubDate' => $podcastEpisode['pubDate'],
            'media' => [
                'url' => $media['@attributes']['url'],
                'length' => (int) $media['@attributes']['length'],
                'type' => $media['@attributes']['type'],
            ]
        ]);

        return $episode;
    }
}
