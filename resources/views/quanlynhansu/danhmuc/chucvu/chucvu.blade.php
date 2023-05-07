@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH CHỨC VỤ</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">
<div> <a href="{!! URL::route('them_cv')!!}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a> <br></div> 
                
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered mt-2 ">
                                     <thread >
                                         </tr >
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white; with:380px;">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;with:380px;">MÃ CHỨC VỤ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;with:380px;">CHỨC VỤ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white; with:180px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($chucvu as $cv)
                                     <tr>
                                        <td  style="text-align: center;">{{$cv->id}}</td>
                                        <td>{{$cv->ma_cv}}</td>
                                        <td>{{$cv->ten_cv}}</td>
                                        
                                        <td  style="text-align: center;" class="td-actions">
                        <a href="{!! URL ::Route('sua_cv',$cv->id)!!}" class="  btn"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>
                        <a href="{!! URL ::Route('xoa_cv',$cv->id)!!}" class="  btn"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                            <!--code gọi phân trang-->
                            {{$chucvu->links("pagination::bootstrap-4")}}
                            <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger mt-2"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                 
                 
                 </div >   
              </div>
           </div>
         </div>
     
       @endsection

