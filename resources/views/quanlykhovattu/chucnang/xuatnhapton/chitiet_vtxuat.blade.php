@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH PHIẾU XUẤT VẬT TƯ</h1>
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
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:40px;">STT </th>
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:40px;">Mã Phiếu </th>
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:40px;">Mã Vật Tư</th>
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:40px;">Số Lượng</th>                                                                       
                                         <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:30px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                  
                                     <tbody>
                                       @foreach($data as $dt)
                                       <td style="text-align:center;">{{($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</td>
                                       <td>{{$dt->id_phieuxuat}}</td>
                                       <td >{{$dt->id_vattu}}</td>
                                       <td style="text-align:center;">{{$dt->sl_vattu}}</td>
                                       {{-- <td>{{$dt->id_kho}}</td>                                    --}}
                                        <td style="text-align:center;" class="td-actions">
                                          <a href="{{URL::route('chitiet_phieuxuat',$dt->id)}}" class="btn-sm btn-primary"><i class="fa fa-address-card">&nbsp;Xem Chi Tiết </i></a>           
                        
  
                         
                         
                     </td>
                                     <tr>
                                       
                                     </tr>
                                      @endforeach
                                   
                                    </tbody>
                               </table>
                            <!--code gọi phân trang-->
                           <!--code gọi phân trang-->                        
                           {{$data->links("pagination::bootstrap-4")}}
                           <br>
                           <div> <a href="{!! URL::route('xuatnhapton')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                
                 </div >   
              </div>
           </div>
         </div>
       @endsection

