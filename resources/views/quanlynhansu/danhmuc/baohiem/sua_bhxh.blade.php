@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger ">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white"> CHỈNH SỬA THÔNG TIN BẢO HIỂM XÃ HỘI</h1>
                                  </div>
                    
                     </div>
</div>
<br>
<div class="card-body">
            <form action="{!! URL::route('capnhat_bhxh',$data->id)!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>MÃ BẢO HIỂM XÃ HỘI</label>
                        <input id="current-pass-control" name="txt_ma_bhxh" class="form-control" type="text" value="{!! $data->ma_bhxh !!}">
                        @error('txt_ma_bhxh')
                        <span class="text-danger">{{$message}}</span>
                       @enderror    
                    </div>
                   <div class="col">
                        <label>MÃ NHÂN VIÊN</label>
                        {{-- <input id="new-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!! $data->ma_nv !!}"> --}}
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
                        <label>NGÀY CẤP</label>
                        <input id="new-pass-control" name="txt_ngaycap" class="form-control" type="date" value="{!! $data->ngaycap !!}">
                        @error('txt_ngaycap')
                        <span class="text-danger">{{$message}}</span>
                       @enderror         
                    </div>                  
<div class="col">
                        <label>NGÀY HẾT HẠN</label>
                        <input id="current-pass-control" name="txt_ngayhethan" class="form-control" type="date" value="{!! $data->ngayhethan !!}">
                        @error('txt_ngayhethan')
                        <span class="text-danger">{{$message}}</span>
                       @enderror           
                    </div>
                 
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>LOẠI BHXH</label>
                        {{-- <input id="current-pass-control" name="txt_loai_bhxh" class="form-control" type="text" value="{!! $data->loai_bhxh !!}"> --}}
                        <select class="form-control" name="txt_loai_bhxh" id="txt_loai_bhxh">                          
                            @foreach ($loaibhxh as $item)
                                <option value="{{$item->loai_bhxh}}"
                                    @if($data->loai_bhxh==$item->loai_bhxh)
                                    selected
                                    @endif 
                                    >{{$item->loai_bhxh}}</option>
                            @endforeach
                           </select>     
                           @error('txt_loai_bhxh')
                           <span class="text-danger">{{$message}}</span>
                          @enderror        
                    </div>
                 
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>NƠI CẤP</label>
                        <select class="form-control" name="txt_noicap" id="txt_noicap">                          
                            @foreach ($noicap as $item)
                                <option value="{{$item->noicap}}"
                                       @if($data->noicap==$item->noicap)
                                    selected
                                    @endif>{{$item->noicap}}</option>
                            @endforeach
                           </select>
                        @error('txt_noicap')
                        <span class="text-danger">{{$message}}</span>
                       @enderror         
                    </div>
                    <div class="col">
                        <label>NƠI KHÁM CHỮA BỆNH</label>
                        <select class="form-control" name="txt_noikham" id="txt_noikham">
                                                       @foreach ($noikham as $item)
                                <option value="{{$item->noikham}}"
                                    @if($data->noikham==$item->noikham)
                                    selected
                                    @endif>{{$item->noikham}}</option>
                            @endforeach
                           </select>
                        @error('txt_noikham')
                             <span class="text-danger">{{$message}}</span>
                            @enderror       
                    </div>
</div>



<div class="mt-3 text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{!! URL::previous()!!}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>


</div>
</div>
</div>
  
    @endsection