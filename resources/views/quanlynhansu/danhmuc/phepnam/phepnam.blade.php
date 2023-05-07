<?php
use Carbon\Carbon;
?> 
@extends('layout.main')
@section('main_body')

<div class="card">        
        
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH PHÉP NĂM</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">
 <a href="{!! URL::route('them_pn') !!}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a>
 <a href="{!! URL::route('baocao_phepnam') !!}" class=" btn btn-primary"><i class="fas fa-file-pdf">&nbsp;Xuất PDF</i></a>
                   
                  
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered mt-2 ">
                                     <thread >
                                         </tr >
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">MÃ NV</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">TÊN NHÂN VIÊN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">NGÀY N. VIỆC</th>                                           
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">TỔNG PHÉP NĂM</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">PHÉP ĐÃ DÙNG</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">PHÉP TỒN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">NGÀY NGHỈ VIỆC</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($phepnam as $pn)
                                     <tr>
                                       <td style="text-align:center;">{{($phepnam->currentPage() - 1)  * $phepnam->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td style="text-align: center;">{{$pn->ma_nv}}</td>
                                        <td >{{$pn->hoten_nv}}</td>
                                        <td style="text-align: center;">{{$pn->ngay_batdau}}</td>
                                         @if($pn->ngay_ketthuc)
                                        <td style="text-align: center;">{{ floor(Carbon::parse($pn->ngay_ketthuc)->diffInDays(Carbon::parse($pn->ngay_batdau))/30) }}</td>
                                        @else
                                        <td style="text-align: center;">{{ floor(Carbon::now()->diffInDays(Carbon::parse($pn->ngay_batdau))/30) }}</td>
                                        @endif
                                        <td style="text-align: center;">{{$pn->phepnam_dadung}}</td>                                        
                                        <td style="text-align: center;">{{floor(Carbon::parse($pn->ngay_ketthuc)->diffInDays(Carbon::parse($pn->ngay_batdau))/30)-$pn->phepnam_dadung}}</td>     
                                        <td style="text-align: center;">{{($pn->ngay_ketthuc)?($pn->ngay_ketthuc):"Đang làm việc"}}</td>
                                        <td style="text-align: center;" class="td-actions">
                        <a href="{!! URL::route('sua_pn',$pn->id) !!}"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>

                        <a href="{!! URL::route('xoa_pn',$pn->id) !!}"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                              <!--code gọi phân trang-->
                              {{$phepnam->links("pagination::bootstrap-4")}}<br>
                              <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                     
                 
                 </div >   
              </div>
           </div>
           
         </div>
       @endsection

