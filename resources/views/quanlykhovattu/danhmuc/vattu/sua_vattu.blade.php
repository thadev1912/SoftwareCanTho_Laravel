@extends('layout.main')
@section('main_body')
<div class="card">
<div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white"> CHỈNH SỬA VẬT TƯ</h1>
                                  </div>
                    
                     </div>
</div>
<div class="card-body">
            <form action="{!! URL::route('capnhat_vattukho',$vattu->id)!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Mã Vật Tư</label>
                        <input id="current-pass-control" name="txt_ma_vattu" class="form-control" type="text" value="{!! $vattu->ma_vattu!!}">
                              
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                   <div class="col">
                        <label>Tên Vật Tư</label>
                        <input id="new-pass-control" name="txt_ten_vattu" class="form-control" type="text" value="{!! $vattu->ten_vattu!!}">
                                
                    </div>
</div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
         <label>Đơn Vị Tính</label>
         <input id="new-pass-control" name="txt_dvt_vattu" class="form-control" type="text" value="{!! $vattu->dvt_vattu!!}">
                 
     </div>
</div>








</div>

<div class="card-header text-white">
    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
    <a href="{{URL:: previous()}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>
</div>
    @endsection