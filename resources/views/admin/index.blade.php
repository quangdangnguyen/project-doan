@extends('admin.master')
@section('title','Trang chủ quản trị')
@section('main')

	<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$type_count}}</h3>

              <p>Loại sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$product_count}}</h3>

              <p>Số lượng sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$user_count}}</h3>

              <p>Người dùng đăng ký</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('account.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$new_pro_count}}</h3>

              <p>Sản phẩm mới</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('newproduct.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

		
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Đơn hàng mới</div>
		<div class="panel-body">
			
		</div>
	
		<!-- Table -->
		<table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="" >ID</th>
                        <th class="sorting_asc col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Tên người order</th>
                        <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Địa chỉ</th>
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Ngày đặt hàng</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                        <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Chi tiết</th>
                        
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->created_at }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>Đã xử lý</td>
                                <td style="text-align: center">
                                    <?php
                                        if($customer->action==1){
                                        ?>
                                            <a href="{{URL::to('/admin/bill/unactive/'.$customer->id)}}"><span class="fa fa-thumbs-up"></span></a>
                                        <?php   
                                            }else{
                                        ?>
                                            <a href="{{URL::to('admin/bill/active/'.$customer->id)}}"><span class="fa fa-thumbs-down"></span></a>
                                        <?php
                                        }
                                    ?>
                                </td>
                                <td><a href="{{ url('admin/bill')}}/{{ $customer->id }}/edit">Xem chi tiết</a></td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              <div class="row">{{$customers->links()}}</div>
	</div>
	
		
@endsection
