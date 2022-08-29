<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderSuccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $phone;
    public $address;
    public $country;
    public $email;
    public $city;
    public $zipcode;
    public function orderDetails(){
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'country' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'zipcode' => 'required' 

        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->country = $this->country;
        $order->email = $this->email;
        $order->city = $this->city;
        $order->zipcode = $this->zipcode;
        $order->save();
        $update = DB::table('user_product')->where('user_id',Auth::user()->id)->where('wish', 0)->get();
        foreach($update as $item){
            $temp = new OrderSuccess();
            $temp->user_id = $item->user_id;
            $temp->product_id = $item->product_id;
            $temp->quantity = $item->quantity;
            $temp->order_id = $order->id;
            $temp->save();
        }
        DB::table('user_product')->where('user_id',Auth::user()->id)->where('wish', 0)->delete();
        redirect()->route('thank');
    }
    public function render()   
    {
         return view('livewire.checkout-component')->layout("layouts.base");
    }
} 
