@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger">
    <div class="row">
                  <div class="col-md-12" align="center">
                       <h1 class="btn text-light"> SỬA THÔNG TIN HỢP ĐỒNG</h1>
                  </div>
    
     </div>
</div>
</br>
<div class="card-body">
            <form action="{!! URL::route('capnhat_hd',$data->ma_nv)!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>MÃ HỢP ĐỒNG</label>
                        <input id="current-pass-control" name="txt_ma_hd" class="form-control" type="text" value="{!!$data->ma_hd!!}">
                        @error('txt_ma_hd')
                        <span class="text-danger">{{$message}}</span>
                       @enderror    
                    </div>
                   <div class="col">
                        <label>MÃ NHÂN VIÊN</label>
                        {{-- <input id="new-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!!$data->ma_nv!!}"> --}}
                        <select class="form-control" name="txt_ma_nv" id="txt_ma_nv">                          
                            @foreach ($nhanvien as $item)
                                <option value="{{$item->ma_nv}}"
                                    @if($data->ma_nv==$item->ma_nv)
                                    selected
                                    @endif 
                                    >{{$item->hoten_nv}}</option>
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
                        {{-- <input id="current-pass-control" name="txt_tinhtrang" class="form-control" type="text" value="{!!$data->tinhtrang!!}">        --}}
                        <select class="form-control" name="txt_tinhtrang" id="txt_tinhtrang">                          
                            @foreach ($tinhtrang as $item)
                                <option value="{{$item->tinhtrang}}"
                                    @if($data->tinhtrang==$item->tinhtrang)
                                    selected
                                    @endif 
                                    >{{$item->tinhtrang}}</option>
                            @endforeach
                           </select>
                           @error('txt_tinhtrang')
                           <span class="text-danger">{{$message}}</span>
                          @enderror    
                    </div>                  
<div class="col">
                        <label>THỜI HẠN HỢP ĐỒNG</label>
                        {{-- <input id="current-pass-control" name="txt_loai_hd" class="form-control" type="text" value="{!!$data->loai_hd!!}"> --}}
                        <select class="form-control" name="txt_loai_hd" id="txt_loai_hd">                          
                            @foreach ($loaihd as $item)
                                <option value="{{$item->loai_hd}}"
                                    @if($data->loai_hd==$item->loai_hd)
                                    selected
                                    @endif 
                                    >{{$item->loai_hd}}</option>
                            @endforeach
                           </select>
                           @error('txt_loai_hd')
                           <span class="text-danger">{{$message}}</span>
                          @enderror       
                    </div>
                 
</div>


<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>NGÀY VÀO LÀM</label>
                        {{-- <input value="{{$data->ngayvao}}" name="txt_ngayvao" class="form-control" type="date">  --}}
                        <input type="date" class="form-control" value="{{$data->ngayvao}}" id="txt_ngayvao" name="txt_ngayvao" placeholder="Chọn ngày">
                        @error('txt_ngayvao')
                        <span class="text-danger">{{$message}}</span>
                       @enderror          
                    </div>                  
<div class="col">
                        <label>LƯƠNG CƠ BẢN</label>
                        <input id="current-pass-control" name="txt_heso_luong" class="form-control" type="text" value="{!!$data->heso_luong!!}">
                        @error('txt_heso_luong')
                        <span class="text-danger">{{$message}}</span>
                       @enderror    
                    </div>
                 
</div>




<div class="mt-3 text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{{URL::previous()}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>


</div>
</div>  
</div>
    @endsection