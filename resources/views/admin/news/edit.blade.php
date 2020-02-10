@extends('admin.master')

@section('title','Chỉnh sửa tin tức')

@section('main')
	
<div class="box-body">
	<form action="{{route('news.update',$model->id)}}" method="POST" role="form">
		<input type="hidden" name="_method" value="PUT">
		@csrf
		<legend>Form edit</legend>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label for="">Tiêu đề</label>
				<input type="text" class="form-control" name="title" id="title" value="{{$model->title}}">
			</div>
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea name="content" id="content" class="form-control">{{$model->content}}</textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
					<label for="">Hành động</label>
					<div class="radio">
						<label>
							<input type="radio" name="action" value="1" <?php echo $model->action == '1' ? 'checked' : ''; ?>>
							Hiện
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="action" value="0" <?php echo $model->action == '0' ? 'checked' : ''; ?>>
							Ẩn
						</label>
					</div>
				</div>
			<div class="form-group">
				<label for="">Hình ảnh</label>
				<div class="input-group">
					<input type="text" name="image" id="image" class="form-control" value="{{ $model->image }}">
					@if($errors->has('image'))
						{{$errors->first('image')}}
					@endif
						<span class="input-group-btn">
							<a href="#modal-file" data-toggle="modal" class="btn btn-default">Select</a>
						</span>
					</div>
						<img src="{{ $model->image }}" alt="{{ $model->name }}" id="show_img" style="width: 100%">
					</div>
				</div>
				<div style="text-align: center">
					<button type="submit" class="btn btn-primary">Save</button>
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