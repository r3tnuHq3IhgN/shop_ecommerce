<main id="main" class="main-site left-sidebar">
	<div class="container">
		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="#" class="link">Trang chủ</a></li>
				<li class="item-link"><span>Danh mục sản phẩm</span></li>
			</ul>
		</div>
		<div class="row">

			<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

				<div class="banner-shop">
					<a href="#" class="banner-link">
						<figure><img src="../assets/images/shop-banner.jpg" alt=""></figure>
					</a>
				</div>

				<div class="wrap-shop-control">

					<h1 class="shop-title">Các sản phẩm</h1>

					<div class="wrap-right">

						<div class="sort-item orderby ">
							<select wire:model="sorting" name="orderby" class="use-chosen">
								<option value="default" selected="selected">Mặc định</option>
								<option value="new">Mới nhất</option>
								<option value="price">Từ thấp tới cao</option>
								<option value="price_desc">Từ cao xuống thấp</option>	
							</select>
						</div>
						<div class="sort-item product-per-page">
							<select name="post-per-page" wire:model='size' class="use-chosen" > 
								<option value="12">12 sản phẩm</option>
								<option value="16">16 sản phẩm</option>
								<option value="18">18 sản phẩm</option>
								<option value="21">21 sản phẩm</option>
								<option value="24">24 sản phẩm</option>
								<option value="30">30 sản phẩm</option>
								<option value="32">32 sản phẩm</option>
							</select>
						</div>

						<div class="change-display-mode">
							<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
							{{-- <a href="#" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a> --}}
						</div>

					</div> 

				</div><!--end wrap shop control-->

				<div class="row">  

					<ul class="product-list grid-products equal-container">
						@foreach ($products as $item)
						<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
							<div class="product product-style-3 equal-elem ">
								<div class="product-thumnail">
									<a href="{{ route('product.details', ['slug' => $item->slug])}}" title="{{$item->name}}">
										<figure><img src="../assets/images/products/{{ $item->image}}" alt="{{$item->name}}"></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="{{ route('product.details', ['slug' => $item->slug])}}" class="product-name"><span>{{ $item->name }}</span></a>
									<div class="wrap-price"><span class="product-price">{{ $item->regular_price}}</span></div>
									@if(Auth::check())
									<a href="#" wire:click.prevent="addToCart('{{Auth::user()->id}}', '{{$item->id}}', 1)" class="btn add-to-cart">Thêm vào giỏ hàng</a>
									@else
									<a href="/cart" class="btn add-to-cart">Thêm vào giỏ hàng</a>
									@endif
								</div>
							</div>
						</li>			
						@endforeach 
					</ul>

				</div>
				<div class="wrap-pagination-info">
					{{ $products->links()}}
				</div>
			</div><!--end main products area-->

			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
				<div class="widget mercado-widget categories-widget">
					<h2 class="widget-title">Danh mục sản phẩm</h2>
					<div class="widget-content">
						<ul class="list-category">		
							@foreach ($categories as $item)
							<li class="category-item">
								<a href="{{ route('product.category', ['slug' => $item->slug])}}" class="cate-link">{{ $item->name }}</a>
							</li>
							@endforeach
							
						</ul>
					</div>
				</div><!-- Categories widget-->

				{{-- <div class="widget mercado-widget filter-widget brand-widget">
					<h2 class="widget-title">Brand</h2>
					<div class="widget-content">
						<ul class="list-style vertical-list list-limited" data-show="6">
							<li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
							<li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
							<li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
							<li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
							<li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
							<li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
							<li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
							<li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
							<li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
							<li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
							<li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div><!-- brand widget--> --}}
				<div class="widget-banner">
					<figure><img src="../assets/images/size-banner-widget.jpg" width="270" height="331" alt=""></figure>
				</div>
				<br>
				<div class="widget mercado-widget filter-widget price-filter">
					<h2 class="widget-title">Lọc theo giá từ <span class="text-info">${{$min_price}} -> ${{$max_price}}</span></h2>
					<div class="widget-content" style="padding: 10px 5px 40px 10px">
						<div id="slider" wire:ignore></div>
					</div>
				</div><!-- Price-->  

				{{-- <div class="widget mercado-widget filter-widget">
					<h2 class="widget-title">Color</h2>
					<div class="widget-content">
						<ul class="list-style vertical-list has-count-index">
							<li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
							<li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
							<li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
							<li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
							<li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
							<li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
						</ul>
					</div>
				</div><!-- Color --> --}}

				{{-- <div class="widget mercado-widget filter-widget">
					<h2 class="widget-title">Size</h2>
					<div class="widget-content">
						<ul class="list-style inline-round ">
							<li class="list-item"><a class="filter-link active" href="#">s</a></li>
							<li class="list-item"><a class="filter-link " href="#">M</a></li>
							<li class="list-item"><a class="filter-link " href="#">l</a></li>
							<li class="list-item"><a class="filter-link " href="#">xl</a></li>
						</ul>
						<div class="widget-banner">
							<figure><img src="../assets/images/size-banner-widget.jpg" width="270" height="331" alt=""></figure>
						</div>
					</div>
				</div><!-- Size --> --}}

				<div class="widget mercado-widget widget-product">
					<h2 class="widget-title">Sản phẩm phổ biến</h2>
					<div class="widget-content">
						<ul class="products">
                            @foreach ($popular_products as $item)
                            <li class="product-item">
								<div class="product product-widget-style">
									<div class="thumbnnail">
										<a href="{{route('product.details', ['slug' => $item->slug])}}" title="{{$item->name}}">
											<figure><img src="../assets/images/products/<?php echo $item->image?>" alt=""></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="{{route('product.details', ['slug' => $item->slug])}}" class="product-name"><span>{{$item->name}}</span></a>
										<div class="wrap-price"><span class="product-price">${{$item->regular_price}}</span></div>
									</div>
								</div>
							</li>
                            @endforeach
						</ul>
					</div>
				</div><!-- brand widget-->

			</div><!--end sitebar-->

		</div><!--end row-->

	</div><!--end container-->

</main>
@push('scripts')
<script>
	var slider = document.getElementById('slider');
	noUiSlider.create(slider, {
		start : [1, 1500],
		connect : true,
		range : {
			'min' : 1,
			'max' : 1500
		},
		pips : {
			mode : 'steps',
			stepped: true,
			density : 4
		}
	});
	slider.noUiSlider.on('update', function(value){
		@this.set('min_price', value[0]);
		@this.set('max_price', value[1]);
	});
</script>
	
@endpush
