<?php

declare(strict_types=1);

namespace App\Http\Controllers\Static\Articles;

use App\Models\User;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowController extends Controller
{
    public function __invoke(User $user, string $articleSlug): View
    {
        $article = Article::with([
            'author',
            'category',
            'topics',
        ])
        ->where('user_id', $user->id)
        ->whereSlug($articleSlug)
        ->firstOrFail();


        return view('static.blog.show', compact('article'));
    }
}
