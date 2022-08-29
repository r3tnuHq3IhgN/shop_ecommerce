<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AddCategoryComponent extends Component
{
    public $name;
    public function addCategory(){
        $messages = [
            'required'  => 'Tên danh mục không được trống !',
            'unique'    => 'Tên danh mục đã được sử dụng !'
          ];          
        $this->validate(['name' => 'required|unique:categories'],$messages);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        session()->flash('message', 'Thêm danh mục thành công !'); 
    }
    public function render()  
    {
        return view('livewire.add-category-component')->layout('layouts.base');
    }
} 
