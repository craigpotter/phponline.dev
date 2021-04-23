<?php

declare(strict_types=1);

namespace App\Http\Livewire\Concerns;

trait HasModal
{
    public bool $modalOpen = false;

    public function closeModal()
    {
        $this->show = false;
    }

    public function showModal()
    {
        $this->show = true;
    }
}
