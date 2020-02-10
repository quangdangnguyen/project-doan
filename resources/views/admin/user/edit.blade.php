@extends('admin.master')
@section('title','Chỉnh sửa tài khoản')
@section('main')

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>




		<form action="{{route('account.update',$model->id)}}" method="POST" role="form">
			<input type="hidden" name="_method" value="PUT">
			@csrf
			<legend>Form edit</legend>
		
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="full_name" value="{{ $model->full_name }}">
				@if($errors->has('full_name'))
					{{$errors->first('full_name')}}
				@endif
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="text" class="form-control" name="email" readonly style="background-color: lightblue" value="{{ $model->email }}">
				@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
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

			<div class="form-group">
				<label for="">Phone</label>
				<input type="text" class="form-control" name="phone" value="{{ $model->phone }}">
			</div>

			<div class="form-group">
				<label for="">Address</label>
				<input type="text" class="form-control" name="address" value="{{ $model->address }}">
			</div>
		
			
		
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
@endsection
