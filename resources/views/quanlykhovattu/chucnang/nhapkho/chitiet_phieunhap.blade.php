@extends('layout.main')
@section('main_body')
@section('javascript')
<div class="card-header bg-danger">
  <div class="row">
                <div class="col-md-12" align="center">
                     <h1 class="btn text-light"> CHI TIẾT PHIẾU NHẬP KHO</h1>
                </div>
  
   </div>
</div>
</br>
<form action="{{ URL::route('capnhat_phieunhapkho',$data->id)}}" method="POST">
<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
<div class="row">
 <div class="col-6">
 <div class="form-group">   
  <label for="">Mã Số Phiếu:</label>             
    <input type="text" class="form-control bg-light text-danger font-weight-bold" id="txt_maphieu" name="txt_maphieu" value="{{$data->ma_phieu}}" placeholder="Nhập mã phiếu" readonly="readonly">
  </div>   
 </div>
 <div class="col-6">
  <label for="">Ngày lập phiếu:</label> 
 <input type="date" class="form-control" value="{{$data->ngaynhap}}" id="txt_ngaynhap" name="txt_ngaynhap" placeholder="Chọn ngày">
 </div>
</div>
<div class="row">
    <div class="col-6">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Vui lòng chọn Nhà Cung Cấp bên dưới:</label>
    <select class="form-control" id="txt_nhacc" name="txt_nhacc">
    <option>---Chọn----</option>
     @foreach($nhacc as $item)
     <option value="{{ $item->ma_nhacc}}"
      @if($data->id_nhacc==$item->ma_nhacc)
      selected
      @endif >{{ $item->ten_nhacc}}</option>
     @endforeach
    </select>
  </div>   
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Vui lòng chọn Thủ Kho</label>       
        <select class="form-control" name="txt_nhanvien" id="txt_nhanvien">         
          @foreach ($thukho as $item)
              <option value="{{$item->id_nhanvien}}"
                     @if($data->id_nhanvien==$item->id_nhanvien)
                  selected
                  @endif>{{$item->id_nhanvien}}</option>
          @endforeach
         </select>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Vui lòng chọn Kho Nhập Hàng:</label>
    <select class="form-control" id="txt_kho" name="txt_kho">
      <option>---Chọn----</option>
       @foreach($kho as $item)
       <option value="{{ $item->ma_kho}}"
        @if($data->id_kho==$item->ma_kho)
        selected
        @endif >{{ $item->ten_kho}}</option>
       @endforeach
      </select>
  </div>   
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Lý do nhập:</label>
        <select class="form-control" id="txt_lydo" name="txt_lydo">
          <option>---Chọn----</option>
           @foreach($lydo as $item)
           <option value="{{ $item->id}}"
            @if($data->id_lydo==$item->id)
            selected
            @endif >{{ $item->lydo}}</option>
           @endforeach
          </select>
      </div>  
    </div>
</div>
 

<!-- kết thúc xem xét kỷ luật  -->
<br>  
<div class="row">
  <div class="col-6">

  </div>
  <div class="col-6">
  <div class="card-header text-white">
                    <button id="submit-button" type="submit" class="btn btn-primary" id="luu_phieu" name="action" value="CONFIRM"><i class="fa fa-save">&nbsp;Cập Nhật Phiếu</i></button>
                    <a href="{{URL ::route('ds_phieunhap')}}" class=" btn btn-primary"><i class="fas fa-sign-out-alt">&nbsp;Danh Sách Phiếu Nhập</i></a> 
                   
                   
</div>
<script type="text/javascript">

   
    </script>
  </div>
  
</div>

</form>
<p class="text-danger font-weight-bold">Danh Sách Vật Tư</p>
<form action="" method="get" id="them_vattu">
        @csrf
