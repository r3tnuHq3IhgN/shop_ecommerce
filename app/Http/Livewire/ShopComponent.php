<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component 
{
    public $sorting;
    public $size;
    public $min_price;
    public $max_price;
    public function mount()
    {
        $this->sorting = 'default';
        $this->size = 12;
        $this->min_price=1;
        $this->max_price=1500;
    
    } 
    public function addToCart($role_id, $pro, $num)  
    {
        $check = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish',0)->first();

        if (empty($check)) {
            DB::insert('insert into user_product (user_id, product_id, wish, quantity) values (?, ?, ?, ?)', [$role_id, $pro,0, 1]);
        } else {
            $temp = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish',0)->first()->quantity;
            DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish',0)->update(['quantity' => $temp + 1]);
        }
        session()->flash('message', 'Thêm vào giỏ hàng thành công');
        return redirect()->route('cart');
    }
    public function addToWish($id, $pro, $qty){
        $check = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish', 1)->first();
        if(empty($check)){
        DB::insert('insert into user_product (user_id, product_id, wish, quantity) values (?, ?, ?, ?)', [$id, $pro, 1,0]);
        }
        else{ 
            DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish', 1)->delete();
        }
        $this->emitTo('wish-count-component','refreshComponent');
    }
    use WithPagination;
    public function render()  
    {
        if ($this->sorting == "default") { 
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->size); 
        } else if ($this->sorting == "new") {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'ASC')->paginate($this->size);
        } else if ($this->sorting == "price") {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->size);
        } else if ($this->sorting == "price_desc") {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->size);
        }

        $categories = Category::all();
        $m_products = Product::where('regular_price' ,'>','500')->get()->take(4);
        return view('livewire.shop-component', [
            'products' => $products,
            'categories' => $categories,
            'm_products' => $m_products

        ])->layout('/layouts.base');
    }
}
