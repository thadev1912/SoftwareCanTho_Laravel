@extends('layout.main')
@section('main_body')
<div class="card">
     <div class="card-header bg-danger">
          <div class="row">
                        <div class="col-md-12" align="center">
                             <h1 class="btn text-light"> THÊM THÔNG TIN HỢP ĐỒNG</h1>
                        </div>
          
           </div>
</div>
</br>
<div class="card-body">
                     @if($errors->any())
                           <div class="alert alert-danger text-center">
                            Vui lòng kiểm tra lại thông tin!!!
                           </div>
                     @endif
            <form action="{!! URL::route('luu_hd')!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>MÃ HỢP ĐỒNG</label>
                        <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!! old('txt_ma_hd') !!}" placeholder="Gợi ý: HDMFNV........">
                        @error('txt_ma_hd')
                             <span class="text-danger">{{$message}}</span>
                            @enderror       
                    </div>
                   <div class="col">
                        <label>HỌ TÊN NHÂN VIÊN MỚI</label>
                        {{-- <input id="new-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!! old('txt_ma_nv') !!}"> --}}
                        <select class="form-control" name="txt_ma_nv" id="txt_ma_nv">
                         <option value="">---Vui lòng chọn nhân viên---</option>
                         @foreach ($select_nv as $item)
                             <option value="{{$item->ma_nv}}" {{old('txt_ma_nv') == $item->ma_nv ? "selected" :""}}>{{$item->hoten_nv}}</option>
                         @endforeach
                        </select>
                        @error('txt_ma_nv')
                             <span class="text-danger">{{$message}}</span>
                            @enderror    
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>TÌNH TRẠNG NHÂN VIÊN</label>
                        {{-- <input id="new-pass-control" name="txt_tinhtrang" class="form-control" type="text" value="{!! old('txt_tinhtrang') !!}"> --}}
                        <select class="form-control" name="txt_tinhtrang" id="txt_tinhtrang">
                         <option value="">---Vui lòng chọn trạng thái nhân viên---</option>
                         @foreach ($tinhtrang as $item)
                             <option value="{{$item->tinhtrang}}" {{old('txt_tinhtrang') == $item->tinhtrang ? "selected" :""}}>{{$item->tinhtrang}}</option>
                         @endforeach
                        </select>
                        @error('txt_tinhtrang')
                             <span class="text-danger">{{$message}}</span>
                            @enderror    
                    </div>                  

<div class="col">
                        <label>THỜI HẠN HỢP ĐỒNG</label>
                        {{-- <input id="current-pass-control" name="txt_loai_hd" class="form-control" type="text" value="{!! old('txt_loai_hd') !!}"> --}}
                        <select class="form-control" name="txt_loai_hd" id="txt_loai_hd">
                         <option value="">---Vui lòng chọn loại hợp đồng---</option>
                         @foreach ($loaihd as $item)
                             <option value="{{$item->loai_hd}}"{{old('txt_loai_hd') == $item->loai_hd ? "selected" :""}}>{{$item->loai_hd}}</option>
                         @endforeach
                        </select>
                        @error('txt_loai_hd')
                             <span class="text-danger">{{$message}}</span>
                            @enderror    
                    </div>
                       
</div>

<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>LƯƠNG CƠ BẢN</label>
                        <input id="new-pass-control" name="txt_heso_luong" class="form-control" type="text" value="{!! old('txt_heso_luong') !!}">
                        @error('txt_heso_luong')
                             <span class="text-danger">{{$message}}</span>
                            @enderror    
                    </div>                  

<div class="col">
                        <label>NGÀY VÀO LÀM</label>
                        <input id="current-pass-control" name="txt_ngayvao" class="form-control" type="date" value="{!! old('txt_ngayvao') !!}">
                        @error('txt_ngayvao')
                             <span class="text-danger">{{$message}}</span>
                            @enderror    
                    </div>
                       
</div>




<div class="mt-3 text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{!! URL::route('hopdong')!!}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>


</div>

</div>
</div>
    @endsection