@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH KHO</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">

<a href="{{URL::route('them_kho')}}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a>


                  
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif  
                   
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">STT</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">MÃ KHO</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">TÊN KHO</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:380px;">ĐỊA CHỈ</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">SỐ ĐIỆN THOẠI</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">GHI CHÚ</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($kho as $kh)
                                     <tr>
                                       <td style="text-align:center;">{{($kho->currentPage() - 1)  * $kho->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$kh->ma_kho}}</td>
                                        <td>{{$kh->ten_kho}}</td>
                                        <td >{{$kh->dia_chi}}</td>  
                                        <td style="text-align: center; ">{{$kh->so_dien_thoai}}</td>
                                        <td style="text-align: center; ">{{$kh->ghi_chu}}</td>                                                   
                                        <td style="text-align: center; vertical-align: middle;" class="td-actions">
                        <a href="{{URL::route('sua_kho',$kh->id)}}"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>
                        <a href="{{URL::route('xoa_kho',$kh->id)}}"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$kho->links("pagination::bootstrap-4")}}
                     <br>
                     <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
       

      
       @endsection

