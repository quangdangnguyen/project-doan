@extends('admin.master')
@section('title','Thêm mới tài khoản')
@section('main')
		<form action="{{route('account.store')}}" method="POST" role="form">
			@csrf
			<legend>Form add new</legend>
		
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="full_name" placeholder="Nhập tên người dùng">
				@if($errors->has('full_name'))
					{{$errors->first('full_name')}}
				@endif
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="text" class="form-control" name="email" placeholder="Nhập email">
				@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
			</div>

			<div class="form-group">
				<label for="">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Nhập password">
				@if($errors->has('password'))
					{{$errors->first('password')}}
				@endif
			</div>

			<div class="form-group">
				<label for="">Confirm Password</label>
				<input type="password" class="form-control" name="re_password" placeholder="Nhập password">
				@if($errors->has('re_password'))
					{{$errors->first('re_password')}}
				@endif
			</div>

			<div class="form-group">
				<label for="">Phone</label>
				<input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
			</div>

			<div class="form-group">
				<label for="">Address</label>
				<input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
			</div>
		
			
		
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
@endsection
