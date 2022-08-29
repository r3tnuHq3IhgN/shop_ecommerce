<main id="main">
    <div class="container"> 
        {{-- <title>Trang chủ</title> --}}
        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                <div class="item-slide">
                    <img src="assets/images/main-slider-1-1.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-1">
                        <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                        <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                        <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div> 
                </div>
                <div class="item-slide">
                    <img src="assets/images/main-slider-1-2.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-2">
                        <h2 class="f-title">Extra 25% Off</h2>
                        <span class="f-subtitle">On online payments</span>
                        <p class="discount-code">Use Code: #FA6868</p>
                        <h4 class="s-title">Get Free</h4>
                        <p class="s-subtitle">TRansparent Bra Straps</p>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="assets/images/main-slider-1-3.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-3">
                        <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                        <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                        <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="assets/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="assets/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
        </div> 

        <!--On Sale-->  
        @if ($products->count() > 0 && $sale->status==1 && $sale->sale_date > Carbon\Carbon::now())
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">Giảm giá</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach ($s_products as $item)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('product.details', ['slug' => $item->slug])}}" title="{{$item->name}}">
                            <figure><img src="assets/images/products/{{$item->image}}" width="800" height="800" alt="{{$item->name}}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">Giảm giá</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{ route('product.details', ['slug' => $item->slug])}}" class="function-link">Xem qua sản phẩm</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{ route('product.details', ['slug' => $item->slug])}}" class="product-name"><span>{{$item->name}}</span></a>
                        <div class="wrap-price"><ins><p class="product-price">${{$item->sale_price}}</p></ins> <del><p class="product-price">${{$item->regular_price}}</p></del></div>   
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Sản phẩm mới nhất</h3>  
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">						
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @foreach ($products as $item)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $item->slug])}}" title="">
                                            <figure><img src="assets/images/products/{{$item->image}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">Mới</span>
                                        </div>
                                        <div class="wrap-btn"> 
                                            <a href="{{ route('product.details', ['slug' => $item->slug])}}" class="function-link">Xem qua sản phẩm</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $item->slug])}}" class="product-name"><span>{{$item->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{$item->regular_price}}</span></div>
                                    </div>
                                </div>     
                                @endforeach
                            </div>
                        </div>							
                    </div>
                </div>
            </div>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
                </a>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Sản phẩm trong các danh mục</h3>

            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($categories as $key=>$category)
                        <a href="#category_{{$category->id}}" class="tab-control-item {{$key==0 ? 'active':''}}">{{$category->name}}</a>
                        @endforeach
                    </div>


                    <div class="tab-contents">
                        @foreach ($categories as $key=>$category)
                        <div class="tab-content-item {{$key==0 ? 'active':''}}" id="category_{{$category->id}}">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                           
                                @php
                                $c_products = DB::table('products')->where('category_id', $category->id)->get()->take($numOfCate);
                                @endphp
                                @foreach ($c_products as $c_product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $c_product->slug])}}" title="{{$c_product->name}}">
                                            <figure><img src="assets/images/products/{{$c_product->image}}" width="800" height="800" alt="{{$c_product->name}}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info"> 
                                        <a href="{{ route('product.details', ['slug' => $c_product->slug])}}" class="product-name"><span>{{$c_product->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{$c_product->regular_price}}</span></div>
                                    </div>
                                </div>      
                                @endforeach 
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
                </a> 
            </div>
        </div>			

    </div>

</main>
