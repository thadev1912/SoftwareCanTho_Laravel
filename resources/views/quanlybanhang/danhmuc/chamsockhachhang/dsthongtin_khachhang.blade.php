@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH THÔNG TIN KHÁCH HÀNG</h1>
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
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">STT</th>                                          
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">HỌ TÊN KHÁCH HÀNG</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:240px;">NỘI DUNG TIN NHẮN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:40px;">SỐ ĐIỆN THOẠI</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">ĐỊA CHỈ KHÁCH HÀNG</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($data as $dt)
                                     <tr>
                                       <td style="text-align:center;">{{($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</td>                                        
                                        <td>{{$dt->hoten_kh}}</td>
                                        <td>{{$dt->noidung_kh}}</td>
                                        <td>{{$dt->sdt_kh}}</td>
                                        <td>{{$dt->diachi_kh}}</td>
                                        
                                        <td style="text-align:center;" class="td-actions">
                        <a href="{{URL::route('chitiet_thongtin',$dt->id)}}" class="btn-sm btn-primary"><i class="fa fa-address-card">&nbsp;Xem Chi Tiết</i></a>                        
                        <a href="{{URL::route('xoa_thongtin',$dt->id)}}" class="btn">
                            <i class="btn-icon-only icon-remove"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></i>
                        </a>
                    </td>
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

