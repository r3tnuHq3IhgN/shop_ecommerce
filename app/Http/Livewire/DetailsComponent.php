<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;
    public $num=1;
    public $temp=0;
    public function mount($slug){
        $this->slug = $slug;
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
    public function render() 
    {
        $product = Product::where('slug', $this->slug)->first();
        $related_products = Product::where('category_id', $product->category_id)->get();
        $popular_products = Product::inRandomOrder()->limit(4)->get();

        
        return view('livewire.details-component',
        [
            'product' => $product,
            'related_products' => $related_products,
            'popular_products' => $popular_products,


        ])->layout('layouts.base'); 
    }
}
