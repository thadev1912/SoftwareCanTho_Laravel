@extends('layout.main')
@section('main_body')
@section('javascript')
<div class="card">
<div class="card-header bg-danger text-center ">
  <div class="row">
                <div class="col">
                     <h1 class="btn text-light"> PHIẾU XUẤT KHO </h1>
                </div>
  
   </div>
</div>                
<br>
<div class="card-body">
<form action="{{URL::route('them_phieuxuatkho')}}" method="POST">
<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
<div class="row">
 <div class="col-6">
 <div class="form-group">   
  <label for="">Mã Số Phiếu:</label>        
    <input type="text" class="form-control bg-light text-danger font-weight-bold" id="txt_maphieu" name="txt_maphieu" value="{{$invoice_number}}" placeholder="Nhập mã phiếu" readonly="readonly">
  </div>   
 </div>
 <div class="col-6">
  <label for="">Ngày Xuất Phiếu:</label>   
 <input type="date" class="form-control" id="txt_ngayxuat" name="txt_ngayxuat" placeholder="Chọn ngày">
 </div>
</div>
<div class="row">
    <div class="col-6">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Nhân viên Thủ Kho</label>
    <input type="text" class="form-control"  name="txt_thukho" value="{{Auth::user()->hoten}}">
  
  </div>   
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Xuất cho Nhân Viên:</label>
          <select class="form-control" id="txt_nhanvien" name="txt_nhanvien">
    <option>---Chọn----</option>
     @foreach($nhanvien as $item)
     <option value="{{ $item->ma_nv}}">{{ $item->hoten_nv}}</option>
     @endforeach
    </select>
      </div>
    </div>
</div>
<div class="row">
   
    <div class="col-12">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Lý do xuất:</label>
        {{-- <input type="text" class="form-control" id="txt_lydo" name="txt_lydo" > --}}
        <select class="form-control" id="txt_lydo" name="txt_lydo">
          <option>---Chọn----</option>
           @foreach($lydo as $item)
           <option value="{{ $item->id}}">{{ $item->lydo}}</option>
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
                    <button id="submit-button" type="submit" class="btn btn-primary" id="luu_phieu" name="action" value="CONFIRM"><i class="fa fa-save">&nbsp;Lưu Phiếu</i></button>
                    <a href="{{URL ::route('ds_phieuxuat')}}" class=" btn btn-primary"><i class="fas fa-sign-out-alt">&nbsp;Danh Sách Phiếu Xuất</i></a> 
                    {{-- <button id="submit-button" type="submit" class="btn btn-primary" name="action" value="CONFIRM"><i class="icon-save"></i>Thoát</button> --}}
                   
</div>
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
    <option>---Chọn vật tư----</option>
     @foreach($vattu as $item)
     <option value="{{ $item->ma_vattu}}">{{ $item->ten_vattu}}</option>
     @endforeach
    </select>
  </div>   
 </div>
 <div class="col-3">
 <div class="form-group">  
  <input type="text" class="form-control" id="dvt_vattu" name="dvt_vattu" placeholder="Đơn vị tính" >      
 
 </div>
 </div>
 <div class="col-3">
    <input type="text" class="form-control" id="soluong" name="soluong" placeholder="Số lượng tồn">
    <input type="hidden" id="sl_ton" name="sl_ton" value="" placeholder="Đơn vị tính" > 
 </div>
 <div class="col-3">
 <button class="btn btn-primary" id="submit" name="submit"  value="" > <i class="fas fa-feather">&nbsp;Thêm Vật Tư</i></button>
</div>
</form>
</div>
<table id="table" class="table table-bordered" >
    <thread>   
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Mã Vật Tư</th>           
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Tên Vật Tư</th>                      
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Đơn Vị Tính</th>
      <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Số Lượng </th>
      <th style="text-align: center; vertical-align: middle;background: blue;color: white; width:200px;">Tùy Chỉnh </th> 
                           
  </thread>
  
   <tbody id="load"></tbody>
    </table>
    <!--Edit post Area -->

<div class="modal fade" id="update_vattu" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
               <input type="hidden" id="demo5" name="ton_kho" class="form-control">  
               <input type="hidden" id="demo6" name="sl_cu" class="form-control">                       
              
      </div>
        
        <div class="modal-footer">         
          <button class="btn btn-danger" id="capnhat_vattu" type="submit" name="submit"  value="" >Cập Nhật</button>
          <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">Đóng</button>
        </div>
        </form>
       
      </div>
      
    </div>
  </div>
