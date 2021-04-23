<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Packages;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('app.dashboard.packages.index');
    }
}
