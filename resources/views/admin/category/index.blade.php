@extends('admin.master')

@section('title','Quản lý danh mục')

@section('main')

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Category List</div>
		<div class="panel-body">
			<form action="" method="POST" class="form-inline" role="form">
							
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="Input keyword">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-search"></i>
				</button>
				<a href="{{ route('category.create') }}" class="btn btn-success">Add New</a>
			</form>
		</div>
	
		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Slug</th>
					<th width="40%">Mô tả</th>
					<th>Created at</th>
					<th>Updated at</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($cats as $cat)
			<tbody>
				<tr>
					<td>{{ $cat->id }}</td>
					<td>{{ $cat->name }}</td>
					<td>{{ $cat->slug }}</td>
					<td>{{ $cat->description }}</td>
					<td>{{ $cat->created_at }}</td>
					<td>{{ $cat->updated_at }}</td>
					<td>
						<form method="POST" action="{{route('category.destroy',$cat->id)}}">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
						
						<a href="{{ route('category.edit',$cat->id) }}" class="btn btn-xs btn-primary">Edit</a>
						<button class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không')">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="clearfix"></div>

		{{$cats->links()}}
	</div>

@stop()