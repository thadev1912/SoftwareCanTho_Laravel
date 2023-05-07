@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> QUẢN LÝ TIN TỨC ĐẤT XANH</h1>
                                  </div>
                    
                     </div>
</div>
</br>

                   <div class="card-body">
                     <div> <a href="{!! URL::route('themmoi_tintuc')!!}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a> <br></div> 
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:10px;">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">TIÊU ĐỀ BÀI VIẾT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">NỘI DUNG BÀI VIÊT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:80px;">DANH MỤC BÀI VIÊT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:30px;">ẢNH BÀI VIẾT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:80px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($data as $dt)
                                     <tr> 
                                       <td style="text-align:center;">{{($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$dt->tieude_tintuc}}</td>
                                        <td>{!! Illuminate\Support\Str::limit($dt->noidung_tintuc, 148, $end='...') !!}</td>
                                        <td>{{$dt->danhmuc_tintuc}}</td>
                                        <td style="text-align: center; "class="mt-2"><img src="../images/{{$dt->anhdaidien_tintuc}}" style="width:100px;height:70px;" alt=""></td>
                                        
                                        
                                        <td style="text-align: center; " class="td-actions">
                        <a href="{!! URL ::Route('sua_tintuc',$dt->id)!!}" class="btn mt-3"><i class="btn-icon-only icon-edit"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></i></a>

                        <a href="{!! URL ::Route('xoa_tintuc',$dt->id)!!}" class="btn mt-3"><i class="btn-icon-only icon-remove "><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                            <!--code gọi phân trang-->
                           <!--code gọi phân trang-->
                           {{$data->links("pagination::bootstrap-4")}}
                           <br>
                           <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                 
                 
                 </div >   
              </div>
           </div>
         </div>

       @endsection

