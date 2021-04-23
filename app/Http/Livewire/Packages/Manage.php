<?php

declare(strict_types=1);

namespace App\Http\Livewire\Packages;

use App\Http\Livewire\Concerns\HasModal;
use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.packages.manage', [
            'packages' => Package::where('user_id', auth()->id())->paginate()
        ]);
    }
}
