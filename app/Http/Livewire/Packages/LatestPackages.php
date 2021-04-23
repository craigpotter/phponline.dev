<?php

declare(strict_types=1);

namespace App\Http\Livewire\Packages;

use App\Models\Package;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class LatestPackages extends Component
{
    /**
     * @var Collection
     */
    public $packages;

    public function mount()
    {
        $this->packages = Package::with(['user'])
            ->published()
            ->latest()
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.packages.latest-packages');
    }
}
