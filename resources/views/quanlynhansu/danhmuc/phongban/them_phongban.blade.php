@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger ">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white"> THÊM PHÒNG BAN</h1>
                                  </div>
                    
                     </div>
</div>
<div class="card-body">
            <form action="{!! URL::route('luu_pb')!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Mã Số Phòng Ban</label>
                        <input id="current-pass-control" name="txt_ma_pb" class="form-control" type="text" value="">
                        @error('txt_ma_pb')
                        <span class="text-danger">{{$message}}</span>
                        @enderror   
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                   <div class="col">
                        <label>Tên Phòng Ban</label>
                        <input id="new-pass-control" name="txt_ten_pb" class="form-control" type="text" value="">
                        @error('txt_ten_pb')
                        <span class="text-danger">{{$message}}</span>
                        @enderror        
                    </div>
</div>





<div class="text-white mt-2">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{{URL:: route('phongban')}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>
</div>
</div>

 
    @endsection