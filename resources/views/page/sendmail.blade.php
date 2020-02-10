@extends('master')

@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{'trang_chu'}}">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">	
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ</h2>
					
					<div class="space20">&nbsp;</div>
					<form action="{{route('sendmail')}}" method="post">	
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-block">
							<input name="name" type="text" placeholder="Tên khách hàng (required)">
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Email khách hàng (required)">
						</div>
						<div class="form-block">
							<input name="subject" type="text" placeholder="Chủ đề">
						</div>
						<div class="form-block">
							<textarea name="message" placeholder="Lời nhắn đóng góp của khách hàng"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						236 - 238 Hoàng Quốc Việt<br>
						Bắc Từ Liêm<br>
						Hà Nội
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Email</h6>
					<p>
						Bạn có thể đóng góp ý kiến bằng cách liên hệ qua hòm thư điện tử: <br>
						<a href="mailto:sonnguyenngochp@gmail.com">sonnguyenngochp@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Liên hệ</h6>
					<p>
						Mọi thắc mắc của bạn sẽ được giải đáp một cách nhanh nhất thông qua đường dây nóng <br>
						<div class="body">
							<div class="title"><a href="tel:02437554010" title="024 3755 4010">024 3755 4010</a></div>
						</div>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection