<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryComponent extends Component
{
    public $slug;
    public $sorting;
    public $size;
    public $min_price;
    public $max_price;
    public function mount($slug){
        $this->slug = $slug;
        $this->sorting = 'default';
        $this->size = 12;
        $this->min_price=1;
        $this->max_price=1500;
    }
    use WithPagination;
    public function addToCart($role_id, $pro, $num)
    {
        $check = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->first('quantity');

        if (empty($check) == 1) {
            DB::insert('insert into user_product (user_id, product_id, quantity) values (?, ?, ?)', [$role_id, $pro, $num]);
        } else {
            $temp = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->first('quantity')->quantity;
            DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->update(['quantity' => $temp + 1]);
        }
        session()->flash('message', 'Thêm vào giỏ hàng thành công');
        return redirect()->route('cart');
    }
    public function render() 
    { 
        // if($this->slug == 'list.html'){
        //     $products = '';
        //     $category = '';
        // }
        
        $category = Category::where('slug', $this->slug)->first();
        //$product = Product::where('category_id', $category->id)->get();
        if ($this->sorting == "default") {
            $products = Product::where('category_id', $category->id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->size);
        }
        else if($this->sorting == "new"){
            $products = Product::where('category_id', $category->id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'ASC')->paginate($this->size);
        }
        else if($this->sorting == "price"){
            $products = Product::where('category_id', $category->id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->size);
        }
        else if($this->sorting == "price_desc"){
            $products = Product::where('category_id', $category->id)->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->size);
        }
        $categories = Category::all();
        $popular_products = Product::where('regular_price' ,'>','500')->get()->take(4);
        return view('livewire.category-component',[
            'category' => $category,

            'products' => $products,
            'categories' => $categories,
            'popular_products' => $popular_products,
        ])->layout('layouts.base');
    }
} 
