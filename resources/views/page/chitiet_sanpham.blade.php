@extends('master')

@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang_chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							@if($sanpham->promotion_price!=0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
							@endif
							<img src="{{$sanpham->image}}" alt="" height="250px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								
								<p class="single-item-title">{{$sanpham->name}}</p>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
										<span class="flash-sale">{{number_format($sanpham->unit_price)}} đồng</span>
									@else
										<span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option value="1">1</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>

					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
						@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="{{$sptt->image}}" alt="" height="200px" width="240px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										@if($sptt->promotion_price==0)
										<p class="single-item-price">
											<span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
										@else
											<span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
										</p>
										@endif
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($sp_moi as $spm)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$spm->id)}}"><img src="{{$spm->image}}" alt=""></a>
									<div class="media-body">
										{{$spm->name}}
										@if($spm->promotion_price==0)
										<span class="beta-sales-price" style="font-size: 15px">{{number_format($spm->unit_price)}} đồng</span>
										@else
										<span class="flash-del" style="font-size: 15px">{{number_format($spm->unit_price)}} đồng</span>
										<span class="flash-sale" style="font-size: 15px">{{number_format($spm->promotion_price)}} đồng</span>
										@endif
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div> 
					<div class="widget">
						<h3 class="widget-title">Sản phẩm khác</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($sp_khac as $spk)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$spk->id)}}"><img src="{{$spk->image}}" alt=""></a>
									<div class="media-body">
										{{$spk->name}}
										@if($spk->promotion_price==0)
										<span class="beta-sales-price" style="font-size: 15px">{{number_format($spk->unit_price)}} đồng</span>
										@else
										<span class="flash-del" style="font-size: 15px">{{number_format($spk->unit_price)}} đồng</span>
										<span class="flash-sale" style="font-size: 15px">{{number_format($spk->promotion_price)}} đồng</span>
										@endif
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection