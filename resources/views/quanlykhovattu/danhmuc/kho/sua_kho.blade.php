@extends('layout.main')
@section('main_body')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="card">
<div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white"> THÊM MỚI KHO VẬT TƯ</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">
                     @if($errors->any())
                <div class="alert alert-danger text-center">
                    Vui lòng kiểm tra lại!!!
                </div>
                @endif
            <form action="{!! URL::route('capnhat_kho',$kho->id)!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Mã Kho</label>
                        <input id="txt_ma_kho" name="txt_ma_kho" class="form-control" type="text" value="{{$kho->ma_kho}}">
                           @error('txt_ma_kho')
                             <span class='text-danger'> {{$message}}  </span>
                           @enderror  
                    </div>
                    <div class="col">
                        <label>Tên Kho</label>
                        <input id="txt_ten_kho" name="txt_ten_kho" class="form-control" type="text" value="{{$kho->ten_kho}}">
                                @error('txt_ten_kho')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                    </div>       
</div>

<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>Địa Chỉ</label>
                        <input id="new-pass-control" name="txt_dia_chi" class="form-control" type="text" value="{{$kho->dia_chi}}">
                                @error('txt_dia_chi')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                    </div>                  
<div class="col">
                        <label>Số Điện Thoại</label>
                        <input id="current-pass-control" name="txt_so_dien_thoai" class="form-control" type="text" value="{{$kho->so_dien_thoai}}">
                               @error('txt_so_dien_thoai')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                    </div>
                 
</div>

<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
    <div class="col">
                            <label>Ghi Chú</label>
                            <input id="new-pass-control" name="txt_ghi_chu" class="form-control" type="text" value="{{$kho->ghi_chu}}">
                                    @error('txt_ghi_chu')
                                      <span class="text-danger">{{$message}}</span>
                                      @enderror
                        </div>                  
   
                     
    </div>


<div class="mt-3 text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{{URL:: previous()}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>
</form>
</div>
</div>
<script>

$('#txt_ma_nv').keyup(function(e){
           var ajax = $(this).val();
           //alert(ajax);
            $.ajax({
               headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },                   
               type:'POST',
               url: "{{route('ajax')}}", // có thể gọi bằng route ư
               data:{'ajax':ajax},
               dataType:'json', // cái này quan trọng
               success : function(data)
            {
              $('#txt_hoten_nv').val(data.hoten_nv); 
            },
          
               
            error: function(response) {
            alert(response.responseJSON.message);
        }
            });
   
   
   
   });
</script>

    @endsection