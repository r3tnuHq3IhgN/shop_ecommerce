<main id="main" class="main-site">
	<title>Thanh toán</title>

	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="/" class="link">Trang chủ</a></li>
				<li class="item-link"><span>Thanh toán</span></li>
			</ul>
		</div>
	@if (Auth::check())
		@if (DB::table('user_product')->where('user_id',Auth::user()->id)->where('wish', 0)->count() >0)
		<div class=" main-content-area">
			<form wire:submit.prevent="orderDetails"> 
			<div class="wrap-address-billing">
				<h3 class="box-title">Địa chỉ nhận hàng</h3> 
				<div class="bill-address">
					<p class="row-in-form">
						<label for="fname">Họ<span>*</span></label>
						<input id="fname" type="text" name="fname" value="" placeholder="Họ..." wire:model="firstname">
						@error('firstname')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					<p class="row-in-form">
						<label for="lname">Tên<span>*</span></label>
						<input id="lname" type="text" name="lname" value="" placeholder="Tên..." wire:model="lastname">
						@error('lastname')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					<p class="row-in-form">
						<label for="email">Email<span>*</span></label>
						<input id="email" type="email" name="email" value="" placeholder="VD: abc@gmail.com..." wire:model="email">
						@error('email')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					<p class="row-in-form">
						<label for="phone">Số điện thoại<span>*</span></label>
						<input id="phone" type="number" name="phone" value="" placeholder="VD: 0123..." wire:model="phone">
						@error('phone')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					<p class="row-in-form"> 
						<label for="add">Địa chỉ<span>*</span></label>
						<input id="add" type="text" name="add" value="" placeholder="VD: Quận Cầu giấy..." wire:model="address">
						@error('address')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					<p class="row-in-form">
						<label for="country">Quốc gia<span>*</span></label>
						<input id="country" type="text" name="country" value="" placeholder="VD: Việt Nam" wire:model="country">
						@error('country')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					<p class="row-in-form">
						<label for="zip-code">Postcode<span>*</span></label>
						<input id="zip-code" type="number" name="zip-code" value="" placeholder="VD: 000000" wire:model="zipcode">
						@error('zipcode')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					<p class="row-in-form">
						<label for="city">Thành phố<span>*</span></label>
						<input id="city" type="text" name="city" value="" placeholder="VD: Hà Nội" wire:model="city">
						@error('city')
							<span class="text-danger">{{$message}}</span>
						@enderror
					</p>
					{{-- <p class="row-in-form fill-wife">
						<label class="checkbox-field">
							<input name="different-add" id="different-add" value="forever" type="checkbox">
							<span>Ship to a different address?</span>
						</label>
					</p> --}}
				</div>
			</div>
			<div class="summary summary-checkout">
				<div class="summary-item payment-method">
					<h4 class="title-box">Phương thức thanh toán</h4> 
					{{-- <p class="summary-info"><span class="title">Check / Money order</span></p>
					<p class="summary-info"><span class="title">Credit Cart (saved)</span></p> --}}
					<div class="choose-payment-methods">
						<label class="payment-method">
							<input name="payment-method" id="payment-method-bank" value="bank" type="radio" checked>
							<span>Thanh toán khi nhận hàng</span>
							<span class="payment-desc">Thanh toán trực tiếp cho người vận chuyển</span>
						</label>
						<div class="alert alert-warning">
							<div class="alert alert-warning">Chưa hỗ trợ đối với</div>
							<label class="payment-method">
								{{-- <input name="payment-method" id="payment-method-visa" value="visa" type="radio" readonly> --}}
								<span>Visa</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								{{-- <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio"> --}}
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label> 
						</div>
					</div>
					<p class="summary-info grand-total"><span>Tổng số tiền cần thanh toán</span> <span class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>
					<button type="submit" class="btn btn-primary">Đặt hàng ngay bây giờ</button>
				</div>
				{{-- <div class="summary-item shipping-method">
					<h4 class="title-box f-title">Shipping method</h4>
					<p class="summary-info"><span class="title">Flat Rate</span></p>
					<p class="summary-info"><span class="title">Fixed $50.00</span></p>
				</div> --}}
			</div>  
			</form> 

			<div class="wrap-show-advance-info-box style-1 box-in-site"> 
				<h3 class="title-box">Most Viewed Products</h3>
				<div class="wrap-products">
					<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item new-label">new</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item sale-label">sale</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item new-label">new</span>
									<span class="flash-item sale-label">sale</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item bestseller-label">Bestseller</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash"> 
									<span class="flash-item sale-label">sale</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item new-label">new</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>

						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item bestseller-label">Bestseller</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div>
					</div>
				</div><!--End wrap-products-->
			</div>

		</div><!--end main content area-->
		@else
		<div class="alert alert-warning">
			Hiện tại bạn chưa xác nhận đơn hàng nào để thanh toán !
		</div> 
		<a href="/"><button class="btn btn-primary">Mua sản phẩm ngay</button></a>
		@endif
	@else
	<div class="alert alert-danger">Bạn cần đăng nhập để sử dụng mục này</div>
	@endif
	</div><!--end container-->  

</main> 