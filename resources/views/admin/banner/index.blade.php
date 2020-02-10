@extends('admin.master')

@section('title','Quản lý banner')

@section('main')

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Banner List</div>
		<div class="panel-body">
			<form action="" method="POST" class="form-inline" role="form">
							
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="Input keyword">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-search"></i>
				</button>
				<a href="{{ route('banner.create') }}" class="btn btn-success">Add New</a>
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
					<th>Tên</th>
					<th>Links</th>
					<th>Hình ảnh</th>
					<th>Mô tả</th>
					<th width="8%">Trạng thái</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			@foreach($slides as $sli)
			<tbody>
				<tr>
					<td>{{ $sli->id }}</td>
					<td>{{ $sli->name }}</td>
					<td>{{ $sli->link }}</td>
					<td>
						<img class="media-object" src="{{$sli->image}}" alt="Image" width="150px" height="80px">
					</td>
					<td>{{ $sli->description }}</td>
					<td style="text-align: center">
						<?php
							if($sli->action==1){
							?>
								<a href="{{URL::to('/admin/banner/unactive/'.$sli->id)}}"><span class="fa fa-thumbs-up"></span></a>
							<?php	
								}else{
							?>
								<a href="{{URL::to('admin/banner/active/'.$sli->id)}}"><span class="fa fa-thumbs-down"></span></a>
							<?php
							}
						?>
					</td>
					<td>
						<form method="POST" action="{{route('banner.destroy',$sli->id)}}">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
						
						<a href="{{ route('banner.edit',$sli->id) }}" class="btn btn-xs btn-primary">Edit</a>
						<button class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không')">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="clearfix"></div>

		
	</div>

@stop()