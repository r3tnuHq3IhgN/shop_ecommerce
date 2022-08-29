<div>
    <div class="container">
       <h3 class="box-title">
           Danh sách sản phẩm yêu thích 
       </h3>
       @if (Session::has('message'))
       <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show">
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    </div> 
       @endif
        <div class="wrap-iten-in-cart"> 
            @php
                $countWish=DB::table('user_product')->where('user_id', Auth::user()->id)->where('wish', 1)->count();
            @endphp 
            @if($countWish > 0)  
            <ul class="products-cart"> 
            @foreach ($user->product as $item) 
                @if($item->pivot->quantity==0)
                    <li class="pr-cart-item">
                        <div class="product-image"> 
                            <figure><img src="assets/images/products/{{ $item->image }}"
                                    alt=""></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('product.details',['slug' => $item->slug])}}">{{ $item->name }}</a>
                        </div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" title=""
                                wire:click.prevent="destroy('{{ $item->pivot->product_id }}')">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a> 
                        </div> 
                        <div class="price-field produtc-price">
                            <p class="price">${{ $item->regular_price }}</p>
                        </div> 
                        <div class="price-field produtc-price">
                           <div class="btn btn-primary" wire:click.prevent="addToCart('{{$item->pivot->product_id}}', 1)">Mua ngay</div>
                        </div> 

                        
                    </li>
                @endif
            @endforeach 
            </ul>
            @else
            <div class="alert alert-warning">Không có sản phẩm yêu thích</div>
            @endif
        </div>
    </div>
    
</div>      
