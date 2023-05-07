@extends('layout.main')
@section('main_body')
   <div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH HỢP ĐỒNG</h1>
                                  </div>
                    
                     </div>
</div>
</br>

<div class="card-body">
 <a href="{!! URL::route('them_hd')!!}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a> 
 <a href="{!! URL::route('baocao_hopdong')!!}" class=" btn btn-primary"><i class="fas fa-file-pdf ">&nbsp;Xuất PDF</i></a>


                   
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">STT</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">MÃ HỢP ĐỒNG</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">MÃ NV</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">HỌ TÊN NHÂN VIÊN</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">TÌNH TRẠNG</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">LOẠI HỢP ĐỒNG</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">LƯƠNG CB</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">NGÀY VÀO</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($hopdong as $hd)
                                     <tr>
                                        <td style="text-align: center;">{{($hopdong->currentPage() - 1)  * $hopdong->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$hd->ma_hd}}</td>
                                        <td style="text-align: center;">{{$hd->ma_nv}}</td>
                                        <td>{{$hd->hoten_nv}}</td>
                                        <td>{{$hd->tinhtrang}}</td>
                                        <td>{{$hd->loai_hd}}</td>
                                        <td>{{number_format(floor($hd->heso_luong),0,',')}} VNĐ</td>
                                        <td style="text-align: center;">{{$hd->ngayvao}}</td>
                                        <td style="text-align: center; vertical-align: middle;" class="td-actions">
                        <a href="{!! URL ::Route('sua_hd',$hd->ma_nv)!!}" class=""><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>

                        <a href="{!! URL ::Route('xoa_hd',$hd->ma_nv)!!}" class=""><i class="far fa-trash-alt" style="font-size:25px;color:red"></i>
                        </a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$hopdong->links("pagination::bootstrap-4")}}
                   <br>
                   <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
         </div>   
       @endsection

