<?php

namespace App\Http\Livewire\Podcasts;

use App\Models\Podcast;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class LatestPodcasts extends Component
{
    /**
     * @var Collection
     */
    public $podcasts;

    public function mount()
    {
        $this->podcasts = Podcast::with([
            'episodes',
        ])
        ->published()
        ->latest()
        ->take(3)
        ->get();
    }
    
    public function render()
    {
        return view('livewire.podcasts.latest-podcasts');
    }
}
