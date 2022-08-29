<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponsComponent extends Component
{
    public $code;
    public $value;
    public $type;
    public $cart_value;
    public $slug;
    public function mount($slug){ 
        $this->slug = $slug;
        $this->type='fixed';
    }
    public function editCoupon(){
        $coupon = Coupon::find($this->slug);
        $coupon->code = $this->code;
        $coupon->value = $this->value; 
        $coupon->type = $this->type;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('message', 'Sửa thành công !');
        
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-coupons-component')->layout('layouts.base');
    }
}
