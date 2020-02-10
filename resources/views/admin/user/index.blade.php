@extends('admin.master')
@section('title','Quản lý người dùng')
@section('main')
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Account list</div>
			<div class="panel-body">
				<form action="" method="POST" class="form-inline" role="form">
							
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="Input keyword">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-search"></i>
				</button>
				<a href="{{ route('account.create') }}" class="btn btn-success">Add New</a>
			</form>
			</div>
		
			<!-- Table -->
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Quyền</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ</th>
						<th>Created_at</th>
						<th>Action</th>
					</tr>

				</thead>
				<tbody>
					@foreach($cats as $cat)
					<tr>
						<td>{{$cat->id}}</td>
						<td>{{$cat->full_name}}</td>
						<td>{{$cat->email}}</td>
						<td>
							@if($cat->quyen == 1)
								{{"Admin"}}
							@else
								{{"Thường"}}
							@endif
						</td>
						<td>{{$cat->phone}}</td>
						<td>{{$cat->address}}</td>
						<td>{{$cat->created_at}}</td>
						<td>
							<form method="POST" action="{{route('account.destroy',$cat->id)}}">
							@csrf
							<input type="hidden" name="_method" value="DELETE">

						@if($cat->quyen == 1)
							<a href="{{ route('account.edit',$cat->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
						@else
							{{""}}
						@endif
						
						<button class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không')"><i class="fa fa-trash"></i></button>
						</form>
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>
			<div class="clearfix"></div>
			{{$cats->links()}}
		</div>
@endsection
