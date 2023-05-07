@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger text-center">
  <div class="row">
                <div class="col-12 text-center">
                     <h1 class="btn text-light"> SỬA THÔNG TIN NHÂN VIÊN</h1>
                </div>
  
   </div>
</div>
<br>
<div class="card-body">
            <form action="{!! route('capnhat_nv',$data->id) !!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                <div class="col-lg-3">
                           
                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                          <img id="img-preview" src="{{ asset ('anhdaidien/'.$data->anhdaidien) }}"  name="hinh" class="mx-auto rounded" style="width:150px;height:150px; margin-right:200px;" alt="avatar" />           
                  {{-- <img id="img-preview"  src="{{ asset('/images/avatar.png')}}" alt="Avatar" class="avatar rounded-circle img-thumbnail ml-5 mt-2"/>    --}}
                          <div>
                              {!! $errors->first('txtpban') !!}
                          </div>
              </div>                 
              <div class="col">
                <label>Mã Số Nhân Viên</label>
                <input id="current-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!!$data->ma_nv !!}">
                   @error('txt_ma_nv')
                     <span class='text-danger'> {{$message}}  </span>
                   @enderror  
                   <br>
                       <label>Chức Vụ</label>
                   <select class="form-control"name="txt_ma_cv" id="txt_ma_cv">                   
                <option value="">---Vui lòng Chọn Chức Vụ---</option>
                   @foreach ($chucvu as $item )
                       <option value="{{ $item->ma_cv }}"
                         @if($data->ma_cv==$item->ma_cv)
                        selected
                        @endif >{{$item->ten_cv}}</option>
                   @endforeach
               </select>                           
                          @error('txt_ma_cv')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
    
              </div>
              <div class="col">
                <label>Họ và Tên Nhân Viên</label>
                <input id="new-pass-control" name="txt_hoten_nv" class="form-control" type="text" value="{!! $data->hoten_nv !!}">
                @error('txt_hoten_nv')
                     <span class='text-danger'> {{$message}} </span>
                   @enderror 
                   <br> 
                   <label>Phòng Ban</label>
                   <select class="form-control"name="txt_ma_pb" id="txt_ma_pb">                   
                  
                   @foreach ($phongban as $item )
                   <option value="{{ $item->ma_pb }}"
                     @if($data->ma_pb==$item->ma_pb)
                    selected
                    @endif >{{$item->ten_pb}}</option>
               @endforeach
           </select>            
                           @error('txt_ma_pb')
                             <span class="text-danger">{{$message}}</span>
                             @enderror
              </div>
    
           
    
    </div>
    <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
      <div class="col">
        <label>Ngày Sinh</label>
        <input id="current-pass-control" name="txt_ngaysinh_nv" class="form-control" type="date" value="{!! $data->ngaysinh_nv !!}">
               @error('txt_ngaysinh_nv')
                 <span class="text-danger">{{$message}}</span>
               @enderror
    </div>              
      <div class="col">
                              <label>Giới Tính</label>
                              {{-- <input id="current-pass-control" name="txt_gioitinh_nv" class="form-control" type="text" value="{!! $data->gioitinh_nv !!}"> --}}
                              <select class="form-control"name="txt_gioitinh_nv" id="txt_gioitinh_nv">                   
                             
                               @foreach ($gioitinh as $item )
                               <option value="{{ $item->gioitinh_nv }}"
                                 @if($data->gioitinh_nv==$item->gioitinh_nv)
                                selected
                                @endif >{{$item->gioitinh_nv}}</option>
                           @endforeach
                       </select>            
                                     @error('txt_gioitinh_nv')
                                      <span class="text-danger">{{$message}}</span>
                                      @enderror
                          </div>
                       
      </div>         
    <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
      <div class="col">
                              <label>Trình Độ Học Vấn</label>
                              {{-- <input id="new-pass-control" name="txt_trinhdo_nv" class="form-control" type="text" value="{!! $data->trinhdo_nv !!}"> --}}
                              <select class="form-control"name="txt_trinhdo_nv" id="txt_trinhdo_nv">                  
                               
                               @foreach ($trinhdo as $item )
                               <option value="{{ $item->trinhdo_nv }}"
                                 @if($data->trinhdo_nv==$item->trinhdo_nv)
                                 selected
                                 @endif >{{$item->trinhdo_nv}}</option>                                
                                 @endforeach
                                </select>  
                                @error('txt_trinhdo_nv')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                          </div>                  
      <div class="col">
                              <label>Chuyên Ngành</label>
                              <select class="form-control"name="txt_chuyennganh_nv" id="txt_chuyennganh_nv">               
                               
                                @foreach ($chuyennganh as $item )
                                <option value="{{ $item->chuyennganh_nv }}"
                                  @if($data->chuyennganh_nv==$item->chuyennganh_nv)
                                  selected
                                  @endif >{{$item->chuyennganh_nv}}</option>                                
                                  @endforeach
                                 </select>  
                                     @error('txt_chuyennganh_nv')
                                      <span class="text-danger">{{$message}}</span>
                                      @enderror
                          </div>
                       
      </div>  
     
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Địa chỉ</label>
                        <input id="current-pass-control" name="txt_diachi_nv" class="form-control" type="text" value="{!! $data->diachi_nv !!}">
                        @error('txt_diachi_nv')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col">
                      <label>Tình Trạng Hôn Nhân</label>
                      <select class="form-control"name="txt_trangthai_nv" id="txt_trangthai_nv">               
                               
                        @foreach ($trangthai as $item )
                        <option value="{{ $item->trangthai_nv }}"
                          @if($data->trangthai_nv==$item->trangthai_nv)
                          selected
                          @endif >{{$item->trangthai_nv}}</option>                                
                          @endforeach
                         </select>  
                             @error('txt_trangthai_nv')
                               <span class="text-danger">{{$message}}</span>
                             @enderror
                  </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
  <div class="col">
    <label>Điện Thoại</label>
    <input id="new-pass-control" name="txt_sdt_nv" class="form-control" type="text" value="{!! $data->sdt_nv !!}">
            @error('txt_sdt_nv')
              <span class="text-danger">{{$message}}</span>
              @enderror
</div>    
  <div class="col">
    <label>Căn Cước Công Dân/CMND</label>
    <input id="current-pass-control" name="txt_cccd_nv" class="form-control" type="text" value="{!! $data->cccd_nv !!}">
           @error('txt_cccd_nv')
             <span class="text-danger">{{$message}}</span>
           @enderror
</div>
</div>
<div class="form-row">
    <div class="col">
      <label class="form-label" for="customFile">Vui lòng Chọn ảnh</label>
      <input accept="image/*" type="file" id="file-input" class="form-control-file" name="image" />
  </div>
 
    <div class="col">   
        <input type="hidden" name="hinhdaidien" value="{{$data->anhdaidien}}" />                   
      {{-- <img id="img-preview" src="/images/{{$data->anhdaidien}}"  name="hinh" alt="Avatar" class="avatar mt-3"/>            --}}
  </div>

</div>
<script>
    const input = document.getElementById("file-input");
    const image = document.getElementById("img-preview");
  
  input.addEventListener("change", (e) => {
  if (e.target.files.length) {
    const src = URL.createObjectURL(e.target.files[0]);
    image.src = src;
  }                                    
  });                  
  </script>
<div class=" text-white mt-2">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{!! URL::route('nhanvien')!!}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>        
</div>
</div>
   
    @endsection