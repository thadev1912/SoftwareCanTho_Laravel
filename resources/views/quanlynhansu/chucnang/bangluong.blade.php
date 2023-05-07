@extends('layout.main')
@section('main_body')
<?php
use Carbon\Carbon;
use Illuminate\Support\Str;
?>
<div class="card">       
        
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> THÔNG KÊ LƯƠNG</h1>
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
<div class="col-lg-3">
    
    <a href="{!! URL::route('baocao_bangluong')!!}" class=" btn btn-primary"><i class="fas fa-file-pdf">&nbsp;Xuất PDF</i></a>
</div>
</div>
<br>
              
                   @php
                       $tong = 0;
                   @endphp
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
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">PHÒNG BAN</th>                                                   
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">CÔNG</th>                                             
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">TỔNG LƯƠNG </th>                                             
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">THỰC LÃNH</th>       
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     
                                     @foreach ($data as $dt)
                                     <tr>
                                        <td style="text-align:center;">{{($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</td>
                                       <td style="text-align:center;">{{$dt->ma_nv}}</td>                                   
                                       <td >{{$dt->hoten_nv}}</td>   
                                       <td >{{$dt->ten_pb}}</td>                                                        
                                       <td style="text-align:center;">{{floor($dt->total)}}</td>                                       
                                       <td style="text-align:center;">{{(number_format(floor($dt->heso_luong/26*$dt->total),0,','))}} VND</td>                                      
                                       <td style="text-align:center;">{{number_format($total=floor($dt->heso_luong/26*$dt->total) +$dt->phu_cap),0,','}} VND</td>
                                       <td style="text-align:center" class="td-actions">
                                       <a href="{!! URL::route('chitiet_bangluong',$dt->ma_nv)!!}" class="btn-sm btn-primary"><i class="fa fa-address-card">&nbsp; Xem Chi Tiết</i></a>     

                        
                    </td>
                                     </tr>
                                     
@php
    $tong += $total;
@endphp
                                       @endforeach 
                                   <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-danger"><strong>Tổng lưởng tháng:<strong></td>
                                        <td style="text-align:center;" class="text-danger"><strong>{{number_format($tong),0,','}} VND<strong></td>
                                   </tr>

                                    </tbody>
                               </table>                            
                           <!--code gọi phân trang-->
                           {{$data->links("pagination::bootstrap-4")}}<br>
                           <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
               
                
                           
                        
                          
                            
                       
                 
                  
                 
                 </div >   
              </div>
           </div>
        </div>

       @endsection

