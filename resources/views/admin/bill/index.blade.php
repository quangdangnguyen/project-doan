@extends('admin.master')
@section('title','Quản trị đơn hàng')
@section('main')

	
		
	<section class="content-header">
        <h1>
            Danh sách đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Bill</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    @if (Session::has('message'))
        <div class="alert alert-info"> {{ Session::get('message') }}</div>
    @endif
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
            <div class="col-md-12">
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
                        {{-- <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Xóa</th></tr> --}}
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
                                <!-- <td>
                                    <form action="{{ url('admin/bill')}}/{{ $customer->id }}/" method="post" id="formDelete">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        {{ csrf_field() }}
                                    </form>
                                    <form method="POST" action="{{ route('bill.destroy',$customer->id) }}" id="formDelete">
                                      @csrf
                                      <input type="hidden" name="_method" value="DELETE">
                                    
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">{{$customers->links()}}</div>
            </div>
        </div>
            </div>
        </div>
    </section>
	
		
@endsection
