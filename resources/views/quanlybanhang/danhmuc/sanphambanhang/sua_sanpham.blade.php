@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger ">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white">CHỈNH SỬA THÔNG TIN SẢN PHẨM</h1>
                                  </div>
                    
                     </div>
</div>
<div class="card-body">
            <form action="{{URL::route('capnhat_sanpham',$sanpham->id)}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
              <div class="col">
                  <label>Tên Sản Phẩm</label>
                  <input id="current-pass-control" name="txt_name" class="form-control" type="text" value="{{$sanpham->name}}">
                  @error('txt_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror   
              </div>
              <div class="col">
                  <label>Giá Sản Phẩm</label>
                  <input id="new-pass-control" name="txt_price" class="form-control" type="text" value="{{$sanpham->price}}">
                  @error('txt_price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror   
              </div>
      </div>

<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
   <label>Danh Mục Sản Phẩm</label>
   {{-- <input id="new-pass-control" name="txt_danhmuc" class="form-control" type="text" value="{{$sanpham->danhmuc}}"> --}}
   <select class="form-control" id="txt_danhmuc" name="txt_danhmuc">
    <option>---Chọn----</option>
     @foreach($danhmuc as $item)
     <option value="{{ $item->danhmuc}}"
      @if($sanpham->danhmuc==$item->danhmuc)
      selected
      @endif >{{ $item->danhmuc}}</option>
     @endforeach
    </select>
   @error('txt_danhmuc')
   <span class="text-danger">{{$message}}</span>
   @enderror        
</div>
<div class="col">
  <label>Sản Phẩm Hot_Sales</label>
  {{-- <input id="new-pass-control" name="txt_hot_sales" class="form-control" type="text" value="{{$sanpham->hot_sales}}"> --}}
  <div class="mt-1">
    <input type='radio' name="txt_hot_sales"  value="1" {{($hot->hot_sales =="1")? "checked" : "" }} />&nbsp;Bán Chạy
    <input type='radio' name="txt_hot_sales" value="0" {{($hot->hot_sales  =="0")? "checked" : "" }}/>&nbsp; Đang cập nhật
</div>
  @error('txt_hot_sales')
  <span class="text-danger">{{$message}}</span>
  @enderror        
</div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
  <div class="col">
      <label>Nội Dung Sản Phẩm</label>
      <textarea id="current-pass-control" name="txt_noidung_sp" class="form-control" type="text" value="">{{$sanpham->noidung_sp}}</textarea>
      @error('txt_noidung_sp')
      <span class="text-danger">{{$message}}</span>
      @enderror   
  </div>
  
</div>
<div class="form-row mt-3"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
        <img id="img-preview"  src="{{ asset('cart/img/products/'.$sanpham->image)}}" class="mx-auto rounded" style="width:700px;height:400px; margin-right:100px;" alt="avatar" /><br>
         <label>Hình Ảnh Sản Phẩm </label>
         <input accept="image/*" type="file" id="file-input" class="form-control-file" name="image" />
         <input type="hidden" name="txt_image" value="{{$sanpham->image}}" />     
         @error('txt_diachi_nhacc')
         <span class="text-danger">{{$message}}</span>
         @enderror        
     </div>
</div>

<br>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col-3">
        <img id="img-preview1"  src="{{ asset('cart/img/products/'.$sanpham->chitiet_image1)}}" class="mx-auto rounded" style="width:330px;height:150px; margin-right:100px;" alt="avatar" /><br>
         <label>Hình Ảnh Chi Tiết 1</label>
         <input accept="image/*" type="file" id="file-input1" class="form-control-file" name="txt_image1" />
         <input type="hidden" name="txt_chitiet_image1" value="{{$sanpham->chitiet_image1}}" />   
         @error('txt_diachi_nhacc')
         <span class="text-danger">{{$message}}</span>
         @enderror        
     </div>
     <div class="col-3">
        <img id="img-preview2"  src="{{ asset('cart/img/products/'.$sanpham->chitiet_image2)}}" class="mx-auto rounded" style="width:330px;height:150px; margin-right:100px;" alt="avatar" /><br>
        <label>Hình Ảnh Chi Tiết 2</label>
        <input accept="image/*" type="file" id="file-input2" class="form-control-file" name="txt_image2" />
        <input type="hidden" name="txt_chitiet_image2" value="{{$sanpham->chitiet_image2}}" /> 
        @error('txt_diachi_nhacc')
        <span class="text-danger">{{$message}}</span>
        @enderror        
    </div>
    <div class="col-3">
        <img id="img-preview3"  src="{{ asset('cart/img/products/'.$sanpham->chitiet_image3)}}" class="mx-auto rounded" style="width:330px;height:150px; margin-right:100px;" alt="avatar" /><br>
        <label>Hình Ảnh Chi Tiết 3</label>
        <input accept="image/*" type="file" id="file-input3" class="form-control-file" name="txt_image3" />
        <input type="hidden" name="txt_chitiet_image3" value="{{$sanpham->chitiet_image3}}" /> 
        @error('txt_diachi_nhacc')
        <span class="text-danger">{{$message}}</span>
        @enderror        
    </div>
    <div class="col-3">
        <img id="img-preview4"  src="{{ asset('cart/img/products/'.$sanpham->chitiet_image4)}}" class="mx-auto rounded" style="width:330px;height:150px; margin-right:100px;" alt="avatar" /><br>
        <label>Hình Ảnh Chi Tiết 3</label>
        <input accept="image/*" type="file" id="file-input4" class="form-control-file" name="txt_image4" />
        <input type="hidden" name="txt_chitiet_image4" value="{{$sanpham->chitiet_image4}}" /> 
        @error('txt_diachi_nhacc')
        <span class="text-danger">{{$message}}</span>
        @enderror        
    </div>
</div>





<div class="text-white mt-3">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{{URL:: previous()}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>
</div>
</div>
<script>
     // load chi tiết ảnh chính
     const input = document.getElementById("file-input");
    const image = document.getElementById("img-preview");
  
  input.addEventListener("change", (e) => {
  if (e.target.files.length) {
    const src = URL.createObjectURL(e.target.files[0]);
    image.src = src;
  }                                    
  }); 
    // load chi tiết ảnh 1
    const input1 = document.getElementById("file-input1");
    const image1 = document.getElementById("img-preview1");
  
  input1.addEventListener("change", (e) => {
  if (e.target.files.length) {
    const src = URL.createObjectURL(e.target.files[0]);
    image1.src = src;
  }                                    
  });  
  
     // load chi tiết ảnh 2
     const input2 = document.getElementById("file-input2");
    const image2 = document.getElementById("img-preview2");
  
  input2.addEventListener("change", (e) => {
  if (e.target.files.length) {
    const src = URL.createObjectURL(e.target.files[0]);
    image2.src = src;
  }                                    
  });   
     // load chi tiết ảnh 3
     const input3 = document.getElementById("file-input3");
    const image3 = document.getElementById("img-preview3");
  
  input3.addEventListener("change", (e) => {
  if (e.target.files.length) {
    const src = URL.createObjectURL(e.target.files[0]);
    image3.src = src;
  }                                    
  });  
     // load chi tiết ảnh 4
     const input4 = document.getElementById("file-input4");
    const image4 = document.getElementById("img-preview4");
  
  input4.addEventListener("change", (e) => {
  if (e.target.files.length) {
    const src = URL.createObjectURL(e.target.files[0]);
    image4.src = src;
  }                                    
  });  
  </script>
 
    @endsection