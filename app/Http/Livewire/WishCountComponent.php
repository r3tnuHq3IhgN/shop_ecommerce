<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh']; 
    public function render() 
    {
        return view('livewire.wish-count-component'); 
    }
}   
