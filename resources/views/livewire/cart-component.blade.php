<main id="main" class="main-site">
    <title>Giỏ hàng</title>
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Đăng nhập</span></li>
            </ul>
        </div>
        @if (Auth::check() && Session::has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show">
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            </div> 
        @endif  
        @if (Session::has('message-coupon-failed'))
        <div class="alert alert-warning">{{Session::get('message-coupon-failed')}}</div>    
        @endif
        <div class=" main-content-area"> 
            <div class="wrap-iten-in-cart"> 
                @if (Auth::check())
                        <h3 class="box-title">Danh sách sản phẩm</h3>   
                        @php
                        $check_pro = DB::table('user_product')->where('user_id', Auth::user()->id)->where('quantity', '>', 0)->get(); 
                        //echo $check_pro->first();
                        @endphp
                        @if (empty($check_pro->first())) 
                            <div class="alert alert-warning">Bạn chưa thêm sản phẩm nào vào giỏ</div>
                            <a href="/"><button class="btn btn-primary">Thêm ngay</button></a>
                        @else
                        <ul class="products-cart">
                            @foreach ($user->product as $item)
                            @if ($item->pivot->quantity > 0) 
                                <li class="pr-cart-item"> 
                                    <div class="product-image">  
                                        <figure><img src="assets/images/products/{{ $item->image }}"
                                                alt=""></figure>
                                    </div>
                                    <div class="product-name"> 
                                        <a class="link-to-product" href="{{route('product.details',['slug' => $item->slug])}}">{{ $item->name }}</a>
                                    </div>
                                    <div class="price-field product-price">
                                        <p class="price">${{ $item->regular_price }}</p>
                                    </div> 
                                    <div class="quantity">  
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="{{ $item->pivot->quantity }}"
                                                readonly>
                                            <a class="btn btn-increase" href="#"
                                                wire:click.prevent="increase('{{ $item->pivot->product_id }}', '{{ $item->pivot->quantity}}')"></a>
                                            <a class="btn btn-reduce" href="#"
                                                wire:click.prevent="reduce('{{ $item->pivot->product_id }}', '{{ $item->pivot->quantity}}')"></a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price">${{ $item->pivot->quantity * $item->regular_price }} </p>
                                    </div>
                                    <div class="delete">
                                        <a href="#" class="btn btn-delete" title=""
                                            wire:click.prevent="destroy('{{ $item->pivot->product_id }}')">
                                            <span>Delete from your cart</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div> 
                                </li>
                            @endif 
                                <?php $subtotal += $item->pivot->quantity * $item->regular_price?>
                            @endforeach
                      </ul>
            </div> 

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Tóm tắt</h4>
                    <p class="summary-info"><span class="title">Tổng tiền mua</span><b
                            class="index">${{ $subtotal }}</b></p>
                    <p class="summary-info"><span class="title">Phí vận chuyển ( 5% đã bao gồm VAT )</span><b class="index">${{$tax=$subtotal*0.05}}</b></p>
                    @if (Session::has('message-coupon-success'))
                    <p class="summary-info"><span class="title">Mã giảm giá</span><b
                        class="index">-${{$discount}}</b></p>    
                    @endif
                    @php
                        $total1=$subtotal + $tax -$discount;
                        session()->put('checkout',[
                         'total' => $total1,
                         'discount' => $discount,
                         'subtotal' => $subtotal,
                         'tax' => $tax,
                        ]);
                    @endphp
                    <p class="summary-info total-info "><span class="title total" style="font-weight: bold">Số tiền cần thanh toán</span><b
                        wire:model="total"  class="index">${{$total1}}</b></p>
                </div>
                <br>
                <div class="checkout-info">
                    <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCoupon"><span>Tôi có
                            mã giảm giá</span> 
                    </label>
                    @if (Session::has('message-coupon-success'))
                         <div class="alert alert-success">{{Session::get('message-coupon-success')}}</div>    
                    @endif
                    @if ($haveCoupon==1)  
                        <div class="summary-item">
                            <form wire:submit.prevent="addCoupon()">
                                <h4 class="title-box">Mã giảm giá</h4>
                                <p class="row-in-form">
                                    <label for="coupon-code">Nhập mã giảm giá :</label>
                                   <input type="text" wire:model="couponCode">
                                </p>
                                <button type="submit" class="btn btn-small">Áp dụng</button>
                            </form> 
                        </div>      
                    @endif  
                    <a class="btn btn-checkout" wire:click.prevent="checkout">Thanh toán</a>
                    <br>
                    <a class="link-to-shop" href="/">Tiếp tục mua hàng<i class="fa fa-arrow-circle-right"
                            aria-hidden="true"></i></a>
                </div> 
                <br>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Xóa toàn bộ giỏ hàng</a>
                    {{-- <a class="btn btn-update" href="#">Cập nhật giỏ hàng</a> --}}
                </div>
            </div>
            @endif 
        
        @else
            <div class="alert alert-danger">Bạn cần đăng nhập để sử dụng mục này</div>
        @endif
        </div>
        <!--end main content area-->
    </div>
    <!--end container-->
</main> 
