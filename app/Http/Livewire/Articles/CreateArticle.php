<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class CreateArticle extends Component
{
    public Article $article;

    protected $rules = [
        'article.body' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->article = new Article();
    }

    public function render()
    {
        return view('livewire.articles.create-article');
    }
}
