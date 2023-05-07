@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH PHÒNG BAN</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">
<div> <a href="{!! URL::route('them_pb')!!}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a> <br></div> 
                 
                   @if(Session::has('message'))
                      <div class="alert alert-success">
                         {{Session::get('message')}}
                      </div>
                      @endif
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">MÃ PHÒNG BAN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">PHÒNG BAN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($phongban as $pb)
                                     <tr>
                                       <td style="text-align:center;">{{($phongban->currentPage() - 1)  * $phongban->links()->paginator->perPage() + $loop->iteration }}</td>                                      
                                        <td>{{$pb->ma_pb}}</td>
                                        <td>{{$pb->ten_pb}}</td>                                        
                                        <td  style="text-align: center; " class="td-actions">
                        <a href="{!! URL ::Route('sua_pb',$pb->id)!!}" class="  btn"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>

                        <a href="{!! URL ::Route('xoa_pb',$pb->id)!!}" class="  btn"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                            <!--code gọi phân trang-->
                            {{$phongban->links("pagination::bootstrap-4")}}
                            <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger mt-2"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                 
                 </div >   
              </div>
           </div>
         </div>
       @endsection

