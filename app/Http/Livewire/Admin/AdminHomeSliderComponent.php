<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id){
        $slider = HomeSlider::find($id);
        $slider->delete();
        session()->flash('message', 'Xóa slider thành công !');
    }
    public function render()
    {
        $slider = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['slider' => $slider])->layout('layouts.base');
    }
}  
