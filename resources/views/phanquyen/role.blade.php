@extends('layout.main')
@section('main_body')
  <div class="container"> 
        <div class="card">         
                    <div class="card-header bg-danger">
                               <div class="row">
                                     <div class="col-md-12" align="center">
                                            <h1 class="btn text-light"> CẬP NHẬT NHÓM QUYỀN</h1>
                                     </div>                                  
                               </div>
                    </div>            
          <div class="card-body ">            
   <form action="" method="post">
      @csrf
<table class="table table-bordered text-center">
<tr>
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Quyền</th>
      <th style="text-align: center; vertical-align: middle; background: blue;color: white;width:50px;">Nhóm Quyền</th>
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">Tùy Chỉnh</th>
     
</tr>

@foreach($data as $dt)
      <tr>
            <td>{{$dt->id}}</td>
            <td style="text-align: left;">{{$dt->role_name}}</td>
            <td>
                <a href="{{URL ::route('chitiet_role',$dt->id)}}" class="btn-xs btn btn-success"><i class="far fa-eye">&nbsp;Xem Chi Tiết Quyền</i></a>
                <a href="{{URL ::route('chinhsua_role',$dt->id)}}" class="btn-xs btn btn-danger"><i class="fas fa-user-edit">&nbsp;Chỉnh Sửa Quyền</i></a>
                <a href="{{URL ::route('xoa_role',$dt->id)}}" class="btn-xs btn btn-warning"><i class="far fa-trash-alt">&nbsp;Xóa Quyền</i></a> 
                
            </td>
      </tr>
      @endforeach
</table>
<a href="{{URL::route('add_role')}}" class="btn-xs btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm Mới Nhóm Quyền</i></a>
<a href="{{URL::route('gioithieu')}}" class="btn-xs btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại </i></a>
</div>
</div>
    @endsection
