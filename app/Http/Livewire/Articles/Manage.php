<?php

declare(strict_types=1);

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.articles.manage', [
            'articles' => Article::with(['category', 'author'])->where('user_id', auth()->id())->paginate()
        ]);
    }
}
