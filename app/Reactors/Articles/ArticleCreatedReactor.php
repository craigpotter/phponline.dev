<?php

declare(strict_types=1);

namespace App\Reactors\Articles;

use App\Events\Articles\ArticleCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class ArticleCreatedReactor extends Reactor implements ShouldQueue
{
    public function onArticleCreated(ArticleCreated $event): void
    {
        // send email to admins so they can approve or deny
    }
}
