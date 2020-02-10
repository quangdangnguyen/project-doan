@extends('master')

@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang_chu')}}">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.657475611056!2d105.78126221484895!3d21.046386992552378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1573783817482!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<p>Tất cả mọi đóng góp ý kiến của khách hàng đều được chúng tôi ghi nhận và tiếp thu để có thể nâng cao chất lượng sản phẩm và dịch vụ, đem lại sự hài lòng cho khách hàng. </p><br>
					<p>Khán giả có thể đóng góp ý kiến bằng cách điền vào form liên hệ dưới đây và gửi lại cho chúng tôi: </p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên khách hàng (required)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email khách hàng (required)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Chủ đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Lời nhắn đóng góp của khách hàng"></textarea>
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