<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.adm.dashboard')->layout('layouts.app',['header'=>'Dashboard']);
    }
}
