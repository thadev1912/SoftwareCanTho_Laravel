@extends('layout.main')
@section('main_body')

<div class="card-header bg-danger text-center ">
    <div class="row">
                  <div class="col">
                       <h1 class="btn text-light"> CHI TIẾT THÔNG TIN KHÁCH HÀNG</h1>
                  </div>
    
     </div>
</div>
</br>

            
           
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Họ Tên Khách Hàng</label>
                        <input id="current-pass-control" name="txt_hoten_kh" class="form-control" type="text" value="{!! $data->hoten_kh!!}">
                              
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                   <div class="col">
                        <label>Nội Dung Khách Hàng</label>
                        <textarea id="new-pass-control" name="txt_noidung_kh" class="form-control" type="text" >{{$data->noidung_kh}}</textarea>
                                
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
        <label>Số Điện Thoại Khách Hàng</label>
        <input id="current-pass-control" name="txt_sdt_kh" class="form-control" type="text" value="{!! $data->sdt_kh!!}">
              
    </div>
</div><div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
        <label>Địa Chỉ Khách Hàng</label>
        <input id="current-pass-control" name="txt_diachi_kh" class="form-control" type="text" value="{!! $data->diachi_kh!!}">
              
    </div>
    
</div>



<div class="card-header text-white">
  
    <div> <a href="{!! URL::route('thongtin_khachhang')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
</div>




</div>

 
    @endsection