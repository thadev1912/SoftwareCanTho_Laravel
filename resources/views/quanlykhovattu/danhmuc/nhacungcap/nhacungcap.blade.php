@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH VÂT TƯ</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">

<a href="{{URL ::route('them_nhacungcap')}}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a>


                  
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif  
                   
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">STT</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">MÃ NHÀ CUNG CẤP</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:300px;">TÊN NHÀ CUNG CẤP</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:350px;">ĐỊA CHỈ NHÀ CUNG CẤP</th>
                                      
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($nhacungcap as $ncc)
                                     <tr>
                                       <td style="text-align:center;">{{($nhacungcap->currentPage() - 1)  * $nhacungcap->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$ncc->ma_nhacc}}</td>
                                        <td>{{$ncc->ten_nhacc}}</td>
                                        <td>{{$ncc->diachi_nhacc}}</td>                                     
                                        <td style="text-align: center; vertical-align: middle;" class="td-actions">
                        <a href="{{URL::route('sua_nhacungcap',$ncc->id)}}"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>
                        <a href="{{URL::route('xoa_nhacungcap',$ncc->id)}}"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$nhacungcap->links("pagination::bootstrap-4")}}
                     <br>
                     <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
       

      
       @endsection

