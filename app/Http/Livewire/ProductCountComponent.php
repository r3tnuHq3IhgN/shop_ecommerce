<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh']; 
    public function render()
    {
        
        return view('livewire.product-count-component');
    }
}
