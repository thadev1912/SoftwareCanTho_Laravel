@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH PHIẾU NHẬP KHO</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">
<div> <a href="{{URL::route('nhapkho')}}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a> <br></div>                    
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:20px;">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">Mã Phiếu </th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:80px;">Ngày Nhập</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:120px;">Nhân viên Xuất</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:80px;">Tên Kho</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:220px;">Nhà Cung Cấp</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Lý do</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:80px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                  
                                     <tbody>
                                       @foreach($data as $dt)
                                       <td style="text-align:center;">{{($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</td>
                                       <td>{{$dt->ma_phieu}}</td>
                                       <td style="text-align: center;">{{$dt->ngaynhap}}</td>
                                       <td>{{$dt->id_nhanvien}}</td>
                                       <td>{{$dt->ten_kho}}</td>
                                       <td>{{$dt->ten_nhacc}}</td>
                                       <td>{{$dt->lydo}}</td>
                                      <td  style="text-align: center;" class="td-actions">
                                          <a href="{{URL::route('chitiet_phieunhap',$dt->id)}}" class="btn-sm btn-primary"><i class="fa fa-address-card">&nbsp;Xem Chi Tiết</i></a>           
                        
  
                         
                         
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

