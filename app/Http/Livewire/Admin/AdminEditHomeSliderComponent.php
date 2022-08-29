<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $slug;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public function mount($slug){
        $this->slug = $slug;
        $this->status = 0;
    }
    public function editSlider(){ 
        $slider = HomeSlider::find($this->slug);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', "Sửa thành công slider");
        
        
    }

    
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    } 
}  
