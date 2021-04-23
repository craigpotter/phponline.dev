<?php

declare(strict_types=1);

namespace App\Http\Controllers\Static\Packages;

use App\Models\Package;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Package $package): View
    {
        $package->load(['user']);

        return view('static.packages.show', [
            'package' => $package
        ]);
    }
}
