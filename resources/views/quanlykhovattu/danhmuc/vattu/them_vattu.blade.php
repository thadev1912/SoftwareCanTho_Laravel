@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger ">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white"> THÊM MỚI VẬT TƯ</h1>
                                  </div>
                    
                     </div>
</div>
<div class="card-body">
            <form action="{{URL::route('luu_vattukho')}}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Mã Vật Tư</label>
                        <input id="current-pass-control" name="txt_ma_vattu" class="form-control" type="text" value="{!! old('txt_ma_vattu') !!}">
                        @error('txt_ma_vattu')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                   <div class="col">
                        <label>Tên Vật Tư</label>
                        <input id="new-pass-control" name="txt_ten_vattu" class="form-control" type="text" value="{!! old('txt_ten_vattu') !!}">
                        @error('txt_ten_vattu')
                        <span class="text-danger">{{$message}}</span>
                        @enderror        
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
         <label>Đơn Vị Tính</label>
         <input id="new-pass-control" name="txt_dvt_vattu" class="form-control" type="text" value="{!! old('txt_dvt_vattu') !!}">
         @error('txt_dvt_vattu')
         <span class="text-danger">{{$message}}</span>
         @enderror        
     </div>
</div>





<div class="text-white mt-2">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{{URL:: route('vattukho')}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>
</div>
</div>

 
    @endsection