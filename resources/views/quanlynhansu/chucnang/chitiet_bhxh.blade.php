@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger ">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white"> CẬP NHẬT THÔNG TIN BẢO HIỂM XÃ HỘI</h1>
                                  </div>
                    
                     </div>
</div>
<div class="card-body">
            <form action="{!! URL::route('capnhat_bhxh',$data->id)!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>MÃ BẢO HIỂM XÃ HỘI</label>
                        <input id="current-pass-control" name="txt_ma_bhxh" class="form-control" type="text" value="{!! $data->ma_bhxh !!}" readonly="readonly">
                              
                    </div>
                   <div class="col">
                        <label>MÃ NHÂN VIÊN</label>
                        <input id="new-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!! $data->ma_nv !!}" readonly="readonly">
                              
                    </div>
</div>
<div class="form-row">
<div class="col">
                        <label>HỌ TÊN NHÂN VIÊN<I></I></label>
                        <input id="current-pass-control" name="txt_hoten_nv" class="form-control" type="text" value="{!! $data->hoten_nv !!}" readonly="readonly">
                                
                    </div>
<div class="col">
                        <label>LOẠI BẢO HIỂM XÃ HỘI<I></I></label>
                        <input id="current-pass-control" name="txt_loai_bhxh" class="form-control" type="text" value="{!! $data->loai_bhxh !!}" readonly="readonly">
                                
                    </div>

</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>NGÀY CẤP</label>
                        <input id="new-pass-control" name="txt_ngaycap" class="form-control" type="text" value="{!! $data->ngaycap !!}" readonly="readonly">
                                
                    </div>                  
<div class="col">
                        <label>NGÀY HẾT HẠN</label>
                        <input id="current-pass-control" name="txt_ngayhethan" class="form-control" type="text" value="{!! $data->ngayhethan !!}" readonly="readonly">
                       
                                
                    </div>
                 
</div>

<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>NƠI CẤP</label>
                        <input id="current-pass-control" name="txt_noicap" class="form-control" type="text" value="{!! $data->noicap !!}" readonly="readonly">
                              
                    </div>
                    <div class="col">
                        <label>NƠI KHÁM BỆNH</label>
                        <input id="current-pass-control" name="txt_noicap" class="form-control" type="text" value="{!! $data->noikham !!}" readonly="readonly">
                              
                    </div>
                   
</div>



<div class=" text-white mt-2">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{!! URL::previous()!!}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>

</div>
</div>
</div>
   
  
    @endsection