
@extends('layout.layout_api')        
@section('main_api')   
          <div class="card-body"> 
            <script>
         
</script>
         
        
        </div> 
          <!-- Button trigger Thêm Mới-->
          <div id="add_btn" class="d-none">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalCenter">
              <i class="fas fa-feather">&nbsp;Thêm mới</i>
            </button>
           
                  </div>
                 <!--End Button trigger Thêm Mới-->     
        <!--Load Main Table--->
        <div id="alert_form"></div>
               <table id="table" class="table table-bordered d-none" >
               <thread>              
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">STT</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:300px;">Tiêu Đề Bài Viết</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:800px;">Nội Dung Bài Viết</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:170px;">Danh Mục </th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:170px;">Biên Tập</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:170px;">Tùy Chỉnh</th>               
             </thread>
             
              <tbody id="load"></tbody>
               </table>
          
          <div>
   <!-- End Load Main Table--->
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
                             <label>Tiêu Đề Bài Viết</label>
                             <input id="title_post" name="title_post" class="form-control" type="text" value="">
                             <small id="title_post_er" class="form-text text-danger d-none"></small>
                             <label>Nội Dung Bài Viết</label>
                             <input id="content_post" name="content_post" class="form-control" type="text" value="" >
                             <small id="content_post_er" class="form-text text-danger d-none"></small>
                             <label>Danh Mục Bài Viết</label>
                             <input id="danhmuc_post" name="danhmuc_post" class="form-control" type="text" value="" >  
                             <small id="danhmuc_post_er" class="form-text text-danger d-none"></small>
                             <label>Tên Biên Tập</label>
                             <input id="bien_tap" name="bien_tap" class="form-control" type="text" value="" >           
                             <small id="bien_tap_er" class="form-text text-danger d-none"></small>
                            
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
             <input type="hidden" id="id">             
             <label>Tiêu Đề Bài Viết</label>
             <input type="text" id="title" name="title_post1" class="form-control">
             <label>Nội dung Bài Viết</label>
             <input type="text" id="noidung" name="content_post1" class="form-control">
             <label>Danh Mục Bài Viết</label>
             <input type="text" id="danhmuc" name="danhmuc_post1" class="form-control">  
             <label>Tên Biên Tập</label>
             <input type="text" id="bientap" name="bien_tap1" class="form-control">
    </div>
      
      <div class="modal-footer">        
        <button class="btn btn-danger" id="submit1" type="submit" name="submit1"  value="" >Cập Nhật</button>
        <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">Đóng</button>
      </div>
      </form>
     
    </div>
    
  </div>
</div>
   <!--End Form Sửa -->
 
<script type="text/javascript">
  
              
          //load table
           function load()
              {
                let token=localStorage.getItem("your_token");
                
                  $.ajax({
                       
                       
                       url:'{{URL::route('post.index')}}',
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
                                let posts=res.data;
                                $('#status_token').html('');
                                $('#logout_token').addClass('alert alert-danger');
                                $.each(posts,function(i,item)
                                   {                                   
                                         $('#load').append(
                                        '<tr>\
                                         <td class="id" style="display:none">'+item.id+'</td>\
                                         <td  style="text-align: center;">'+ ++i +'</td>\
                                         <td>'+item.title_post+'</td>\
                                         <td >'+item.content_post.replace(/^(.{280}[^\s]*).*/, "$1")+ '  ........'+'</td>\
                                         <td>'+item.danhmuc_post+'</td>\
                                         <td>'+item.bien_tap+'</td>\
                                         <td  style="text-align: center;"><button class="btn btn-xs edit_btn" data-toggle="modal"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></button>||\
                                         <button value="'+item.id+'" class="btn btn-xs delete_btn "data-toggle="modal" ><i class="far fa-trash-alt" style="font-size:28px;color:red"></i></button></td>\
                                                                                  </tr>');                          
    
                                   }); 
                               }                              
                          }
                       });
              };
             
         
           //thêm mới api
           $('#add_api').submit(function(e)
                   {
                    e.preventDefault();                 
                    $('#title_post_er').text('');
                    $('#content_post_er').text('');
                    $('#danhmuc_post_er').text('');
                    $('#bien_tap_er').text('');
                  
                    // let info =$('#add_api').serialize();
                    //console.log(info);
                    var _token = $("input[name='_token']").val();                  
                    var title_post = $("input[name='title_post']").val();
                    var content_post = $("input[name='content_post']").val();
                    var danhmuc_post = $("input[name='danhmuc_post']").val();
                    var bien_tap = $("input[name='bien_tap']").val();
                    console.log(bien_tap);
                    let token=localStorage.getItem("your_token");
                     $.ajax({
                     
                     url:'{{URL::route('post.index')}}',
                      method:'POST',   
                      headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",
                                              "Authorization": "Bearer "+token+"",
                                            }, 
                                             
                      //data:$(this).serialize(), có thể sử dụng kiểu này
                      data: {_token:_token,title_post:title_post, content_post:content_post, danhmuc_post:danhmuc_post,bien_tap:bien_tap},
                      success:function(res)
                             {
                                                           
                           
                            if(res.status==true)
                             {
                                   $('#alert_form').html('');
                                   $('#alert_form').addClass('alert alert-success');
                                   $('#alert_form').append(res.messege);
                                   $('input[type="text"],textarea').val('');  
                                   $('#exampleModalCenter').modal('hide');                                 
                                   $('#load').html('');
                                   load();
                             }
                             else
                             {
                              alert('Token hết hạn...vui lòng đăng nhập lại...!!!');
                             }
                            },
                            error: function (res) 
                            {
                              
                                   var res = $.parseJSON(res.responseText);
                                   console.log(res);
                                  $.each(res.errors, function (key, value) 
                                  {
                                              
                                            $("#" + key).next().html(value[0]);  
                                            $("#" + key).next().removeClass('d-none'); 
                                                                                 
                                 });
                                 
                            }
                          });                               
                
              });
    //chỉnh sửa qua api
                  $(document).on('click','.edit_btn',function()
                   {
                          let id_post=$(this).closest('tr').find('.id').text();
                          let token=localStorage.getItem("your_token");
                          //console.log(id_post);
                          $.ajax({
                              method:'GET',
                              
                              url:'{{URL::route('post.index')}}'+'/'+id_post+'/edit',
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
                                                 $('#title').val(res.data.title_post);
                                                 $('#noidung').val(res.data.content_post);                                       
                                                 $('#danhmuc').val(res.data.danhmuc_post);
                                                 $('#bientap').val(res.data.bien_tap);                                                
                                                 $('#exampleModalCenter1').modal('show');                                         
                                          
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
                                        
                                        url:'{{URL::route('post.index')}}'+'/'+id_post,                                       
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
                                  let id_post=$('#id_delete').val();                                  
                                     $.ajax({
                                      headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                                                  // sử dụng kiểu phương thức "token" kiểu meta header
                                                },
                                    method:'DELETE',
                                     
                                    url:'{{URL::route('post.index')}}'+'/'+id_post,       
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