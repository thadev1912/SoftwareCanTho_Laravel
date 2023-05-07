@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> THÔNG KÊ XUẤT NHẬP TỒN</h1>
                                  </div>
                    
                     </div>
</div>
</br>
                   <div class="card-body">
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered ">
                                     <thread >
                                         </tr >
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:10px;">STT </th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:40px;">Mã Vật Tư </th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">Tên Vật Tư</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Đơn Vị Tính</th>                                           
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Tổng Nhập</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Tổng Xuất</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Tồn Kho</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">Tùy Chỉnh</th>
                                          </tr>
                                     </thread>
                                  
                                     <tbody>
                                       @foreach($data as $dt)
                                       <td style="text-align:center;">{{($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</td>
                                       <td>{{$dt->ma_vattu}}</td>
                                       <td>{{$dt->ten_vattu}}</td>
                                       <td style="text-align: center;">{{$dt->dvt_vattu}}</td>
                                       <td style="text-align: center;">{{$dt->tongnhap}}</td>
                                      <td style="text-align: center;">{{$dt->tongxuat}}</td> 
                                      <td style="text-align: center;">{{($dt->tongnhap)-($dt->tongxuat)}}</td>
                                      <td class="td-actions">
                                          <a href="{!! URL::route('chitiet_vtnhap',$dt->ma_vattu)!!}" class="btn-sm btn-danger"><i class="fa fa-address-card">&nbsp;Chi Tiết Nhập</i></a>&nbsp;|  
                                          <a href="{!! URL::route('chitiet_vtxuat',$dt->ma_vattu)!!}" class="btn-sm btn-success"><i class="fa fa-address-card">&nbsp;Chi Tiết Xuất</i></a>                
                        
  
                         
                         
                     </td>
                                     <tr>
                                       
                                     </tr>
                                      @endforeach
                                   
                                    </tbody>
                               </table>
                            <!--code gọi phân trang-->                        
                            {{$data->links("pagination::bootstrap-4")}}
                            <br>
                            <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                 
                 
                 </div >   
              </div>
           </div>
         </div>
       @endsection

