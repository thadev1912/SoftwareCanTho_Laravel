@extends('layout.layout_api')         
@section('main_api')            
          <div class="card-body"> 
            <script>
         
</script>
      
          
        </div> 
          <!-- Button trigger Thêm Mới-->
          <div id="add_btn" class="d-none">
            <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModalCenter">
              <i class="fas fa-feather">&nbsp;Thêm mới</i>
            </button>
           
                  </div>
                 <!--End Button trigger Thêm Mới-->     
        <!--Load Main Table--->
        <div id="alert_form"></div>
               <table id="table" class="table table-bordered d-none" >
               <thread>              
                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">STT</th>
                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Nhân Viên</th>
                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Tên Nhân Viên</th>
                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">Địa Chỉ</th>
                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Giới Tính</th>
                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">SĐT</th>
                                   
             </thread>
             
              <tbody id="load"></tbody>
               </table>
          
          <div>
   <!-- End Load Main Table--->
        
         
         
          
                  
                   <!--Modal Form Thêm Mới -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">  
                    <div class="modal-content">  
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm Mới Sản Phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post" id="add_api">
                        @csrf
                     <div class="modal-body">    
                             <input type="hidden" id="id">            
                             <label>Mã Nhân Viên</label>
                             <input id="ma_nv" name="ma_nv" class="form-control" type="text" value="">
                             <small id="ma_nv_er" class="form-text text-danger d-none"></small>
                             <label>Tên Nhân Viên</label>
                             <input id="ten_nv" name="ten_nv" class="form-control" type="text" value="" >
                             <small id="ten_nv_er" class="form-text text-danger d-none"></small>
                             <label>Địa Chỉ</label>
                             <input id="diachi_nv" name="diachi_nv" class="form-control" type="text" value="" >  
                             <small id="diachi_nv_er" class="form-text text-danger d-none"></small>
                             <label>Giới Tính</label>
                             <input id="gioitinh_nv" name="gioitinh_nv" class="form-control" type="text" value="" >           
                             <small id="gioitinh_er" class="form-text text-danger d-none"></small>
                             <label>Số Điện Thoại</label>
                             <input id="sdt_nv" name="sdt_nv" class="form-control" type="text" value="" >           
                             <small id="sdt_er" class="form-text text-danger d-none"></small>
                             <label>Ảnh Đại Diện</label>
                             <input id="anhdaidien" name="anhdaidien" class="form-control" type="text" value="" >           
                             <small id="anhdaidien_er" class="form-text text-danger d-none"></small>
                             <label>Mã Phòng Ban</label>
                             <input id="ma_pb" name="ma_pb" class="form-control" type="text" value="" >           
                             <small id="ma_pb_er" class="form-text text-danger d-none"></small>
                             <label>Mã Chức Vụ</label>
                             <input id="ma_cv" name="ma_cv" class="form-control" type="text" value="" >           
                             <small id="ma_cv_er" class="form-text text-danger d-none"></small>
                             <label>Email</label>
                             <input id="email" name="email" class="form-control" type="text" value="" >           
                             <small id="email_er" class="form-text text-danger d-none"></small>
                            
                    </div>
                      
                      <div class="modal-footer">                        
                        <button class="btn btn-danger" id="submit" type="submit" name="submit"  value="" >Lưu Lại</button>
                        <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">Đóng</button>
                      </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
                  <!--End Form Thêm Mới -->
                  <!--Start Form Sửa -->

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

  
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh Sửa Bài Viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="put" id="capnhat_ajax">
        @csrf
      <div class="modal-body">
             <input type="hidden" id="id1">             
             <label>Mã Nhân Viên</label>
             <input type="text" id="ma_nv1" name="ma_nv" class="form-control">
             <label>Tên Nhân Viên </label>
             <input type="text" id="hoten_nv1" name="hoten_nv" class="form-control">
             <label>Địa Chỉ</label>
             <input type="text" id="diachi_nv1" name="diachi_nv" class="form-control">  
             <label>Giới Tính</label>
             <input type="text" id="gioitinh_nv1" name="gioitinh_nv" class="form-control">
             <label>Số Điện Thoại</label>
             <input type="text" id="sdt_nv1" name="sdt_nv1" class="form-control">
    </div>
      
      <div class="modal-footer">        
        <button class="btn btn-danger" id="submit1" type="submit" name="submit"  value="" >Cập Nhật</button>
        <button type="button1" class=" btn btn-info" data-dismiss="modal" aria-label="Close">Đóng</button>
      </div>
      </form>
     
    </div>
    
  </div>
</div>
   <!--End Form Sửa -->
          <!--Form Xóa-->
  <div class="modal fade" id="delete_form" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Cảnh báo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Bạn chắc chắn có muốn xóa không?</p>
          <input type="text" class="d-none" id="id_delete">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Quay Lại</button>
          <button type="button" class="btn btn-danger delete_form_btn " data-dismiss="modal">Xóa Ngay!</button>
        </div>
      </div>
    </div>
  
  </div>
  <!--End Deleted form-->   
 
