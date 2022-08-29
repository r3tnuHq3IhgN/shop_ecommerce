  <div class="wrap-icon-section minicart">
        <a href="/cart" class="link-direction">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <div class="left-info">
                @if (Auth::check())  
                @php
                    $total1 = DB::table('user_product')->where('user_id', Auth::user()->id)->where('quantity', '>',0)->count();
                @endphp
                <span class="index">{{$total1}} items</span>
                @else
                <span class="index">0 item</span>
                @endif
                <span class="title">Giỏ hàng</span>  
            </div> 
        </a>
    </div>
    <div class="wrap-icon-section show-up-after-1024"> 
        <a href="#" class="mobile-navigation">
            <span></span>
            <span></span>
            <span></span> 
        </a>
    </div>