<div class="row">
 <div class="col-3">
 <div class="form-group">          
 <select class="form-control" id="ma_vattu" name="ma_vattu">
    <option>---Chọn----</option>
     @foreach($vattu as $item)
     <option value="{{ $item->ma_vattu}}">{{ $item->ten_vattu}}</option>
     @endforeach
    </select>
  </div>   
 </div>
 <div class="col-3">
 <div class="form-group">          
 <select class="form-control" id="dvt_vattu" name="dvt_vattu">
    <option>---Chọn----</option>
     @foreach($dvt as $item)
     <option value="{{ $item->id}}">{{ $item->donvitinh}}</option>
     @endforeach
    </select>
 </div>
 </div>
 <div class="col-3">
    <input type="text" class="form-control" id="soluong" name="soluong" placeholder="Nhập số lượng">
 </div>
 <div class="col-3">
 <button class="btn btn-primary" id="submit" name="submit"  value="" ><i class="fas fa-feather">&nbsp;Thêm Vật Tư</i></button>
</div>

</form><!--Edit post Area -->
<!-- Logout Modal-->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn thoát?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Lựa chọn "Thoát" nếu bạn muốn kết thúc phiên làm việc.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy Bỏ</button>
            <a class="btn btn-primary" href="{{URL::route('thoat')}}">Thoát</a>
        </div>
    </div>
</div>
</div>
<!---kết thúc cảnh báo-->
<div class="modal fade" id="update_vattu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

  
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="update_vattu">Chỉnh Sửa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" id="cappnhat_vattu">
        @csrf
      <div class="modal-body">
             <input type="hidden" id="demo0">
             <label>Mã Vật Tư</label>
             <input type="text" id="demo1" name="phieu" class="form-control">
             <label>Tên Vật Tư</label>
             <input type="text" id="demo2" name="vattu" class="form-control">
             <label>Đơn Vị Tính</label>
             <input type="text" id="demo3" name="dvt" class="form-control">
             <label>Số Lượng</label>
             <input type="text" id="demo4" name="soluong" class="form-control">  
    </div>
      
      <div class="modal-footer">
        <!-- <input type="submit" class="btn btn-danger" id="myModal" value="Cập Nhật"> -->
        <!-- <button type="submit" class="btn btn-success" ><i class="glyphicon glyphicon-ok"></i> Save</button> -->
        <button class="btn btn-danger" id="capnhat_vattu" data-toggle="modal" data-target="#update_vattu" type="submit" name="submit"  value="" >Cập Nhật</button>
        <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">Đóng</button>
      </div>
      </form>
     
    </div>
    
  </div>
</div>
  <!--End Edit post Area -->
     
