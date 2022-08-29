<?php

namespace App\Http\Livewire; 

use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mockery\Undefined; 

class CartComponent extends Component   
{
    public $subtotal = 0;
    public $total;
    public $tax;
    public $haveCoupon = 0;
    public $couponCode;
    public $discount;
    public function mount(){
        $this->discount=0; 

    }
    public function increase($data, $num){ 
        DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $data)->where('wish',0)->update(['quantity' => $num+1]);
        
        //DB::table('user_product')->where('product_id', $data)->update(['quantity' => $temp]);
    }
    public function reduce($data, $num){ 
        if($num == 1){
            DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $data)->where('wish',0)->delete();
            session()->flash('message', 'Đã xóa sản phẩm !');
            $this->emitTo('product-count-component','refreshComponent');
            //return redirect()->route('cart');
 
        }
        else{
        DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $data)->where('wish',0)->update(['quantity' => $num-1]);
        }
    
    }
    public function destroy($data){
        DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $data)->where('wish',0)->delete();     
        session()->flash('message', 'Xóa thành công sản phẩm !');
        $this->emitTo('product-count-component','refreshComponent');
        //return redirect()->route('cart');
    }
    public function destroyAll(){
        DB::table('user_product')->where('user_id',Auth::user()->id)->where('wish', 0)->delete();
        $this->emitTo('product-count-component','refreshComponent');
        redirect()->route('cart');
    }
    public function addCoupon(){  
        $coupon = Coupon::where('code',$this->couponCode)->first();
        if(empty($coupon)){
            session()->flash('message-coupon-failed', 'Mã giảm giá không hợp lệ !');
            redirect()->route('cart');

        } 
        else{ 
            session()->flash('message-coupon-success', 'Áp dụng mã giảm giá thành công !');
            $this->discount = $coupon->value;
        }
    }
    public function checkout(){
        redirect()->route('checkout');  
    }
    
    public function render() 
    {
        $m_products = Product::inRandomOrder()->get()->take(10);
        if(Auth::check()){
        $user = User::find(Auth::user()->id);
        }
        else{
            $user = 'guest'; 
        }
        
        return view('livewire.cart-component',[
            'user' => $user,
            'pageTitle' => 'Cart',
            'm_products' => $m_products,
        ]
        )->layout('layouts.base');   
    } 
}
