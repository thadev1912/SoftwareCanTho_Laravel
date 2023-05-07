 <?php
use Carbon\Carbon;
?> 
@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger text-center ">
    <div class="row">
                  <div class="col">
                       <h1 class="btn text-light"> THÔNG TIN NHÂN VIÊN</h1>
                  </div>
    
     </div>
</div>
<br>
     <div class="card-body">   
                     <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->

                
<div class="col-lg-3">
                       
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                        <img src="{{ asset ('anhdaidien/'.$data->anhdaidien) }}" class="mx-auto rounded" style="width:150px;height:150px; margin-right:100px;" alt="avatar" />
                        {{-- <img id="img-preview" src="/images/{{$data->anhdaidien}}"  name="hinh" alt="Avatar" class="avatar rounded-circle img-thumbnail ml-5 mt-2"/>            --}}
                                <div>
                                    {!! $errors->first('txtpban') !!}
                                </div>
                    </div>                 
                    <div class="col">
                        <label><ins>Mã Nhân Viên:</ins></label>
                        <input id="new-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!! $data->ma_nv !!} " readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                                <label><ins>Chức vụ:</ins></label>
                        <input id="new-pass-control" name="txt_ten_cv" class="form-control" type="text" value="{!! $data->ten_cv !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                    </div>
                    <div class="col">
                        <label><ins>Họ Tên Nhân Viên:</ins></label>
                        <input id="new-pass-control" name="txt_hoten_nv" class="form-control" type="text" value="{!! $data->hoten_nv !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                                <label><ins>Phòng Ban:</ins></label>
                        <input id="new-pass-control" name="txt_ten_pb" class="form-control" type="text" value="{!! $data->ten_pb !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                    </div>

                 

</div>
<br>
            <div class="form-row"> <!--col max-->
                    <div class="col">
                        <label><ins>Giới Tính:</ins></label>
                        <input id="current-pass-control" name="txt_gioitinh_nv" class="form-control" type="text" value="{!!$data->gioitinh_nv !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                    </div>
                   <div class="col">
                        <label><ins>Số điện thoại:</ins></label>
                        <input id="new-pass-control" name="txt_sdt_nv" class="form-control" type="text" value="{!! $data->sdt_nv !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                    </div>
           </div>
           <div class="form-row"> <!--col max-->
                    <div class="col">
                        <label><ins>Địa chỉ:</ins></label>
                        <input id="current-pass-control" name="txt_diachi_nv" class="form-control" type="text" value="{!!$data->diachi_nv !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                    </div>
                    <div class="col">
                        <label><ins>Tình trạng nhân viên:</ins></label>
                        <input id="current-pass-control" name="txt_tinhtrang_nv" class="form-control" type="text" value="{!!$data->tinhtrang !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txt_tinhtrang') !!}
                                </div>
                    </div>
</div>
<div class="form-row"> <!--col max-->
                    <div class="col">
                        <label><ins>Mã Hợp đồng:</ins></label>
                        <a href="{!! URL::route('chitiet_hopdong',$data->ma_nv)!!}"><input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!!$data->ma_hd !!}" readonly="readonly"></a>
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                                <label><ins>Tình Trạng Nhân Viên:</ins> </label>
                                <input id="current-pass-control" name="txt_tinhtrang" class="form-control" type="text" value="{!!$data->tinhtrang!!}" readonly="readonly">
                              <label><ins>Tổng số phép năm:</ins></label>
                            <input id="current-pass-control" name="txt_ma_bhxh" class="form-control" type="text" value="{!!floor(Carbon::parse($phepnam->ngay_ketthuc)->diffInDays(Carbon::parse($phepnam->ngay_batdau))/30)!!}" readonly="readonly">                                                 
                                <label><ins>Mã Bảo Hiểm:</ins> </label>
                                <a href="{!! URL::route('chitiet_bhxh',$data->ma_nv)!!}"><input id="current-pass-control" name="txt_ma_bhxh" class="form-control" type="text" value="{!!$data->ma_bhxh!!}" readonly="readonly"><a>
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                               
                               
                    </div>
                    <div class="col">
                        <label><ins>Ngày Vào Làm:</ins></label>
                        <input id="current-pass-control" name="txt_ngayvaolam" class="form-control" type="text" value="{!!$data->ngayvao !!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                                <label><ins>Loại Hợp Đồng:</ins></label>
                                <input id="current-pass-control" name="txt_loai_hd" class="form-control" type="text" value="{!!$data->loai_hd!!}" readonly="readonly">
                                <label><ins>Phép năm còn lại:</ins></label>
                                      <input id="current-pass-control" name="txt_loai_bhxh" class="form-control"  type="text" value="{!! floor(Carbon::parse($phepnam->ngay_ketthuc)->diffInDays(Carbon::parse($phepnam->ngay_batdau))/30)-$phepnam->phepnam_dadung !!}" readonly="readonly"></a> 
                                <div>
                                <label><ins>Loại BHXH:</ins> </label>
                                     <input id="current-pass-control" name="txt_loai_bhxh" class="form-control"  type="text" value="{!!$data->loai_bhxh !!}" readonly="readonly"></a>
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
</div>
</div>
</div>

                              
          

<br>

<div class="form-row"> <!--col max-->
                    <div class="col">
                
                        <h3><ins>Khen Thưởng:</ins></h3>
                        @if(isset($result))
                       
                                <label><ins>Số Tiền Khen Thưởng:</ins></label>
                        <input id="current-pass-control" name="txt_gioitinh_nv" class="form-control" type="text" value="{!! $result->sotien!!} VND" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                                <label><ins>Lý Do Khen Thưởng:</ins></label>
                        <input id="current-pass-control" name="txt_gioitinh_nv" class="form-control" type="text" value="{!! $result->lydo!!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                                <label><ins>Ngày Quyết Định Khen Thưởng:</ins></label>
                        <input id="current-pass-control" name="txt_gioitinh_nv" class="form-control" type="text" value="{!! $result->ngay_khenthuong!!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtMa') !!}
                                </div>
                                @endif
                    </div>
                 
                   <div class="col">
                   <h3><ins>Kỷ Luật:</ins></h3>
                   @if(isset($info))
                        
                                <label><ins>Số Tiền Kỷ Luật:</ins></label>
                        <input id="new-pass-control" name="txt_sdt_nv" class="form-control" type="text" value="{!! $info->sotien!!} VND" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                                <label><ins>Lý Do Kỷ Luật:</ins></label>
                        <input id="new-pass-control" name="txt_sdt_nv" class="form-control" type="text" value="{!! $info->lydo!!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                                <label><ins>Ngày Quyết Định Kỷ Luật:</ins></label>
                        <input id="new-pass-control" name="txt_sdt_nv" class="form-control" type="text" value="{!! $info->ngay_kyluat!!}" readonly="readonly">
                                <div>
                                    {!! $errors->first('txtTen') !!}
                                </div>
                                @endif
                    </div>
           </div>
  <br>
  <div> <a href="{!! URL::route('ds_nhanvien')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
</div>    
</div>
    @endsection