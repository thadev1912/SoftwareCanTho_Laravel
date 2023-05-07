@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH LÝ DO NHẬP KHO</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">

<a href="{{URL::route('them_lydonhapkho')}}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a>


                  
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif  
                   
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">STT</th>                                            
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">TÊN LÝ DO</th>                                  
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($lydonhapkho as $lydonk)
                                     <tr>
                                       <td style="text-align:center;">{{($lydonhapkho->currentPage() - 1)  * $lydonhapkho->links()->paginator->perPage() + $loop->iteration }}</td>                                       
                                        <td>{{$lydonk->lydo}}</td>                                                                        
                                        <td style="text-align: center; vertical-align: middle;" class="td-actions">
                        <a href="{!! URL::route('sua_lydonhapkho',$lydonk->id)!!}"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>
                        <a href="{!! URL::route('xoa_lydonhapkho',$lydonk->id)!!}"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$lydonhapkho->links("pagination::bootstrap-4")}}
                     <br>
                     <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
       

      
       @endsection

