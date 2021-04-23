<?php

declare(strict_types=1);

namespace App\Http\Controllers\Static\Packages;

use App\Models\Package;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('static.packages.index', [
            'packages' => Package::with(['user'])->published()->latest()->paginate()
        ]);
    }
}
