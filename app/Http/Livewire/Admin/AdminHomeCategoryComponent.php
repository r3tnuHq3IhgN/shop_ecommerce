<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $sel_cate= [];
    public $num;
    public function mount(){
        $data1 = HomeCategory::find(1);
        $this->sel_cate = explode(',',$data1->sel_categories);
        $this->num = $data1->num;       
    }
    public function addToDb(){
        $data = HomeCategory::find(1);
        $data->sel_categories = implode(',',$this->sel_cate);
        $data->num = $this->num;
        $data->save();
        session()->flash('message', 'Chỉnh sửa thành công !');

    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}  
