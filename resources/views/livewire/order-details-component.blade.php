<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/" class="link">Trang chủ</a></li>
            <li class="item-link"><span>Đơn hàng</span></li>
        </ul>
    </div>
    @if(Auth::check())
    @php
        $arr = array([]);
        $i;
        $temp = DB::table('orders')->where('user_id', Auth::user()->id)->get('id');
        $abc = (array) json_decode($temp);
        //print_r([$abc]);
        for($i=0;$i<count($abc);$i++) {
           array_push($arr,$abc[$i]->id); 
        }
        //print_r($arr);
        //echo $arr[1];
        // for ($i=1; $i<count($arr) ; $i++) { 
        //     $temp1[$i] = DB::table('order_successes')->join('products', 'product_id','=','products.id')->where('order_id', $arr[$i])->get();
        // }
    @endphp
    @if(count($abc) > 0)
    <h3 class="box-title">Đơn hàng đã đặt</h3>
    @for($i=1;$i<count($arr);$i++)
        @php
            $temp1= DB::table('products')->join('order_successes', 'order_successes.product_id','=','products.id')->where('order_id', $arr[$i])->get(); 
            $total1=(DB::table('orders')->where('id', $arr[$i])->first());
        @endphp 
        {{-- <div class="wrap">
            <div style="font-weight: bold">Order #{{$arr[$i]}}</div>
            @foreach ($temp1 as $item)
            <div class="product-image">  
                <figure><img src="assets/images/products/{{ $item->image }}"
                        alt="" width="100px" height="100px"></figure>
            </div>
            <div>{{$item->name}}<span>   Số lượng {{$item->quantity}} <span>   Giá mỗi sản phẩm {{$item->regular_price}}</span></span></div>
            @endforeach
            <div style="font-weight: bold; color: red;">Tổng tiền : {{$total1->total}}</div>
            <br>
        </div> --}}
        <div class="wrap-iten-in-cart" style="margin-bottom: 100px;border-bottom: blue">
            <div style="font-weight: bold">Order #{{$arr[$i]}}</div>
            @foreach ($temp1 as $item)
            <ul class="products-cart">
            <li class="pr-cart-item"> 
                <div class="product-image">  
                    <figure><img src="assets/images/products/{{ $item->image }}"
                            alt="" width="100px" height="100px"></figure>
                </div>
                <div class="product-name"> 
                    <a class="link-to-product" href="{{route('product.details',['slug' => $item->slug])}}">{{ $item->name }}</a>
                </div>
                <div class="price-field">
                    <p class="price">Giá mỗi sản phẩm ${{ $item->regular_price }}</p>
                </div> 
                <div class="price-field">
                    <p class="price">Số lượng: {{ $item->quantity }}</p>
                </div> 
            </li>
            </ul>
            @endforeach
            <div class="price-field produtc-price products-cart">
                <p class="price" style="font-weight: bold; color: red;">Số tiền cần thanh toán : ${{$total1->total}} (Tổng tiền: ${{$total1->subtotal}}, Phí ship: ${{$total1->tax}}, Giảm giá: ${{$total1->discount}})</p>
                <p>Tình trạng: <span style="color: red">Đang xử lý</span></p>
            </div>
        </div>   
    @endfor
    @else
        <div class="alert alert-warning">Bạn chưa có đơn đặt hàng nào thành công</div>
        <a href="/"><button class="btn btn-primary">Mua ngay</button></a>
    @endif
    @else
        <div class="alert alert-danger">Bạn cần đăng nhập để sử dụng mục này !</div>
    @endif







</div>  
