<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryListComponent extends Component
{
    public $tmp;
    public function mount(){
        $this->tmp = false;
    }
    public function destroy($id){
        Category::find($id)->delete();
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category-list-component', [
            'categories' => $categories,
        ])->layout('layouts.base');  
    } 
}
