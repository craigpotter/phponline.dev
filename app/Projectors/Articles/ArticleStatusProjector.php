<?php

declare(strict_types=1);

namespace App\Projectors\Articles;

use App\Models\Article;
use App\Events\Articles\ArticleCreated;
use App\Events\Articles\ArticleDeleted;
use App\Events\Articles\ArticleDenied;
use App\Events\Articles\ArticlePublished;
use App\Support\ArticleStatus;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class ArticleStatusProjector extends Projector
{
    public function onArticleCreated(ArticleCreated $event): void
    {
        Article::create($event->articleAttributes);
    }

    public function onArticlePublished(ArticlePublished $event): void
    {
        $article = Article::uuid($event->articleUuid);

        $article->status = ArticleStatus::PUBLISHED;

        $article->save();
    }

    public function onArticleDenied(ArticleDenied $event): void
    {
        $article = Article::uuid($event->articleUuid);

        $article->status = ArticleStatus::DENIED;

        $article->save();
    }

    public function onArticleDeleted(ArticleDeleted $event): void
    {
        Article::uuid($event->articleUuid)->delete();
    }
}
