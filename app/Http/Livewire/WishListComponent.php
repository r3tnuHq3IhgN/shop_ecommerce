<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class WishListComponent extends Component 
{
    public function destroy($pro){ 
        DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish', 1)->delete();
        session()->flash('message', 'Xóa thành công !');
        return redirect()->route('wish');
    }
    public function addToCart($pro, $num)  
    {
        $check = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish',0)->first();

        if (empty($check)) {
            DB::insert('insert into user_product (user_id, product_id, wish, quantity) values (?, ?, ?, ?)', [Auth::user()->id, $pro,0, 1]);
        } else {
            $temp = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish',0)->first()->quantity;
            DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish',0)->update(['quantity' => $temp + 1]);
        }
        session()->flash('message', 'Thêm vào giỏ hàng thành công');
        DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $pro)->where('wish', 1)->delete();
        return redirect()->route('cart');
    }
    public function render()
    {
        
        //$wishlist= DB::table('user_product')->where('user_id', Auth::user()->id)->where('quantity',0)->get();
        $user = User::find(Auth::user()->id);
        $products = Product::get()->take(10);
        return view('livewire.wish-list-component',['products' => $products,'user' => $user])->layout('layouts.base');
    }
} 
