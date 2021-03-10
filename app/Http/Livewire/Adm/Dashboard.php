<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        session(['entrada_adm' => true]);
    }

    public function render()
    {
        return view('livewire.adm.dashboard')->layout('layouts.adm');
    }
}