</div>
</div>
    <!--End Edit post Area -->
    <script type="text/javascript">
    // load du lieu vao form
    fresh_ton();
    load();
   function load()
              {
                $('#load').html('');
                var ma_phieu = $("input[name='txt_maphieu']").val();                
                  $.ajax({
                       
                      
                       url:'{{URL::route('ajax_dsvtxuat','')}}'+'/'+ma_phieu,
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
                                
                              
                                 let posts=res.data;                               
                                $.each(posts,function(i,item)
                                   {                                      
                                         $('#load').append(
                                        '<tr>\
                                         <td class="id" style="display:none">'+item.id+'</td>\
                                         <td style="text-align: center;">'+item.id_vattu+'</td>\
                                         <td>'+item.ten_vattu+'</td>\
                                         <td style="text-align: center;">'+item.dvt_vattu+'</td>\
                                         <td style="text-align: center;">'+item.sl_vattu+'</td>\
                                         <td style="text-align: center;">\
                                         <button value="'+item.id+'" class="btn edit_btn" data-toggle="modal" ><i class="fas fa-edit" style="font-size:28px;color:blue"></i></button>\
                                         <button value="'+item.id+'" class="btn delete_btn "data-toggle="modal" ><i class="far fa-trash-alt" style="font-size:28px;color:red"></i></button></td>\</tr>');                          
    
                                   }); 
                               }
                             
                          }
                       });
              };
              //click chọn vật tư
            
              function fresh_ton(){
              $('#ma_vattu').change(function(){

                //alert('ajax change select');
                let id = $(this).find(':selected').val();                          
                //console.log(id);
                $.ajax({
                  headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },     
                  url:'{{URL::route('select_vattu')}}',
                  method:'POST',
                  data:{'id':id},                  
                  success:function(res)
                  {
                    console.table(res.data);
                  $('#dvt_vattu').val(res.data.dvt_vattu);
                  $('#soluong').val(res.data.tonkho);
                  $('#sl_ton').val(res.data.tonkho);
                  }
                });
              });
            }
                //them vật tư
      $('#them_vattu').submit(function(e){      
      e.preventDefault();    
      var sl_ton = $("input[name='sl_ton']").val();  
      var ma_phieu = $("input[name='txt_maphieu']").val();
      var ma_vattu= $("#ma_vattu :selected").val();      
    //  var ma_vattu= $("#ma_vattu :selected").text(); nếu muốn lên tên hiện thị
      var soluong = $("input[name='soluong']").val();      
      var _token = $("input[name='_token']").val();      
      console.log(soluong); 
      console.log(sl_ton); 
      if(parseInt(sl_ton)===0)
      {
        Swal.fire({
                            position: 'center',
                             icon: 'warning',                            
                             title: 'Không thể xuất khi số lượng bằng 0',
                             showConfirmButton: true,
  timer: 10000
})       
      }
      else if(parseInt(soluong)>parseInt(sl_ton))
      {
        Swal.fire({
                            position: 'center',
                             icon: 'warning',                            
                             title: 'Đã vượt số lượng tồn kho',
                             showConfirmButton: true,
  timer: 10000
})       
      }
      else
      {

     
     $.ajax({
              
              url:'{{URL::route('luu_vtxuat')}}',
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
                   $('#ma_vattu').prop('selected', false).find('option:first').prop('selected', true);          
                   $("input[name='soluong']").val('');
                   $("input[name='dvt_vattu']").val('');                                    
                   load();

                 
                 }
                 else
                 {
                  alert('Kết nối lỗi!!!');
                 }

              }
           });
          }
      });
       // sua vat tu
      
       $(document).on('click','.edit_btn',function(){
        
        let id=$(this).val();                
        console.log(id);
              $.ajax({
                
                url:'{{URL::route('sua_vtxuat','')}}' +'/'+id,
                method:'GET',
                headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                "Content-Type": "application/x-www-form-urlencoded",
                                               
                                              }, 
                                              
                success:function(res)
                {
                  if(res.status==true)
                   {
                                                       console.table(res.sl_ton); 
                                                       console.table(res.data);
                                                       console.log(res.data.ten_vattu);
                                                        $('#demo0').val(res.data.id);
                                                        $('#demo1').val(res.data.ma_vattu);
                                                        $('#demo2').val(res.data.ten_vattu);
                                                        $('#demo3').val(res.data.dvt_vattu);                                       
                                                        $('#demo4').val(res.data.sl_vattu); 
                                                        $('#demo5').val(res.sl_ton.tonkho); // gán số lượng tồn vào input id="demo5"
                                                        $('#demo6').val(res.data.sl_vattu); // gán số lượng cũ vào input id="demo6"                                              
                                                        $('#update_vattu').modal();  
                   
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
      var get_ton=$("input[name='ton_kho']").val();
      var get_sl_cu=$("input[name='sl_cu']").val();//lấy giá trị sl cũ từ input sl_cu có id ="sl_cu"
      var get_sl_moi=$("#demo4").val();
      console.log(ma_phieu); 
      console.log(get_ton);
      console.log(get_sl_cu);
      console.log(get_sl_moi);
      if(parseInt(get_sl_moi)>(parseInt(get_sl_cu)+(parseInt(get_ton))))
      {
        Swal.fire({
                            position: 'center',
                             icon: 'warning',                            
                             title: 'Đã vượt số lượng tồn kho',
                             showConfirmButton: true,
  timer: 10000
})       
      }
      else{
      $.ajax({
              
              url:'{{URL::route('capnhat_vtxuat','')}}'+'/'+id,
              method:'POST',
              headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",
                                             
                                            }, 
                                            data:{
                                                        _token:'{{ csrf_token() }}',				
				                                                 ma_phieu: ma_phieu,
			                                                   ma_vattu:$('#demo1').val(),		                                             	       
				                                                soluong: $('#demo4').val(),
                                                   
			                                        },
              success:function(res)
              {
                if(res.status==true)
                 {
                  
                 $('#update_vattu').modal('hide'); 
                  $('#load').html('');
                  load();
                  $('#ma_vattu').prop('selected', false).find('option:first').prop('selected', true);   
                 }
                 else
                 {
                  alert('Kết nối lỗi!!!');
                 }

              }
           }); 
          } 
     });
     //xóa vật tư
     $(document).on('click','.delete_btn',function(){
 
 let id=$(this).val();                
 console.log(id);
       $.ajax({
         
         url:'{{URL::route('xoa_vtxuat','')}}'+'/'+id,
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
@endsection