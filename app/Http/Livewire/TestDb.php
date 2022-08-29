<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TestDb extends Component
{
    public function render()
    {
        $user = User::find(1);
        // foreach($user->product as $item){
        //     print_r($item->name);
        //     print_r($item->pivot->quantity);
        //     print_r($item->pivot->product_id);
        //     echo "<br>";
        // }

        // $check = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', 4)->first('quantity');
        // $temp = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', 9)->first('quantity');
        // echo empty($temp);
        // echo $temp->quantity;
        $products = Product::where('category_id', 1)->get();
        return view('livewire.test-db',[
            'products' => $products,
            'user' => $user,
        ])->layout('layouts.base');  
    }
}
