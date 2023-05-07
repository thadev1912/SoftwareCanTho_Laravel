@extends('layout.layout_api')         
@section('main_api')   
<div class="card-body">           
          <div class="card-body"> 
            <script>
         
</script>
          
          <div id="token_status">
          </div>
           <div id="logout_status">
          </div> 
          
        </div> 
          <!-- Button trigger Thêm Mới-->
          <div id="add_btn" class="d-none">
            <button type="button" class="btn btn-info ml-3 mb-3" data-toggle="modal" data-target="#exampleModalCenter">
             Thêm mới
            </button>
            <a href="" type="button" class="btn btn-success mb-3 d-none" >
              Tải Dữ Liệu Về Kho Lưu Trữ
            </a>
                  </div>
                 <!--End Button trigger Thêm Mới-->     
        <!--Load Main Table--->
        <div id="alert_form"></div>
               <table id="table" class="table table-bordered" >
               <thread>              
                       <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">STT</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:80px;">MÃ NHÂN VIÊN</th>                     
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">TIÊU ĐỀ </th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:400px;">NỘI DUNG</th>
                                  
             </thread>
             
              <tbody id="load"></tbody>
               </table>
          
          <div>
   <!-- End Load Main Table--->
       
<script type="text/javascript">
  
              
          //load table
          load();
           function load()
              {
                              
                  $.ajax({                       
                       url:'https://jsonplaceholder.typicode.com/posts',
                       method:'GET',  
                       headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                                  "Content-Type": "application/x-www-form-urlencoded",
                                                 
                                                },                      
                       success:function(res)
                          {
                            
                            if(res)
                               {
                                console.log(res);                               
                                $('#status_token').html('');
                                $('#logout_token').addClass('alert alert-danger');
                                $.each(res,function(i,item)
                                   {                                 
                                
                                         $('#load').append(
                                        '<tr>\
                                         <td class="id" style="display:none">'+item.id+'</td>\
                                         <td style="text-align:center;">'+ ++i +'</td>\
                                         <td style="text-align:center;">'+item.userId+'</td>\
                                         <td>'+item.title+'</td>\
                                         <td>'+item.body+'</td>\
                                        \
                                         \
                                                                                  </tr>');                          
    
                                   }); 
                               }                             
                          }
                       });
              };
                        
        </script> 
@endsection