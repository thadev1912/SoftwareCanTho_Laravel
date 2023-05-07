@extends('layout.main')
@section('main_body')

<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH KỶ LUẬT</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">
<div> <a href="{!! URL::route('them_kl')!!}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a> <br></div> 
                 
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered mt-2 ">
                                     <thread >
                                         </tr >
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white; ">STT</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white; ">MÃ NHÂN VIÊN</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white; ">TÊN NHÂN VIÊN</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px; ">SỐ TIỀN</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white; ">NGÀY KỶ LUẬT</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:550px; ">LÝ DO</th>                                          
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white; ">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($kyluat as $kl)
                                     <tr>
                                       <td style="text-align:center;">{{($kyluat->currentPage() - 1)  * $kyluat->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$kl->ma_nv}}</td>
                                        <td>{{$kl->hoten_nv}}</td>
                                        <td>{{$kl->sotien}}</td>
                                        <td style="text-align: center;">{{$kl->ngay_kyluat}}</td>
                                        <td>{{$kl->lydo}}</td>                                      
                                        <td style="text-align: center;" class="td-actions">
                        <a href="{!! URL ::route('sua_kl',$kl->ma_nv)!!}" class=""><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>

                        <a href="{!! URL ::route('xoa_kl',$kl->ma_nv)!!}" class=""><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$kyluat->links("pagination::bootstrap-4")}}
                             <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger mt-2"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
         </div>       
        

      
       @endsection

