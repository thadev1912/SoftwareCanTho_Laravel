@extends('layout.main')
@section('main_body')
<?php
use Carbon\Carbon;
?>
<div class="card">     
        
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> THÔNG KÊ BẢNG CHẤM CÔNG</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">     
<div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col-lg-4">
   <form class="form-inline" action="" method="GET">
             <input class="form-control mr-1 font-italic" type="search" name="timkiem_ten" value="{!! old('timkiem_ten') !!}" placeholder="Tìm theo mã hoặc tên..." aria-label="Search">
             <input class="form-control mr-1 font-italic" type="date" name="timkiem_ngay"> 
             <button class="btn btn-primary" type="submit"><i class="fa fa-search">&nbsp;Tìm Kiếm</i></button>
  </form>
</div>
<div class="col-lg-1">
   <a href="{!! URL::route('baocao_bangchamcong') !!}" class=" btn btn-primary"><i class="fas fa-file-pdf">&nbsp;Xuất PDF</i></a>
</div>
</div>
<br>
                               
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered ">
                                     <thread >
                                         </tr >
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">MÃ NHÂN VIÊN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">TÊN NHÂN VIÊN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">CHỨC VỤ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">PHÒNG BAN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">NGÀY CHẤM CÔNG</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">GIỜ VÀO</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">GIỜ RA</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">NGÀY CÔNG</th>
                                         
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     
                                     @foreach ($result as $re)
                                     <tr>
                                       <td style="text-align:center;">{{($result->currentPage() - 1)  * $result->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td style="text-align:center;">{{$re->ma_nv}}</td>
                                        <td >{{$re->hoten_nv}}</td>
                                        <td >{{$re->ten_cv}}</td>
                                        <td >{{$re->ten_pb}}</td>                                      
                                        <td style="text-align:center;">{{Carbon::parse($re->ngay_chamcong)->format('d-m-Y')}}</td>
                                        <td style="text-align:center;">{{Carbon::parse($re->gio_vao)->format('H:i:A')}}</td>
                                        <td style="text-align:center;">{{Carbon::parse($re->gio_ra)->format('H:i:A')}}</td>
                                        <td style="text-align:center;">{{(Carbon::parse($re->gio_ra)->diffInHours(Carbon::parse($re->gio_vao))-1.0)/8}}</td>
                                        
                                     </tr>
                                       @endforeach 
                                   

                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                           
                       
                        
                            
                             @if(isset($query))
                             {{ $result->appends($query)->links("pagination::bootstrap-4") }}
                          @else
                            {{ $result->links("pagination::bootstrap-4") }}
                         @endif
                          <br>
                          <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>   
                  
                 
                 </div >   
              </div>
           </div>
           
</div>
       @endsection

