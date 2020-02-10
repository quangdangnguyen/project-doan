@extends('admin.master')

@section('title','Quản lý tin tức')

@section('main')

	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">News List</div>
		<div class="panel-body">
			<form action="" method="POST" class="form-inline" role="form">
							
				<div class="form-group">
					<input type="text" class="form-control" name="search" placeholder="Input keyword">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-search"></i>
				</button>
				<a href="{{ route('news.create') }}" class="btn btn-success">Add New</a>
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
					<th width="4%">ID</th>
					<th width="12%">Tiêu đề</th>
					<th width="38%">Nội dung</th>
					<th width="17%">Hình ảnh</th>
					<th width="10%">Update at</th>
					<th width="8%">Trạng thái</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			@foreach($news as $n)
			<tbody>
				<tr>
					<td>{{ $n->id }}</td>
					<td>{{ $n->title }}</td>
					<td>{{ $n->content }}</td>
					<td>
						<a class="pull-left" href="#">
							<img class="media-object" src="{{$n->image}}" alt="Image" width="150px" height="120px">
						</a>
					</td>
					<td>
						<div class="media-body">
							<p>{{$n->updated_at->format('d-m-Y')}}</p>
						</div>
					</td>
					<td style="text-align: center">
						<?php
							if($n->action==1){
							?>
								<a href="{{URL::to('/admin/news/unactive/'.$n->id)}}"><span class="fa fa-thumbs-up"></span></a>
							<?php	
								}else{
							?>
								<a href="{{URL::to('admin/news/active/'.$n->id)}}"><span class="fa fa-thumbs-down"></span></a>
							<?php
							}
						?>
					</td>
					<td>
						<form method="POST" action="{{route('news.destroy',$n->id)}}">
							@csrf
							<input type="hidden" name="_method" value="DELETE">
						
						<a href="{{ route('news.edit',$n->id) }}" class="btn btn-xs btn-primary">Edit</a>
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