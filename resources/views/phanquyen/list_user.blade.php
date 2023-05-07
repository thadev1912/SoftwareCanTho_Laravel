@extends('layout.main')
@section('main_body')
 
        <div class="card">         
                    <div class="card-header bg-danger">
                               <div class="row">
                                     <div class="col-md-12" align="center">
                                            <h1 class="btn text-light"> DANH SÁCH TÀI KHOẢN</h1>
                                     </div>                                  
                               </div>
                    </div>            
          <div class="card-body "> 
          <table class="table table-bordered ">
                                     <thread >
                                         </tr >
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:20px;">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">TÀI KHOẢN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">HỌ TÊN </th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:20px;">EMAIL</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:30px;">SDT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:350px;">ĐỊA CHỈ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:210px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($data as $dt)
                                     <tr>
                                        <td style="text-align:center;">{{($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</td>  
                                        <td>{{$dt->name}}</td>
                                        <td>{{$dt->hoten}}</td>
                                        <td>{{$dt->email}}</td>
                                        <td>{{$dt->sdt}}</td>
                                        <td>{{$dt->diachi}}</td>
                                        <td style="text-align: center;" class="td-actions">
                        <a href="{{URL::route('add_user_role',$dt->id)}}" class="btn-sm btn-primary"><i class="	fas fa-address-book">&nbsp; Phân Quyền</i></a>|
                        <a href="{{URL::route('xoa_user',$dt->id)}}" class="btn-sm btn-danger"><i class="	fas fa-address-book">&nbsp; Xóa User</i></a>
                          
                        </a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                               <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
         </div>
 
</div>




    

   
    @endsection
