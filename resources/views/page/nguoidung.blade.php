@extends('master')

@section('content')
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sửa thông tin người dùng {{$edituser->full_name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang_chu')}}">Trang chủ</a> / <span>Sửa thông tin</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="nguoi-dung" method="POST" class="beta-form-checkout">	
			<input type="hidden" name="_token" value="{{csrf_token()}}">	
				<div class="row">
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-3"></div>
					
					<div class="col-sm-6">
						<h4>Sửa thông tin</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-group">
							<label for="email">Email address*</label>
							<input type="email" class="form-control" id="email" name="email" readonly style="background-color: lightblue" value="{{$edituser->email}}">
						</div>

						<div class="form-group">
							<label for="your_last_name">Fullname*</label>
							<input type="text" class="form-control" id="fullname" name="fullname" value="{{$edituser->full_name}}">
							@if($errors->has('fullname'))
								{{$errors->first('fullname')}}
							@endif
						</div>

						<div class="form-group">
							<label for="adress">Address*</label>
							<input type="text" class="form-control" id="adress" name="address" value="{{$edituser->address}}">
						</div>
						<div class="form-group">
							<label for="phone">Phone*</label>
							<input type="text" class="form-control" id="phone" name="phone" value="{{$edituser->phone}}">
						</div>
						
						
						<div class="form-group">
							<input type="checkbox" id="changePassword" name="changePassword" style="display: inline-block"> <b></b>
							<label for="password">Change password</label>
							<input type="password" class="form-control password" name="password" disabled>
							@if($errors->has('password'))
								{{$errors->first('password')}}
							@endif
						</div>

						<div class="form-group">
							<label for="repassword">Nhập lại mật khẩu</label>
							<input type="password" class="form-control password" name="re_password" disabled>
							@if($errors->has('re_password'))
								{{$errors->first('re_password')}}
							@endif
						</div>

<script>
	$(document).ready(function(){
		$("#changePassword").change(function(){
			if($(this).is(':checked'))
			{
				$('.password').removeAttr("disabled");
			}
			else
			{
				$('.password').attr("disabled",'');
			}
		});
	});
</script>

						<div class="form-block">
							<button type="submit" class="btn btn-md btn-success">Sửa</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection

