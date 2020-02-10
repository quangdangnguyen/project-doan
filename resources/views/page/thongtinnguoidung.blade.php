@extends('master')

@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Thông tin người dùng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang_chu')}}">Trang chủ</a> / <span>Thông tin người dùng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('user')}}" method="POST" class="beta-form-checkout">	
			<input type="hidden" name="_token" value="{{csrf_token()}}">	
				<div class="row">
					<div class="col-sm-3"></div>
					
					<div class="col-sm-6">
						<h4>Thông tin người dùng</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-group">
							<label for="email">Email address*</label>
							<input type="email" class="form-control" id="email" name="email" readonly style="background-color: lightblue" value="{{$tt_user->email}}">
						</div>

						<div class="form-group">
							<label for="your_last_name">Fullname*</label>
							<input type="text" class="form-control" id="fullname" name="fullname" value="{{$tt_user->full_name}}">
						</div>

						<div class="form-group">
							<label for="adress">Address*</label>
							<input type="text" class="form-control" id="adress" name="address" value="{{$tt_user->address}}">
						</div>
						<div class="form-group">
							<label for="phone">Phone*</label>
							<input type="text" class="form-control" id="phone" name="phone" value="{{$tt_user->phone}}">
						</div>
						
						
						<div class="form-group">	
							<label>Mật khẩu</label>
							<input type="password" class="form-control" id="password" name="password" value="{{$tt_user->password}}">
							<input type="checkbox" onclick="Toggle()" style="display: inline-block"> <b>Show Password</b>
						</div>
<script> 
    // Change the type of input to password or text 
        function Toggle() { 
            var temp = document.getElementById("password"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 

						<div class="form-block">
							<a href="{{route('trang_chu')}}" class="btn btn-xs btn-primary">Xác nhận</a>
							<a href="nguoi-dung" class="btn btn-xs btn-success">Sửa</a>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