<script type="text/javascript">
   // load du lieu vao form
     load();
   function load()
              {
                $('#load').html('');
                var ma_phieu = $("input[name='txt_maphieu']").val();
                //alert('load được rồi');
                  $.ajax({
                       
                     
                       url:'{{URL::route('ajax_dsvattu','')}}'+'/'+ma_phieu,    
                       method:'GET',  
                       headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                  "Content-Type": "application/x-www-form-urlencoded",
                                                
                                                },                      
                       success:function(res)
                          {
                            console.log(res);
                            if(res.status==200)
                               {
                                
                               // alert("được rồi đó bạn");
                                 let posts=res.data;
                                // $('#status_token').html('');
                                // $('#logout_token').addClass('alert alert-danger');
                                $.each(posts,function(i,item)
                                   {
                                      
                                         $('#load').append(
                                        '<tr>\
                                         <td class="id" style="display:none">'+item.id+'</td>\
                                         <td style="text-align: center;" >'+item.id_vattu+'</td>\
                                         <td>'+item.ten_vattu+'</td>\
                                         <td style="text-align: center;" >'+item.dvt_vattu+'</td>\
                                         <td style="text-align: center;" >'+item.sl_vattu+'</td>\
                                         <td style="text-align: center;">\
                                         <button value="'+item.id+'" class="btn btn-xs edit_btn " data-toggle="modal" data-target="#update_vattu"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></button>\
                                         <button value="'+item.id+'" class="btn btn-xs  delete_btn "data-toggle="modal" ><i class="far fa-trash-alt" style="font-size:28px;color:red"></i></button></td>\
                                                                                  </tr>');                          
    
                                   }); 
                               }
                              //  else
                              //  {
                              //         alert("vui lòng kiểm tra lại kết nối");
                              //  }
                          }
                       });
              };
              //them vật tư
      $('#them_vattu').submit(function(e){
      e.preventDefault();      
      var ma_phieu = $("input[name='txt_maphieu']").val();
      var ma_vattu= $("#ma_vattu :selected").val();
    //  var ma_vattu= $("#ma_vattu :selected").text(); nếu muốn lên tên hiện thị
      var soluong = $("input[name='soluong']").val();
      var _token = $("input[name='_token']").val();
      console.log(soluong);
      console.log(ma_vattu);
     $.ajax({
              
              url:'{{URL::route('luu_vattu')}}',
              method:'POST',
              headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",
                                             
                                            }, 
              data: {_token:_token,ma_phieu:ma_phieu,ma_vattu:ma_vattu, soluong:soluong, },
              success:function(res)
              {
                if(res.status==true)
                 {
                  $('selected').val('');  
                  $("input[name='soluong']").val('');
                // $('#load').html('');
                  load();
                 }
                 else
                 {
                  alert('Kết nối lỗi!!!');
                 }

              }
           });
      });
       // sua vat tu
       $(document).on('click','.edit_btn',function(e){
        e.preventDefault();
        let id=$(this).val();                
        console.log(id);
              $.ajax({
                
                url:'{{URL::route('sua_vattu','')}}'+'/'+id,
                method:'GET',
                headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                "Content-Type": "application/x-www-form-urlencoded",
                                               
                                              }, 
                                              
                success:function(res)
                {
                  if(res.status==true)
                   {
                                                    console.table(res.data);
                                                    console.log(res.data.ten_vattu);
                                                        $('#demo0').val(res.data.id);
                                                        $('#demo1').val(res.data.ma_vattu);
                                                        $('#demo2').val(res.data.ten_vattu);
                                                        $('#demo3').val(res.data.dvt_vattu);                                       
                                                        $('#demo4').val(res.data.sl_vattu);                                                
                                                        $('#update_vattu').modal('show');  
                   
                    //load();
                   }
                   else
                   {
                    alert('Kết nối lỗi!!!');
                   }
       
                }
             });
            });
             //capnhat_vattu
     $('#cappnhat_vattu').submit(function(e){
      e.preventDefault();
      var ma_phieu = $("input[name='txt_maphieu']").val();
      let id=$('#demo0').val(); 
      console.log(ma_phieu); 
      $.ajax({
             
              url:'{{URL::route('capnhat_vattu','')}}'+'/'+id,
              method:'POST',
              headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",
                                             
                                            }, 
                                            data:{
                                                        _token:'{{ csrf_token() }}',				
				                                                 ma_phieu: ma_phieu,
			                                                   ma_vattu:$('#demo1').val(),
		                                             	       //dvt: $('#demo3').val(),
				                                                soluong: $('#demo4').val(),
                                                   
			                                        },
              success:function(res)
              {
                if(res.status==true)
                 {
                 // $('input[type="text"],textarea').val('');  
                 $('#load').html('');
                 load();
                 $('#update_vattu').modal('hide'); 
                
                
                 }
                 else
                 {
                  alert('Kết nối lỗi!!!');
                 }

              }
           });  
     });
     //xoa vật tư
   
    
         
     $(document).on('click','.delete_btn',function(){
 
      let id=$(this).val();                
      console.log(id);
            $.ajax({
              
              url:'{{URL::route('xoa_vattu','')}}'+'/'+id,
              method:'GET',
              headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",
                                             
                                            }, 
             
              success:function(res)
              {
                if(res.status==true)
                 {
                 // $('input[type="text"],textarea').val('');  
                  $('#load').html('');
                  load();
                 }
                 else
                 {
                  alert('Kết nối lỗi!!!');
                 }

              }
           });
          });
    </script>
<div id="alert_form"></div>
               <table id="table" class="table table-bordered" >
               <thread>   
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Vật Tư</th>           
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Tên Vật Tư</th>                      
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Đơn Vị Tính</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Số Lượng </th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Tùy Chỉnh </th> 
                                      
             </thread>
             
              <tbody id="load"></tbody>
               </table>
          
          <div>
  </div>  

    </div>
 
@endsection