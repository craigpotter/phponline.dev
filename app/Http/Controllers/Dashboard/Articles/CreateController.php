<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Articles;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        return view('app.dashboard.articles.create');
    }
}