<script type="text/javascript"> 

              
          //load();
           function load()
              {
                let token=localStorage.getItem("your_token");
                
                  $.ajax({
                       
                      
                       url:'{{URL::route('nhanvien.get')}}',
                       method:'GET',  
                       headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                  "Content-Type": "application/x-www-form-urlencoded",
                                                  "Authorization": "Bearer "+token+"",
                                                },                      
                       success:function(res)
                          {
                            console.log(res);
                            if(res.status==200)
                               {
                                 
                                //alert("được rồi đó bạn");
                                let posts=res.data;
                                $('#status_token').html('');
                                $('#logout_token').addClass('alert alert-danger');
                                $.each(posts,function(i,item)
                                   {
                                   
                                         $('#load').append(
                                        '<tr>\
                                         <td class="id" style="display:none">'+item.id+'</td>\
                                         <td style="text-align: center;">'+ ++i +'</td>\
                                         <td>'+item.ma_nv+'</td>\
                                         <td>'+item.hoten_nv+'</td>\
                                         <td>'+item.diachi_nv+'</td>\
                                         <td>'+item.gioitinh_nv+'</td>\
                                         <td style="text-align: center;">'+item.sdt_nv+'</td>\
                                         \
                                                                                  </tr>');                          
    
                                   }); 
                               }
                              
                          },
                          error:function (res){
                            //alert('Bạn chưa có quyền để truy cập dữ liệu này...');  
                           
    }                        
                       });
              };
             
         
           
    //chỉnh sửa qua api
                  $(document).on('click','.edit_btn',function()
                   {
                          let id=$(this).closest('tr').find('.id').text();
                          let token=localStorage.getItem("your_token");
                          console.log(id);
                          $.ajax({
                              method:'GET',
                              url:'http://127.0.0.1:8000/api/nhanvien/edit/'+id+'',                                
                              dataType:'json', 
                              headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",
                                              "Authorization": "Bearer "+token+"",
                                            }, 
                                                                                                                             
                              success:function(res)
                                       {                                
                                                // console.log(res);                                        
                                                 $('#id').val(res.data.id);                            
                                                 $('#ma_nv').val(res.data.ma_nv);
                                                 $('#hoten_nv').val(res.data.hoten_nv);                                       
                                                 $('#diachi_nv').val(res.data.diachi_nv);
                                                 $('#gioitinh_nv').val(res.data.gioitinh_nv);   
                                                 $('#sdt_nv').val(res.data.sdt_nv);                                                 
                                                 $('#exampleModalCenter1').modal('show');                                         
                                          
                                        },
                            error:function (res){
                            //alert('Bạn chưa có quyền để truy cập dữ liệu này...');  
                              
    }                                                                  
                                       });

                               });
      //cập nhật bài viết api                         
                               $('#capnhat_ajax').submit(function(e)
                                {
                                        e.preventDefault();
                                        let token=localStorage.getItem("your_token");
                                        let id_post=$('#id').val();                                        
                                        $.ajax({
                                        method:'PUT',
                                        url:'http://127.0.0.1:8000/api/post/'+id_post+'',                                        
                                        dataType:'json', 
                                        headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                  "Content-Type": "application/x-www-form-urlencoded",
                                                  "Authorization": "Bearer "+token+"",
                                                },     
                                        data:{
                                                        _token:'{{ csrf_token() }}',		
				                                                     title_post:$('#title').val(),
		                                             	      content_post: $('#noidung').val(),
				                                                danhmuc_post: $('#danhmuc').val(),
                                                        bien_tap: $('#bientap').val(),
                                                   
			                                        },
                                          success: function(res)
                                                {
                                                  $('#alert_form').html('');
                                                  $('#alert_form').addClass('alert alert-success');
                                                  $('#alert_form').append(res.messege);
                                                  $('#exampleModalCenter1').modal('hide');                                                                                                     
                                                  $('#load').html('');
                                                  load();
                                                }
                                              
                                          
                                          });
                                });
              //delete dữ liệu api
                                $(document).on('click','.delete_btn',function()
                                 {
                                 
                                  //let id_post=$(this).closest('tr').find('.id').text();
                                  let id=$(this).val();                
                                   console.log(id);
                                   $('#delete_form').modal('show');
                                  $('#id_delete').val(id);
                                
                                 });
                                 $(document).on('click','.delete_form_btn',function(e)
                                 {
                                  e.preventDefault();   
                                  //alert('đã nhận thông tin');
                                  let token=localStorage.getItem("your_token");
                                  let id=$('#id_delete').val();   
                                  console.log(id);                               
                                     $.ajax({
                                      headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                                                  // sử dụng kiểu phương thức "token" kiểu meta header
                                                },
                                    method:'DELETE',
                                    url:'http://127.0.0.1:8000/api/nhanvien/delete/'+id+'', 
                                    dataType:'json',
                                    headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                  "Content-Type": "application/x-www-form-urlencoded",
                                                  "Authorization": "Bearer "+token+"",
                                                },    
                                    success:function(res)
                                        {
                                         
                                          $('#alert_form').html('');
                                          $('#alert_form').addClass('alert alert-danger');
                                          $('#alert_form').append(res.messege);
                                          $('#load').html('');
                                          load();
                                         
                                          
                                        }


                                   });
                                   
                                 });   

                
        </script> 
        





@endsection