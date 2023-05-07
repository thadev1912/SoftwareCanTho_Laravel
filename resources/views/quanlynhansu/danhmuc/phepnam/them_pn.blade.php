@extends('layout.main')
@section('main_body')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="card">
<div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-white"> THÊM THÔNG TIN PHÉP NĂM</h1>
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
            <form action="{!! URL::route('luu_pn')!!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
                    <div class="col">
                        <label>Mã Số Nhân Viên</label>
                        {{-- <input id="txt_ma_nv" name="txt_ma_nv" class="form-control" type="text" value="{!! old('txt_ma_nv') !!}"> --}}
                        <select class="form-control" name="txt_ma_nv" id="txt_ma_nv">
                          <option value="">---Vui lòng chọn nhân viên mới---</option>
                          @foreach ($select_nv as $item)
                              <option value="{{$item->ma_nv}}" {{old('txt_ma_nv') == $item->ma_nv ? "selected" :""}}>{{$item->hoten_nv}}</option>
                          @endforeach
                         </select>
                           @error('txt_ma_nv')
                             <span class='text-danger'> {{$message}}  </span>
                           @enderror  
                    </div>
                    <div class="col">
                        <label>Họ và Tên Nhân Viên</label>
                        <input id="txt_hoten_nv" name="txt_hoten_nv" class="form-control" type="text" value="{!! old('txt_hoten_nv') !!}" readonly>
                                @error('txt_hoten_nv')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                    </div>       
</div>

<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col">
                        <label>NGÀY BẮT ĐẦU</label>
                        <input id="txt_ngay_batdau" name="txt_ngay_batdau" class="form-control" type="date" value="{!! old('txt_ngay_batdau') !!}" readonly>
                                @error('txt_ngay_batdau')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                    </div>                  
<div class="col">
                        <label>NGÀY NGHỈ VIỆC</label>
                        <input id="txt_ngay_ketthuc" name="txt_ngay_ketthuc" class="form-control" type="text" value="{!! old('txt_ngay_ketthuc') !!} " placeholder="Đang cập nhật" readonly>
                               @error('txt_ngay_ketthuc')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                    </div>
                  </div>
                    <div class="form-row">                 
                    <div class="col">
                      <label>CẬP NHẬT PHÉP NĂM TRONG THÁNG</label>
                      <input id="txt_phepnam_dadung" name="txt_phepnam_dadung" class="form-control" type="number" value="{!! old('txt_phepnam_dadung') !!}" placeholder="Nhập số phép năm nhân viên....">
                             @error('txt_phepnam_dadung')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                    </div>  
                    </div>          





<div class="mt-3 text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="fa fa-save"></i>&nbsp&nbspLưu Lại&nbsp&nbsp</button>
                    <a href="{{URL:: route('phepnam')}}" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp&nbspQuay lại&nbsp&nbsp</a>
</div>
</div>
</form>
</div>
</div>
<script>

$('#txt_ma_nv').change(function(e){
           //var ajax = $(this).val();
           var get_nv= $("#txt_ma_nv :selected").val();
           //alert(ajax);
            $.ajax({
               headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },                   
               type:'POST',
               url: "{{route('ajax')}}", // có thể gọi bằng route ư
               data:{'get_nv':get_nv},
               dataType:'json', // cái này quan trọng
               success : function(data)
            {
              console.table(data);
              $('#txt_hoten_nv').val(data.hoten_nv); 
              $('#txt_ngay_batdau').val(data.ngayvao);               
              $('#txt_ngay_ketthuc').val(data.ngay_nghiviec);
              
            },
          
               
            error: function(response) {
            //alert(response.responseJSON.message);
        }
            });
   
   
   
   });
</script>

    @endsection