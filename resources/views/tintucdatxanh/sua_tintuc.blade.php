@extends('layout.main')
@section('main_body')

    <div class ="card">
         <div class="card-header bg-danger text-white">
              <div class="row">
                            <div class="col-md-12" align="center">
                                 <h1 class="btn"> SỬA BÀI VIẾT MỚI</h1>
                            </div>
                           
              
               </div>
</div>
<div class="card-body">

      <form action="{{URL::route('capnhat_tintuc',$data->id)}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
              <div class="col">
                  <label>Tiêu đề tin tức</label>
                  <input id="current-pass-control" name="txt_tieude_tintuc" class="form-control" type="text" value="{{$data->tieude_tintuc}}">
                  @error('txt_tieude_tintuc')
                  <span class='text-danger'> {{$message}}  </span>
                @enderror 
              </div>
         
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
        <label>Danh mục tin tức</label>
        <select class="form-control" id="txt_danhmuc_tintuc" name="txt_danhmuc_tintuc">          
           @foreach($danhmuc as $item)
           <option value="{{ $item->danhmuc_tintuc}}"
            @if($data->danhmuc_tintuc==$item->danhmuc_tintuc)
            selected
            @endif >{{ $item->danhmuc_tintuc}}</option>
           @endforeach
          </select>
          @error('txt_danhmuc_tintuc')
          <span class='text-danger'> {{$message}}  </span>
        @enderror
    </div>

</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
             <div class="col">
                  <label>Nội dung tin tức</label>
                  <textarea id="editor" name="txt_noidung_tintuc" class="form-control" type="text" value="{!!$data->noidung_tintuc!!}"></textarea>
                  @error('txt_noidung_tintuc')
                  <span class='text-danger'> {{$message}}  </span>
                @enderror
                 <script>
           CKEDITOR.replace("editor",{
              width: ['100%'], height: ['1500px'],
  filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
  filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
  filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
  filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
  filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
  filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
} );/*đây là chỉnh chiều dài ckeditor*/
         </script>
                         
              </div>
</div>

<div class="form-row"> 
             <div class="col">
                  <label>Ảnh Hiện Thị Cho Bài Viết</label>
                  <div class="khungchenanh">
<div class="preview ">
          <img id="img-preview"  src="{{asset('images/'.$data->anhdaidien_tintuc)}}" nam="hinh" style="width:500px;height:400px"/>
          <br>
               <input accept="image/*" type='file' id="file-input"  name ="hinh" />
                          <div>
                               {!! $errors->first('txt_anhdaidien_tintuc') !!}                          </div>
                          <input type="hidden" name="txt_anhdaidien_tintuc" value="{{$data->anhdaidien_tintuc}}" />                  
             
</div>
<div>
         
                          
              </div>
</div>


<div class=" text-white mt-2">
              <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
              <a href="{{URL:: previous()}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay Lại&nbsp&nbsp</a>
</div>


</div>
</div>
</div>
    </div>
<link rel="stylesheet" href="{{ asset('/ckeditor/ckeditor.js') }}">
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