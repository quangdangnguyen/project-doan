@extends('admin.master')

@section('title','Quản lý sản phẩm')

@section('main')

	<link rel="stylesheet" href="{{url('/public/admin')}}/css/style.css" />

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Products List</div>
		<div class="panel-body">
			<form action="" method="POST" class="form-inline" role="form">
							
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="Input keyword">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-search"></i>
				</button>
				<a href="{{ route('product.create') }}" class="btn btn-success">Add New</a>
			</form>
		</div>
	
		<!-- Table -->
		<table class="table">
			<br>
			<div class="form-group" style="color: blue">
			<?php
				$message = Session::get('message');
				if($message){
					echo $message;
					Session::put('message',null);
				}
			?>
			</div>
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Slug</th>
					<th width="25%">Mô tả</th>
					<th>Giá</th>
					<th>Giá khuyến mãi</th>
					<th>Đơn vị</th>
					<th>Trạng thái</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($products as $pro)
			<tbody>
				<tr>
					<td>{{ $pro->id }}</td>
					<td width="20%">
						<div class="media">
							<a class="pull-left" href="#">
								<img class="media-object" src="{{ $pro->image }}" alt="Image" width="60">
							</a>
							<div class="media-body">
								<h4 class="media-heading">{{ $pro->name }}</h4>
								<p>{{$pro->updated_at->format('d-m-Y')}}</p>
							</div>
						</div>
					</td>
					<td>{{ $pro->slug }}</td>
					<td>{{ $pro->description }}</td>
					<td>{{ $pro->unit_price }}</td>
					<td>{{ $pro->promotion_price }}</td>
					<td>{{ $pro->unit }}</td>
					<td style="text-align: center">
						<?php
							if($pro->action==1){
							?>
								<a href="{{URL::to('/admin/product/unactive/'.$pro->id)}}"><span class="fa fa-thumbs-up"></span></a>
							<?php	
								}else{
							?>
								<a href="{{URL::to('admin/product/active/'.$pro->id)}}"><span class="fa fa-thumbs-down"></span></a>
							<?php
							}
						?>
					</td>
					<td>
						<form method="POST" action="{{route('product.destroy',$pro->id)}}">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
						
						<a href="{{ route('product.edit',$pro->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
						<button class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không')"><i class="fa fa-trash"></i></button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="clearfix"></div>

		{{$products->links()}}
	</div>

@stop()