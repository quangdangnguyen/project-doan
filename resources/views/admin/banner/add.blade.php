@extends('admin.master')

@section('title','Thêm mới slide')

@section('main')
	
<div class="box-body">
	<form action="{{route('banner.store')}}" method="POST" role="form">
		
		@csrf
		<legend>Form add new</legend>
	<div class="row">
		<div class="col-md-7">
			<div class="form-group">
				<label for="">Tên</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Tên">
			</div>
			<div class="form-group">
				<label for="">Mô tả</label>
				<textarea name="description" id="content" class="form-control"></textarea>
			</div>
		</div>

		<div class="col-md-5">
			<div class="form-group">
				<label for="">Link</label>
				<input type="text" class="form-control" name="link" id="link" placeholder="Link">
			</div>
			<div class="form-group">
				<label for="">Hành động</label>
				<div class="radio">
					<label>
						<input type="radio" name="action" value="1" checked>
						Hiện
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="action" value="0">
						Ẩn
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="">Hình ảnh</label>
				<div class="input-group">
					<input type="text" name="image" id="image" class="form-control" placeholder="Hình ảnh">
					@if($errors->has('image'))
						{{$errors->first('image')}}
					@endif
						<span class="input-group-btn">
							<a href="#modal-file" data-toggle="modal" class="btn btn-default">Select</a>
						</span>
					</div>
						<img src="" alt="" id="show_img" style="width: 100%">
					</div>
				</div>
				<div style="text-align: center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>				
		</div>
	</form>
</div>

@stop()


@section('js')
<div class="modal fade" id="modal-file">
	<div class="modal-dialog" style="width: 50%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Quản lý file</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<iframe src="{{url('file')}}/dialog.php?akey=WMj1MGe1MrVMyNwFlkvi07tQ1xTcWL9t27zX9C3ugGg&field_id=image" style="width: 100%;height: 500px; border:0; overflow-y: auto"></iframe>
			</div>
		</div>
	</div>
</div>
<script src="{{ url('/public/admin') }}/js/slug.js"></script>
<script src="{{ url('/public/admin') }}/tinymce/tinymce.min.js"></script>
<script src="{{ url('/public/admin') }}/tinymce/config.js"></script>

<script type="text/javascript">
	$('#modal-file').on('hide.bs.modal',function(){
		var _img = $('input#image').val();
		$('img#show_img').attr('src',_img);
	});

</script>
@stop()