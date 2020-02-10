<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +84-362-555-908</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> sonnguyenngochp@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 236-238 Hoàng Quốc Việt, Bắc Từ Liêm, Hà Nội</a></li>
					</ul>
					<div class="pull-right auto-width-right">
					<ul class="header-links pull-right top-details">
						
						@if(Auth::check())
							<li><a href="{{route('user')}}"><i class="fa fa-user"></i>Chào bạn {{Auth::user()->full_name}}</a></li>
							<li><a href="{{route('logoutuser')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
						@else
							<li><a href="{{route('signinuser')}}"><i class="fa fa-sign-in"></i>Đăng kí</a></li>
							<li><a href="{{route('loginuser')}}"><i class="fas fa-sign-in-alt"></i>Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="public/source/image/logo/logo-banh-3.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="get" action="{{route('search')}}">
									<select class="input-select" name="key"> 
										<option value="">Sản phẩm</option>
										@foreach($loai_sp as $loai)
										<option>{{$loai->name}}</option>
										@endforeach
									</select>
									<input class="input" placeholder="Nhập từ khóa..." name="key">
									<button class="search-btn">Tìm kiếm</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
	

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										Giỏ hàng <br>
										(@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) 
									</a>
									<div class="cart-dropdown">
										@if(Session::has('cart'))
										@foreach($product_cart as $product)
										<div class="cart-list">
											
											<div class="product-widget">
												<div class="product-img">
													<img src="{{$product['item']['image']}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$product['item']['name']}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}} @else {{number_format($product['item']['promotion_price'])}}@endif</span></h4>
												</div>
												<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
											</div>
										</div>
										@endforeach
										<div class="cart-summary">
											<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đồng</span></div>
											<div class="clearfix"></div>
										</div>
										<div class="cart-btns" style="text-align: center">
											
											<a href="{{route('dathang')}}">Giỏ hàng  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
										@endif
									</div>
								</div>
								<!-- /Cart -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
	<!-- /HEADER -->

	<div class="clearfix"></div>

		<!-- NAVIGATION -->
		<div class="header-bottom" style="background-color: #1E1F29;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang_chu')}}">Trang chủ</a></li>
						<li><a href="{{route('loaisanpham',$loai->id)}}">Sản phẩm</a>
							<ul class="sub-menu">
							@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
							</ul>
						</li>}}
						<li><a href="{{route('tintuc')}}">Tin tức</a></li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>	
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
		<!-- /NAVIGATION -->