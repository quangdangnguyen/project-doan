@extends('admin.master')

@section('title','Quản lý sản phẩm')

@section('main')

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">New Products List</div>
		
	
		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Slug</th>
					<th width="25%">Mô tả</th>
					<th>Giá</th>
					<th>Giá khuyến mãi</th>
					<th>Đơn vị</th>

				</tr>
			</thead>
			@foreach($pro as $p)
			<tbody>
				<tr>
					<td>{{ $p->id }}</td>
					<td width="20%">
						<div class="media">
							<a class="pull-left" href="#">
								<img class="media-object" src="{{ $p->image }}" alt="Image" width="60">
							</a>
							<div class="media-body">
								<h4 class="media-heading">{{ $p->name }}</h4>
								<p>{{$p->updated_at->format('d-m-Y')}}</p>
							</div>
						</div>
					</td>
					<td>{{ $p->slug }}</td>
					<td>{{ $p->description }}</td>
					<td>{{ $p->unit_price }}</td>
					<td>{{ $p->promotion_price }}</td>
					<td>{{ $p->unit }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="clearfix"></div>

		{{$pro->links()}}
	</div>

@stop()