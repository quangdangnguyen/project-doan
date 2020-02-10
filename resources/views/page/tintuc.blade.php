@extends('master')
@section('content')
		<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Tin tức</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang_chu')}}">Trang chủ</a> / <span>Tin tức</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	

	<div class="container">
		<div class="row">
			<div class="col-md-1">
				
			</div>
		<div class="col-md-10">
			@foreach($news as $n)
			<div class="row media">
				<div class="col-xs-4">
			 		<div class="media-left media-top">
			    		<a href="#">
			      			<img class="media-object" src="{{$n->image}}" alt="..." width="250px" height="180px">
			    		</a>
			  		</div>
				</div>
				<div class="col-xs-8">
					<div class="media-body media-right">
			    		<h6 class="media-heading">{{$n->title}}</h6>
			   		 	<p>{{$n->content}}</p>
			  		</div>
				</div>
			</div>
			<hr>
			@endforeach
		</div>
		<div class="row">
		{{$news->links()}}
		</div>
			<div class="col-md-1">
				
			</div>
		</div>
	</div>
	

	



@endsection