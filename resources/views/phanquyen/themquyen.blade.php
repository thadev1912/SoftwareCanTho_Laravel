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
        <a href="{{URL::route('add_role')}}" class="btn-xs btn btn-primary mb-3"><i class="fas fa-feather">&nbsp;Thêm mới Nhóm Quyền</i></a>
       
   <form action="{{URL ::route('capnhat_quyen',$info->id)}}" method="post">
      @csrf
<table class="table table-bordered text-center">
<tr>
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Quyền</th>
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Nhóm Quyền</th>
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">Tùy Chỉnh</th>
     
</tr>
 @php $user=$info->id;
 @endphp
@foreach($data as $key => $dt)

<tr>
      <td>
      {{++$key}} 
      </td>
      <td> 
     
               <div class="form-check">
               @php
       //dd($get_checked);
   $checked=in_array($dt->role_name,$get_checked) ? 'checked':'123';
  
@endphp
                        <input class="form-check-input" type="checkbox" name="role[]" value="{{$dt->id}}" id="flexCheckDefault" {{$checked}}>
                        
                        <label class="form-check-label" for="">{{$dt->role_name}}</label>
              </div>
              
               
                </td>
                <td>
                <a href="{{URL ::route('chitiet_role',$dt->id)}}" class="btn-xs btn btn-success"><i class="far fa-eye">&nbsp;Xem Chi Tiết Quyền</i></a>
                <a href="{{URL ::route('chinhsua_role',$dt->id)}}" class="btn-xs btn btn-danger"><i class="fas fa-user-edit">&nbsp;Chỉnh Sửa Quyền</i></a>
                <a href="{{URL ::route('xoa_role',$dt->id)}}" class="btn-xs btn btn-warning"><i class="far fa-trash-alt">&nbsp;Xóa Quyền</i></a> 
                
            </td>
                </tr>
                @endforeach
</table>
<button class="btn-xs btn btn-primary" type="submit"><i class="fa fa-save">&nbsp;Cập Nhóm Nhóm Quyền Cho Tài Khoản</i></button>
   
<a href="{{URL::route('list_user')}}" class="btn-xs btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại </i></a>
</div>
</div>
    @endsection
