<?php

declare(strict_types=1);

namespace App\Http\Controllers\Static\Articles;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('static.blog.index', [
            'articles' => Article::with([
                'author',
                'category',
                'topics',
            ])->published()->latest()->paginate()
        ]);
    }
}
