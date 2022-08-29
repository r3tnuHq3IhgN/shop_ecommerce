<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads; 
    public $name;
    public $image;
    public $qty;
    public $price;
    public $status;
    public $category;
    public $slug;
    public function addProduct(){
        $this->validate([
            'name' => 'required'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = Str::slug($this->name);
        $product->image = $this->image;
        $product->regular_price = $this->price;
        $product->stock_status = $this->status;
        $product->category_id = $this->category;
        $product->sale_price = 0;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->save(); 
        session()->flash('message', 'Lưu sản phẩm thành công !'); 
       
    }  
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.add-product-component',
        ['categories' => $categories],
        )->layout('layouts.base');
    }
}
