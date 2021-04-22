<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class LatestArticles extends Component
{
    /**
     * @var Collection
     */
    public $articles;

    public function mount()
    {
        $this->articles = Article::with([
            'author',
            'category',
        ])
        ->published()
        ->latest()
        ->take(3)
        ->get();
    }

    public function render()
    {
        return view('livewire.articles.latest-articles');
    }
}
