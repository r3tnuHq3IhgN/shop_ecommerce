<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search;
    public $sorting;
    public $product_cat;
    public $product_cat_id;
    public $min_price;
    public $max_price;
    public $size;
    public function mount(){
        $this->min_price=1;
        $this->max_price=1500;
        $this->size = 12;
        $this->sorting = 'default';
        $this->fill(request()->only('search', 'product_cat','product_cat_id'));
    } 
    public function render() 
    {
        if ($this->sorting == "default") { 
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->size); 
        } else if ($this->sorting == "new") {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'ASC')->paginate($this->size);
        } else if ($this->sorting == "price") {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->size);
        } else if ($this->sorting == "price_desc") {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->size);
        }
        $categories = Category::all();
        $m_products = Product::where('regular_price' ,'>','500')->get()->take(4);
        return view('livewire.search-component',[
            'products' => $products,
            'categories' => $categories,
            'm_products' => $m_products 
        ])->layout('layouts.base');
    }
}  
