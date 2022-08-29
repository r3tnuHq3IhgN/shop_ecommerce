<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->get()->take(10);
        $category = HomeCategory::find(1);
        $convert = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $convert)->get();
        $numOfCate = $category->num;
        $sale = Sale::find(1);
        $s_products = Product::where('sale_price', '>' ,0)->inRandomOrder()->get()->take(10);
        return view('livewire.home-component', ['products' => $products, 'categories' => $categories, 's_products' => $s_products, 'numOfCate' => $numOfCate, 'sale' => $sale])->layout('layouts.base');
    }
} 
