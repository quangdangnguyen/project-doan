
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('/public/admin') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/public/admin') }}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/public/admin') }}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{ url('/public/admin') }}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{ url('/public/admin') }}/css/style.css" />
  <link rel="stylesheet" href="{{ url('/public/admin') }}/css/style.css" />
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>cPanel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <div class="form-group" style="text-align: center">
    @if(session('thongbao'))
        {{session('thongbao')}}
    @endif
    </div>
    <form action="" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        @if($errors->has('email'))
        {{$errors->first('email')}}
      @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        @if($errors->has('password'))
        {{$errors->first('password')}}
      @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="rmb"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        {{-- <div class="col-xs-4">
          <a href="{{ route('account.create') }}" class="btn btn-success btn-block btn-flat">Đăng ký</a>
        </div> --}}
        <!-- /.col -->
      </div>
    </form>

  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ url('/public/admin') }}/js/jquery.min.js"></script>
<script src="{{ url('/public/admin') }}/js/bootstrap.min.js"></script>
<script src="{{ url('/public/admin') }}/js/adminlte.min.js"></script>
</body>
</html>
