<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class EditCategoryComponent extends Component
{
    public $name;
    public $old_name;
    public $slug;
    public function mount($slug){
        $this->slug = $slug;        
    }
    public function editCategory(){
        $messages = [
            'required'  => 'Tên danh mục không được trống !',
            'unique'    => 'Tên danh mục đã được sử dụng !'
          ];          
        $this->validate(['name' => 'required|unique:categories'],$messages);
        $category = Category::where('slug', $this->slug)->first();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        session()->flash('message', 'Sửa danh mục thành công !');
    }
    public function render()
    {
        if($category = Category::where('slug', $this->slug)->first()){
            $this->old_name = $category->name;
        }
        return view('livewire.admin.edit-category-component', 
        ['old_name' => $this->old_name],
        )->layout('layouts.base');
    }
}
