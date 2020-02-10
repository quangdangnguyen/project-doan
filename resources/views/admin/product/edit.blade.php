@extends('admin.master')
@section('title','Chỉnh sửa sản phẩm: '.$model->name)
@section('main')

<div class="box-body">
	<form action="{{route('product.update',$model->id)}}" method="POST" role="form">
		<input type="hidden" name="_method" value="PUT">
		@csrf
		<legend>Form chỉnh sửa sản phẩm</legend>
		<div class="row">
			<div class="col-md-9">		
					<div class="form-group">
						<label for="">Tên sản phẩm</label>
						<input type="text" class="form-control" name="name" id="name" value="{{ $model->name }}">
						@if($errors->has('name'))
							{{$errors->first('name')}}
						@endif
					</div>
					<div class="form-group">
						<label for="">Đường dẫn Seo</label>
						<input type="text" class="form-control" id="slug" name="slug" value="{{ $model->slug }}">
						@if($errors->has('slug'))
							{{$errors->first('slug')}}
						@endif
					</div>

					<div class="form-group">
						<label for="">Mô tả sản phẩm</label>
						<textarea name="description" id="content" class="form-control">{{$model->description}}</textarea>
					</div>
					</div>

			<div class="col-md-3">
				<div class="form-group">
					<label for="">Danh mục sản phẩm</label>
					<select name="id_type" class="form-control">
						<option value="">Chọn một</option>
						@foreach($cats as $cat)
						<?php $selected = $cat->id == $model->id_type ? 'selected' : ''; ?>
						<option {{$selected}} value="{{$cat->id}}">{{$cat->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Giá sản phẩm</label>	
					<input type="text" class="form-control" name="unit_price" value="{{ $model->unit_price }}">
					@if($errors->has('unit_price'))
						{{$errors->first('unit_price')}}
					@endif
				</div>
				<div class="form-group">
					<label for="">Giá khuyến mại</label>
					<input type="text" class="form-control" name="promotion_price" value="{{ $model->promotion_price }}">
					@if($errors->has('promotion_price'))
						{{$errors->first('promotion_price')}}
					@endif
				</div>
				
				<div class="form-group">
					<label for="">Đơn vị</label>
					<div class="radio">
						<label>
							<input type="radio" name="unit" value="hộp" <?php echo $model->unit == 'hộp' ? 'checked' : ''; ?>>
							Hộp
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="unit" value="cái" <?php echo $model->unit == 'cái' ? 'checked' : ''; ?>>
							Cái
						</label>
					</div>
				</div>
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
					<label for="">Sản phẩm mới</label>
					<div class="radio">
						<label>
							<input type="radio" name="new" id="input" value="1" <?php echo $model->new == 1 ? 'checked' : ''; ?>>
							Sản phẩm mới
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="new" id="input" value="0" <?php echo $model->new == 0 ? 'checked' : ''; ?>>
							Sản phẩm cũ
						</label>
					</div>
				<div class="form-group">
					<label for="">Hình ảnh</label>
					<div class="input-group">
						<input type="text" name="image" id="image" class="form-control" value="{{ $model->image }}">
							<span class="input-group-btn">
								<a href="#modal-file" data-toggle="modal" class="btn btn-default">Select</a>
							</span>
						</div>
							<img src="{{ $model->image }}" alt="{{ $model->name }}" id="show_img" style="width: 100%">
						</div>
					</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			
			</div>
		</div>	
	</form>
</div>
		
@endsection

@section('js')

<div class="modal fade" id="modal-file">
	<div class="modal-dialog" style="width: 50%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Quản lý file</h4>
			</div>
			<div class="modal-body"></div>
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
