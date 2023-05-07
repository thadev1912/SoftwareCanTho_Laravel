@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger text-center">
  <div class="row">
                <div class="col-12 text-center">
                     <h1 class="btn text-light"> THÊM THÔNG TIN NHÂN VIÊN</h1>
                </div>
  
   </div>
</div>
<br>
<div class="card-body">
                     @if($errors->any())
                <div class="alert alert-danger text-center">
                    Vui lòng kiểm tra lại!!!
                </div>
                @endif
            <form action="{!! URL::route('luu_nv')!!}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
            <div class="col-lg-3">
                       
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
              <img id="img-preview"  src="{{ asset('/anhdaidien/avatar.png')}}" class="mx-auto rounded" style="width:150px;height:150px; margin-right:100px;" alt="avatar" />   
                      <div>
                          {!! $errors->first('txtpban') !!}
                      </div>
          </div>                 
          <div class="col">
            <label>Mã Số Nhân Viên</label>
            <input id="current-pass-control" name="txt_ma_nv" class="form-control" type="text" value="{!! old('txt_ma_nv') !!}" placeholder="Gợi ý: MFNV........">
               @error('txt_ma_nv')
                 <span class='text-danger'> {{$message}}  </span>
               @enderror  
              <br>
               <label>Chức Vụ</label>
               {{-- <input id="current-pass-control" name="txt_ma_cv" class="form-control" type="text" value="{!! old('txt_ma_cv') !!}"> --}}
               <select class="form-control"name="txt_ma_cv" id="txt_ma_cv">
                <option value="">---Vui lòng Chọn Chức Vụ---</option>
                   @foreach ($chucvu as $cv )
                       <option value="{{$cv->ma_cv}}"{{old('txt_ma_cv') == $cv->ma_cv ? "selected" :""}}>{{$cv->ten_cv}}</option>
                   @endforeach
               </select>
                      @error('txt_ma_cv')
                       <span class="text-danger">{{$message}}</span>
                       @enderror

          </div>
          <div class="col">
            <label>Họ và Tên Nhân Viên</label>
            <input id="new-pass-control" name="txt_hoten_nv" class="form-control" type="text" value="{!! old('txt_hoten_nv') !!}">
            @error('txt_hoten_nv')
                 <span class='text-danger'> {{$message}} </span>
               @enderror 
                <br> 
               <label>Phòng Ban</label>
               {{-- <input id="new-pass-control" name="txt_ma_pb" class="form-control" type="text" value="{!! old('txt_ma_pb') !!}"> --}}
               <select class="form-control"name="txt_ma_pb" id="txt_ma_pb">
                <option value="">--Vui lòng Chọn Phòng Ban---</option>
                   @foreach ($phongban as $pb )
                       <option value="{{$pb->ma_pb}}"{{old('txt_ma_pb') == $pb->ma_pb ? "selected" :""}}>{{$pb->ten_pb}}</option>
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
    <input id="current-pass-control" name="txt_ngaysinh_nv" class="form-control" type="date" value="{!! old('txt_ngaysinh_nv') !!}">
           @error('txt_ngaysinh_nv')
             <span class="text-danger">{{$message}}</span>
           @enderror
</div>               
<div class="col">
                        <label>Giới Tính</label>
                        {{-- <input id="current-pass-control" name="txt_gioitinh_nv" class="form-control" type="text" value="{!! old('txt_gioitinh_nv') !!}"> --}}
                        <select class="form-control" name="txt_gioitinh_nv" id="txt_gioitinh_nv">
                          <option value="">---Vui lòng chọn Giới Tính---</option>
                          @foreach ($gioitinh as $gt)                         
                              <option value="{{$gt->gioitinh_nv}}" {{old('txt_gioitinh_nv') == $gt->gioitinh_nv ? "selected" :""}}>{{$gt->gioitinh_nv}}</option>                        
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
                          {{-- <input id="new-pass-control" name="txt_trinhdo_nv" class="form-control" type="text" value="{!! old('txt_trinhdo_nv') !!}"> --}}
                          <select class="form-control" name="txt_trinhdo_nv" id="txt_trinhdo_nv">
                            <option value="">---Vui lòng chọn Trình độ---</option>
                            @foreach ($trinhdo as $td)
                                <option value="{{$td->trinhdo_nv}}"{{old('txt_trinhdo_nv') == $td->trinhdo_nv ? "selected" :""}}>{{$td->trinhdo_nv}}</option>
                            @endforeach
                          </select>
                                  @error('txt_trinhdo_nv')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                      </div>                  
  <div class="col">
                          <label>Chuyên Ngành</label>
                          <input id="current-pass-control" name="txt_chuyennganh_nv" class="form-control" type="text" value="{!! old('txt_chuyennganh_nv') !!}">
                                 @error('txt_chuyennganh_nv')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                      </div>
                   
  </div>
  <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
      <label>Điện Thoại</label>
      <input id="new-pass-control" name="txt_sdt_nv" class="form-control" type="text" value="{!! old('txt_sdt_nv') !!}">
              @error('txt_sdt_nv')
                <span class="text-danger">{{$message}}</span>
                @enderror
  </div>    
    <div class="col">
      <label>Căn Cước Công Dân/CMND</label>
      <input id="current-pass-control" name="txt_cccd_nv" class="form-control" type="text" value="{!! old('txt_cccd_nv') !!}">
             @error('txt_cccd_nv')
               <span class="text-danger">{{$message}}</span>
             @enderror
  </div>
  </div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Quê Quán</label>
                        <input id="current-pass-control" name="txt_diachi_nv" class="form-control" type="text" value="{!! old('txt_diachi_nv') !!}">
                               @error('txt_diachi_nv')
                                 <span class="text-danger">{{$message}}</span>
                               @enderror
                    </div>
                    <div class="col">
                      <label>Tình Trạng Hôn Nhân</label>
                      {{-- <input id="current-pass-control" name="txt_trangthai_nv" class="form-control" type="text" value="{!! old('txt_trangthai_nv') !!}"> --}}
                      <select class="form-control" name="txt_trangthai_nv" id="txt_trangthai_nv">
                        <option value="">---Vui lòng chọn Tình Trạng</option>
                        @foreach ($trangthai as $tt)
                            <option value="{{$tt->trangthai_nv}}"{{old('txt_trangthai_nv') == $tt->trangthai_nv ? "selected" :""}}>{{$tt->trangthai_nv}}</option>
                        @endforeach
                      </select>
                             @error('txt_trangthai_nv')
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
                         
                  </div>
                
                </div>
                   
</div>


<div class="card-header text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{{URL:: route('nhanvien')}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>
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
    @endsection