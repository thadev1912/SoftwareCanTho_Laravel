@extends('layout.main')
@section('main_body')    
<div class="card">
         <div class="card-header bg-danger text-white">
              <div class="row">
                            <div class="col-md-12" align="center">
                                 <h1 class="btn"> THÊM BÀI VIẾT MỚI</h1>
                            </div>
                           
              
               </div>
</div>

<div class="card-body">
      <form action="{{URL::route('luu_tintuc')}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
              <div class="col">
                  <label>Tiêu đề tin tức</label>
                  <input id="current-pass-control" name="txt_tieude_tintuc" class="form-control" type="text" value="{!! old('tieude_tintuc') !!}">
                  @error('txt_tieude_tintuc')
                  <span class='text-danger'> {{$message}}  </span>
                @enderror  
              </div>
         
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
        <label>Danh mục tin tức</label>
        {{-- <input id="current-pass-control" name="txt_danhmuc_tintuc" class="form-control" type="text" value="{!! old('txtmakh') !!}"> --}}
     <select class="form-control"name="txt_danhmuc_tintuc" id="txt_danhmuc_tintuc">
        <option value="">----Chọn Danh Mục Tin Tức----</option>
  <option value="Tin Tức Thị Trường">Tin Tức Thị Trường</option>
  <option value="Văn Hóa Đất Xanh">Văn Hóa Đất Xanh</option>
  
</select>
@error('txt_danhmuc_tintuc')
<span class='text-danger'> {{$message}}  </span>
@enderror 
    </div>

</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
             <div class="col">
                  <label>Nội dung tin tức</label>
                  <textarea id="editor" name="txt_noidung_tintuc" class="form-control" type="text" value="">{!! old('txt_noidung_tintuc') !!}</textarea>
                  @error('txt_noidung_tintuc')
                  <span class='text-danger'> {{$message}}  </span>
                @enderror 
                 <script>
           CKEDITOR.replace("editor",{
              width: ['100%'], height: ['500px'],
  filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
  filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
  filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
  filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
  filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
  filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
} );/*đây là chỉnh chiều dài ckeditor*/
 </script>                        
              </div>
</div>

<div class="form-row"> 
             <div class="col">
                  <label>Ảnh Hiện Thị Cho Bài Viết</label>
                  <div class="khungchenanh">
<div class="preview ">
          <img id="img-preview"  src="{{ asset('/images/blank_avatar.png')}}" style="width:500px;height:400px"/>
              <br>
               <input accept="image/*" type='file' id="file-input" name ="txt_anhdaidien_tintuc"/>
                          <div>
                               {!! $errors->first('txt_anhdaidien_tintuc') !!}
                          </div>
             
</div>
<div>

                          


<div class="text-white mt-2">
              <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
              <a href="{{URL:: route('quanly_tintuc')}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay Lại&nbsp&nbsp</a>
</div>
</div>
                  </div>
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
<link rel="stylesheet" href="{{ asset('/ckeditor/ckeditor.js') }}">

@endsection