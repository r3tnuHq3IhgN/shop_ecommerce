	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">Trang chủ</a></li>
					<li class="item-link"><span>Chi tiết</span></li> 
					<li class="item-link"><span>{{ $product->name }}</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery">
							  <ul class="slides">

							    <li data-thumb="../assets/images/products/<?php echo $product->image ?>">
							    	<img src="../assets/images/products/<?php echo $product->image ?>" alt="product thumbnail" />
							    </li>
							  </ul>
							</div>
						</div> 
						<div class="detail-info">
							<div class="product-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <a href="#" class="count-review">(05 review)</a>
                            </div>
                            <h2 class="product-name">{{ $product->name}}</h2> 
                            <div class="short-desc">
                                <ul style="list-style: none">
                                    <li><span style="font-weight: bold;">Mô tả : </span>{{ $product->short_description}}</li>    
                                </ul>
                            </div>
                            <div class="wrap-social">
                            	<a class="link-socail" ><img src="../assets/images/social-list.png" alt=""></a>
                            </div>
                            <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
                            <div class="stock-info in-stock">
                                <p class="availability">Trạng thái: <b>{{$product->stock_status}}</b></p>
                            </div>
                            {{-- <div class="quantity">
                            	<span>Số lượng:</span>
								<div class="quantity-input" wire:model="num">
									<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*">
									<input type="text" wire:model="num" value="1">
									<a class="btn btn-reduce" href="#"  wire:model="num"></a>
									<a class="btn btn-increase" href="#"></a>
								</div>
							</div> --}}
							<style>
								.wrap-butons .fa-heart{
									color: #cbcbcb;
									font-size: 32px;
									margin-left: 120px;
									margin-bottom: 20px;
								}
								.wrap-butons .fill-heart{
									color: red;
								}
							</style>
							<div class="wrap-butons">
								@if(Auth::check())
									@php
										$check = DB::table('user_product')->where('user_id', Auth::user()->id)->where('product_id', $product->id)->where('wish', 1)->first();
										if(empty($check)){
												$temp=0;
										}
										else{
												$temp=1;
										}
									@endphp 
								   <a href="#" wire:click.prevent="addToWish('{{Auth::user()->id}}', '{{$product->id}}', 0)" class="abc"><i class="fa fa-heart {{$temp==1 ? 'fill-heart':''}}"></i></a>
									<a href="#" wire:click.prevent="addToCart('{{Auth::user()->id}}', '{{$product->id}}',1)" class="btn add-to-cart">Thêm vào giỏ hàng</a>
									@else
									<a href="/cart" class="btn add-to-cart">Thêm vào giỏ hàng</a>
									@endif
                                <div class="wrap-btn">
                                    {{-- <a href="#" class="btn btn-compare">So sánh</a> --}}
                                    {{-- <a href="#" class="btn btn-wishlist">Yêu thích</a> --}}
									{{-- <a href="#"><i class="btn-wishlist fa fa-heart"></i>Yêu thích</a> --}}
                                </div>
							</div>
						</div>
						<div class="advance-info">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item active">Mô tả</a>
								<a href="#add_infomation" class="tab-control-item">Thông tin</a>
								<a href="#review" class="tab-control-item">Đánh giá</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item active" id="description">
									<p> {{ $product->description }}</p>
								</div>
								<div class="tab-content-item " id="add_infomation">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>Weight</th><td class="product_weight">1 kg</td>
											</tr>
											<tr>
												<th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
											</tr>
											<tr>
												<th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
											</tr>
										</tbody>
									</table>
								</div>
								{{-- <div class="tab-content-item " id="review">
									
									<div class="wrap-review-form">
										
										<div id="comments">
											<h2 class="woocommerce-Reviews-title">01 review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span></h2>
											<ol class="commentlist">
												<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
													<div id="comment-20" class="comment_container"> 
														<img alt="" src="../assets/images/author-avata.jpg" height="80" width="80">
														<div class="comment-text">
															<div class="star-rating">
																<span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
															</div>
															<p class="meta"> 
																<strong class="woocommerce-review__author">admin</strong> 
																<span class="woocommerce-review__dash">–</span>
																<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >Tue, Aug 15,  2017</time>
															</p>
															<div class="description">
																<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
															</div>
														</div>
													</div>
												</li>
											</ol>
										</div><!-- #comments -->

										<div id="review_form_wrapper">
											<div id="review_form">
												<div id="respond" class="comment-respond"> 

													<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
														<p class="comment-notes">
															<span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
														</p>
														<div class="comment-form-rating">
															<span>Your rating</span>
															<p class="stars">
																
																<label for="rated-1"></label>
																<input type="radio" id="rated-1" name="rating" value="1">
																<label for="rated-2"></label>
																<input type="radio" id="rated-2" name="rating" value="2">
																<label for="rated-3"></label>
																<input type="radio" id="rated-3" name="rating" value="3">
																<label for="rated-4"></label>
																<input type="radio" id="rated-4" name="rating" value="4">
																<label for="rated-5"></label>
																<input type="radio" id="rated-5" name="rating" value="5" checked="checked">
															</p>
														</div>
														<p class="comment-form-author">
															<label for="author">Name <span class="required">*</span></label> 
															<input id="author" name="author" type="text" value="">
														</p>
														<p class="comment-form-email">
															<label for="email">Email <span class="required">*</span></label> 
															<input id="email" name="email" type="email" value="" >
														</p>
														<p class="comment-form-comment">
															<label for="comment">Your review <span class="required">*</span>
															</label>
															<textarea id="comment" name="comment" cols="45" rows="8"></textarea>
														</p>
														<p class="form-submit">
															<input name="submit" type="submit" id="submit" class="submit" value="Submit">
														</p>
													</form>

												</div><!-- .comment-respond-->
											</div><!-- #review_form -->
										</div><!-- #review_form_wrapper -->

									</div>
								</div> --}}
							</div>
						</div>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget widget-our-services ">
						<div class="widget-content">
							<ul class="our-services">

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Miễn phí giao hàng</b>
											<span class="subtitle">Cho đơn hàng trên $1000</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-gift" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Ưu đãi đặc biệt</b>
											<span class="subtitle">Mã giảm giá lên tới 50%</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="service">
									<a class="link-to-service" href="#">
										<i class="fa fa-reply" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Đổi trả</b>
											<span class="subtitle">Đổi trả hàng trong vòng 7 ngày</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div><!-- Categories widget-->

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
											<a href="{{route('product.details', ['slug' => $item->slug])}}" class="product-name"><span>{{ $item->name }}</span></a>
											<div class="wrap-price"><span class="product-price">${{$item->regular_price}}</span></div>
										</div>
									</div>
								</li>
								@endforeach

							</ul>
						</div>
					</div>

				</div><!--end sitebar-->

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Sản phẩm liên quan</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
								@foreach ($related_products as $item)
								@if ($item->id != $product->id)
								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="{{route('product.details', ['slug' => $item->slug])}}" title="{{$item->name}}">
											<figure><img src="../assets/images/products/<?php echo $item->image?>" width="214" height="214" alt=""></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">Mới</span>
										</div>
										<div class="wrap-btn">
											<a href="{{route('product.details', ['slug' => $item->slug])}}" class="function-link">Xem nhanh</a>
										</div>
									</div>
									<div class="product-info">
										<a href="{{route('product.details', ['slug' => $item->slug])}}" class="product-name"><span>{{$item->name}}</span></a>
										<div class="wrap-price"><span class="product-price">${{$item->regular_price}}</span></div>
									</div>
								</div>
								@endif
								@endforeach


							</div>
						</div><!--End wrap-products-->
					</div>
				</div>

			</div><!--end row-->

		</div><!--end container-->

	</main>
