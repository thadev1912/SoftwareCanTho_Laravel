<?php
use Carbon\Carbon;
use Illuminate\Support\Str;
?> 
@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white">  THÔNG TIN CHI TIẾT BẢNG LƯƠNG</h1>
                                  </div>
                    
                     </div>
           </div>
           <br>
<div class="card-body">
                     <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->

                
<div class="col-lg-3">
                       
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <img class="mx-auto rounded" src="{{ asset ('anhdaidien/'.$data_nv->anhdaidien) }}" style="width:150px;height:150px; margin-left:100px;" alt="..." />
                              
                    </div>                 
                    <div class="col">
                        <label>Mã Nhân Viên</label>
                        <input id="new-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!! $data_nv->ma_nv !!} " readonly="readonly">
                               
                                <label>Phòng Ban</label>
                        <input id="new-pass-control" name="txt_ten_pb" class="form-control" type="text" value="{!! $data_nv->ten_pb !!} " readonly="readonly">
                               
                               
                    </div>
                    <div class="col">
                        <label>Họ Tên Nhân Viên</label>
                        <input id="new-pass-control" name="txt_hoten_nv" class="form-control" type="text" value="{!! $data_nv->hoten_nv !!}" readonly="readonly">
                                
                                <label>Tên Chức Vụ</label>
                           <input id="new-pass-control" name="txt_ten_cv" class="form-control" type="text" value="{!! $data_nv->ten_cv!!}" readonly="readonly">
                                   
                    </div>

                 

</div>
<br>
<div class="form-row"> <!--col max-->
                    <div class="col">
                        <label>Ngày Công: </label>
                            <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! floor($data_cc->total) !!}" readonly="readonly">
                       
                        <label>Phụ cấp: </label>
                             <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! number_format($data_hd->phu_cap),''!!} VND" readonly="readonly">
                        <label>Khen Thưởng: </label>                       
                             <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! (!empty($data_kt->sotien) ? number_format($data_kt->sotien). ' VND' : 'Đang cập nhật') !!}" readonly="readonly">
                        
                     
                        <label>Tổng phép năm </label>
                        @if($data_pn->ngay_ketthuc)
                             <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! floor(Carbon::parse($data_pn->ngay_ketthuc)->diffInDays(Carbon::parse($data_pn->ngay_batdau))/30) !!}" readonly="readonly">
                        @else
                        <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! floor(Carbon::now()->diffInDays(Carbon::parse($data_pn->ngay_batdau))/30) !!}" readonly="readonly">
                        @endif 
                             <label>Phép năm còn lại </label>
                             <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! floor(Carbon::parse($data_pn->ngay_ketthuc)->diffInDays(Carbon::parse($data_pn->ngay_batdau))/30)-$data_pn->phepnam_dadung !!}" readonly="readonly">                                                                                                                      
                    </div>
                    <div class="col">
                        <label>Lương cơ bản:</label>
                            <input id="current-pass-control" name="txt_ngayvaolam" class="form-control" type="text" value="{!! number_format($data_hd->heso_luong),''!!} VND" readonly="readonly">
                        
                        <label>Đóng Bảo Hiểm Xã Hội: </label>
                             <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! number_format($data_bh->tiendong_bhxh),''!!} VND" readonly="readonly">  
                         <label>Kỷ luật: </label>
                         <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! (!empty($data_kl->sotien) ? number_format($data_kl->sotien). ' VND' : 'Đang cập nhật') !!}" readonly="readonly">
                        <label>Phép năm đã dùng: </label>
                             <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! $data_pn->phepnam_dadung !!}" readonly="readonly">
                             <label>Thực lãnh: </label>
                             <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! number_format(floor($data_hd->heso_luong/26*$data_cc->total)+$data_hd->phu_cap+(!empty($data_kt->sotien) ? $data_kt->sotien : '0')-($data_bh->tiendong_bhxh+ (!empty($data_kl->sotien) ? $data_kl->sotien : '0') )),'' !!} VND" readonly="readonly">                            
                    </div>             
                    </div>
                    <br>
                    <div> <a href="{{URL:: previous()}}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
</div>

</div>

                  
</div>
    @endsection