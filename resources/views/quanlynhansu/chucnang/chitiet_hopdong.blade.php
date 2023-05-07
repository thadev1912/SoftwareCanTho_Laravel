@extends('layout.main')
@section('main_body')

<div class="card-header ">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-info"> CHI TIẾT THÔNG TIN HỢP ĐỒNG</h1>
                                  </div>
                    
                     </div>
            <form action="{!! URL::route('capnhat_hd',$data->ma_nv)!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>MÃ HỢP ĐỒNG</label>
                        <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!!$data->ma_hd!!}">
                              
                    </div>
                   <div class="col">
                        <label>MÃ NHÂN VIÊN</label>
                        <input id="new-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!!$data->ma_nv!!}">
                              
                    </div>

                    </div>
                    <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>TÊN NHÂN VIÊN</label>
                        <input id="current-pass-control" name="txt_hoten_nv" class="form-control" type="text" value="{!!$data->hoten_nv!!}">
                              
                    </div>
                   <div class="col">
                        <label>SỐ ĐIỆN THOẠI</label>
                        <input id="new-pass-control" name="txt_sdt" class="form-control" type="text" value="{!!$data->sdt_nv!!}">
                              
                    </div>

                    </div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>TÌNH TRẠNG NHÂN VIÊN</label>
                        <input id="current-pass-control" name="txt_tinhtrang" class="form-control" type="text" value="{!!$data->tinhtrang!!}">       
                    </div>                  
<div class="col">
                        <label>THỜI HẠN HỢP ĐỒNG</label>
                        <input id="current-pass-control" name="txt_loai_hd" class="form-control" type="text" value="{!!$data->loai_hd!!}">
                                
                    </div>
                 
</div>


<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>NGÀY VÀO LÀM</label>
                        <input id="current-pass-control" name="txt_ngayvao" class="form-control" type="text" value="{!!$data->ngayvao!!}">       
                    </div>                  
<div class="col">
                        <label>HỆ SỐ LƯƠNG</label>
                        <input id="current-pass-control" name="txt_heso_luong" class="form-control" type="text" value="{!!$data->heso_luong!!}">
                                
                    </div>
                 
</div>




<div class="card-header text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{!! URL::previous()!!}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>


</div>

 
    @endsection