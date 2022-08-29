@if (Auth::check())
<div class="wrap-icon-section wishlist">
    <a href="/wish-list" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info" id="wish-list"> 
            @php
                $total2 = DB::table('user_product')->where('user_id', Auth::user()->id)->where('quantity',0)->count();
            @endphp
            <span class="index">{{$total2}} items</span>
            <span class="title">Yêu thích</span>  
        </div>
    </a>
</div>
@else   
<div class="wrap-icon-section wishlist">
    <a href="/cart" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i> 
        <div class="left-info" id="wish-list">
            <span class="index">0 items</span>
            <span class="title">Yêu thích</span> 
        </div>
    </a> 
</div>   
@endif 