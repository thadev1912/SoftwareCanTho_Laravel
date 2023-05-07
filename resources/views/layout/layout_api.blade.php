@extends('layout.main')
@section('main_body')
@section('javascript')
<div class="card">

                    <div class="card-header bg-danger">
                               <div class="row">
                                     <div class="col-md-12" align="center">
                                            <h1 class="btn text-light"> KẾT NỐI HỆ THỐNG API </h1>
                                            <div class="float-right "><button class="btn btn-control text-white"data-toggle="modal" data-target="#modalLoginForm">Đăng nhập API</button></div> 
                                     </div>  
                                                                 
                               </div>
                    </div> 
                    <br>
                    <div class="card-body">
                    <div id="token_status">
                    </div>
                     <div id="logout_status">
                    </div> 
                    @yield('main_api')
                       <!--Form Load Đăng Nhập-->
       
          <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-danger">HỆ THỐNG API</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="post" id="check_api">
                @csrf
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <label  data-success="right" for="orangeForm-email">Tài Khoản</label>
                  <input type="text" name="username" class="form-control">          
                </div>
        
                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <label  data-success="right" for="orangeForm-email">Mật Khẩu</label>
                  <input type="password" name="pass" id="defaultForm-pass" class="form-control" >         
                </div>
        
              </div>
              <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-primary btn-lg btn-block" id="submit" type="submit" name="submit">Xác Nhận</button>
                    <a href="" class="btn btn-danger btn-lg btn-block"><i class="icon-remove"></i>&nbsp&nbspĐăng Ký&nbsp&nbsp</a>
              </div>
            </div>
          </div>
       
        </div>
        </form>
         <!--End load Đăng Nhập--->
         <!--Cảnh báo thoát-->
<div class="modal fade" id="logout_form" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Cảnh báo hệ thống</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Bạn thật sự muốn đăng xuất không?</p>
          <input type="text" class="d-none" id="logout_form_btn">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
          <button type="button" class="btn btn-danger logout_form_btn " data-dismiss="modal">Thoát ngay!</button>
        </div>
      </div>
    </div>
  </div>
  </div>  
  <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
</div>

</div>
  <!--End Cảnh Báo Thoát-->   
        <script>
            //kiểm tra token
$(window).ready(function()
        {
          let token=localStorage.getItem("your_token");
               $.ajax({
                          method:'GET',                            
                          url:'{{URL::route('check_token')}}',
                          dataType:'json', 
                          headers: {
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",
                                              "Authorization": "Bearer "+token+"",
                                            }, 
                           
                         success:function(res)
                         {
                           if(res.status!=200)
                              {
                                                        
                              $('#alert_form').html('');                                                                 
                            
                               
                              }
                            else
                            {                             
                              let user=res.user.name;                              
                              load();
                              $('#token_status').html('');  
                              $('#logout_status').removeClass('alert alert-danger');   
                              $('#token_status').removeClass('alert alert-danger');                     
                                                                                                       
                              $('#logout_status').append('Chào '+user+'!!!  <button class="btn btn-xs btn-danger edit_btn" data-toggle="modal" data-target="#logout_form">Đăng xuất</button>');   
                              $('#add_btn').removeClass('d-none');
                              $('#table').removeClass('d-none');           
                             
                              
                            }
                         }  

               });

               
         });
        //kiểm tra đăng nhập
     $('#check_api').submit(function(e)
         {            
   e.preventDefault();           
           var username = $("input[name='username']").val();
           var pass = $("input[name='pass']").val();          
           console.log(username);                             
           $.ajax({
           
             url:'{{URL::route('check_api')}}',
             method:'POST',
                          data: {username:username, pass:pass},
             success:function(res)
                {
                        
                           if(res.status==200)
                           {                          
                           let token=res.token;
                           let user=res.user.name;                         
                           localStorage.setItem("your_token",token);                           
                           $('#logout_status').html('');   
                           $('#token_status').removeClass('alert alert-danger');
                           $('#logout_status').removeClass('alert alert-danger');                                                                      
                           $('#logout_status').append('Chào '+user+'!!! <button class="btn btn-xs btn-danger edit_btn" data-toggle="modal" data-target="#logout_form">Đăng xuất</button>'); 
                           Swal.fire({
                            position: 'top',
                             icon: 'success',
                             width: 1500,
                             height:400,
                             title: 'Đăng nhập thành công<br> Mã token của bạn là:<br>'+token+'',
                             showConfirmButton: true,
  timer: 10000
})
                           $('#add_btn').removeClass('d-none');                  
                           load();
                           $('#modalLoginForm').modal('hide');                            
                           $('#token_status').html('');                                     
                           $('#table').removeClass('d-none');          
                                  
                           }
                           else
                           {
                            Swal.fire({
                            position: 'top',
                             icon: 'warning',
                             title: 'Tài khoản hoặc mật khẩu chưa chính xác!!!',
                             showConfirmButton: true,
  timer: 10000
})
                           }
                    
                    
                   }
             
           });
           
        });  
//thoát tài khoản xóa token api              
$(document).on('click','.logout_form_btn',function(e)
                                  {
                                           e.preventDefault();   
                                           let token=localStorage.getItem("your_token");
                                           $.ajax({                                          
                                                  method:'DELETE',
                                                   
                                                  url:'{{URL::route('thoat_api')}}',
                                                  dataType:'json',
                                                   headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                            "Content-Type": "application/x-www-form-urlencoded",
                                                            "Authorization": "Bearer "+token+"",
                                                            },    
                                                  success:function(res)
                                                            {
                                                                 if(res.status==200)
                                                                 {
                                                                
                                                                    Swal.fire('Đăng Xuất Thành Công!!!')  
                                                                 localStorage.removeItem("your_token");                                                                                                            
                                                      
                                                                    $('#logout_status').html('');                                                                    
                                                                    $('#load').html('');
                                                                    $('#table').addClass('d-none');
                                                                    $('#add_btn').addClass('d-none');  
                                                                    load();
                                                                 }                                                                
                                                                
                                                            }
                                            });
                                  });
            </script>      
                 
@endsection