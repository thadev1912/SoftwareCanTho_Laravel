@extends('layout.layout_api')      
@section('main_api')            
          <div class="card-body"> 
            <script>
         
</script>
      
          
        </div> 
          <!-- Button trigger Thêm Mới-->
          <div id="add_btn" class="">
            <button type="button" class="btn btn-info ml-3 mb-3" data-toggle="modal" data-target="#exampleModalCenter">
             Thêm mới
            </button>
           
                  </div>
                 <!--End Button trigger Thêm Mới-->     
        <!--Load Main Table--->
        <div id="alert_form"></div>
               <table id="table" class="table table-bordered" >
               <thread>              
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">STT</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Nhân Viên</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Tên Nhân Viên</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Chức Vụ</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Phòng Ban</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Giới Tính</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Địa Chỉ</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Số Điện Thoại</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Ngày Chấm Công</th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Giờ Vào </th>
                        <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Giờ Ra</th>
                                 
             </thread>
             
              <tbody id="load"></tbody>
               </table>
          
          <div>
   <!-- End Load Main Table--->
   <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item ">
        <a class="page-link bg-primary text-white" id="prev">Trước</a>
      </li>      
      <li class="page-item">
        <a class="page-link bg-primary text-white" id="next">Sau</a>
      </li>
    </ul>
  </nav>
        
         
         
          
                  
               
                 
          
<script type="text/javascript"> 

              
          load();
           function load()
              {
                let token=localStorage.getItem("your_token");
                let page=1; // cập nhật page từ DOM 
                  $.ajax({
                       
                       
                       url:'{{URL::route('bangchamcong.get')}}?page='+page+'',
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
                                 
                                
                                let datas=res.data.data; 
                               
                               // console.log(next);                            
                                $('#status_token').html('');
                                $('#logout_token').addClass('alert alert-danger');
                                $.each(datas,function(i,item)
                                   {
                                      //console.log(item.id);
                                         $('#load').append(
                                        '<tr>\
                                         <td class="id" style="display:none">'+item.id+'</td>\
                                         <td style="text-align: center;">'+ ++i +'</td>\
                                         <td  >'+item.ma_nv+'</td>\
                                         <td>'+item.hoten_nv+'</td>\
                                         <td>'+item.ma_cv+'</td>\
                                         <td>'+item.ma_pb+'</td>\
                                         <td>'+item.gioitinh_nv+'</td>\
                                         <td>'+item.diachi_nv+'</td>\
                                         <td>'+item.sdt_nv+'</td>\
                                         <td style="text-align: center;">'+item.ngay_chamcong+'</td>\
                                         <td style="text-align: center;">'+item.gio_vao+'</td>\
                                         <td style="text-align: center;">'+item.gio_ra+'</td>\</tr>');                        
                                                               
    
                                   }); 
                               }
                              
                          },
                          error:function (res){
                            //alert('Bạn chưa có quyền để truy cập dữ liệu này...'); 
                           
    }                        
                       });
              };
             
     

                
        </script> 
        





@endsection