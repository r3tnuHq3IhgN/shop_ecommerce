<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponsComponent extends Component
{
    public $code;
    public $value;
    public $type;
    public $cart_value;
    public function mount(){
        $this->type = 'fixed';
    }
    public function addCoupon(){
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->value = $this->value;
        $coupon->type = $this->type;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('message', 'Lưu thành công !');
        
    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupons-component')->layout('layouts.base');
    } 
}
