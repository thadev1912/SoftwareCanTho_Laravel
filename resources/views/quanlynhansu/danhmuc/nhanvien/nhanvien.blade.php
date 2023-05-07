@extends('layout.main')
@section('main_body')
<div class="card">
          
        
               <div class="card-header bg-danger text-center">
                    <div class="row">
                                  <div class="col-12 text-center">
                                       <h1 class="btn text-light"> DANH SÁCH NHÂN VIÊN</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">
<div>
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col-3 ">
   <form class="form-inline" action="{!! route('timkiem')!!}" method="GET">
             <input class="form-control mr-1 font-italic" type="search" name="timkiem" placeholder="Tìm kiếm theo tên" aria-label="Search">
             <button class="btn btn-primary" type="submit"><i class="fa fa-search">Tìm Kiếm</i></button>
  </form>
</div>
<div class="col-lg-1 ">
    <a href="{!! URL::route('them_nv')!!}" class="btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a>
</div>
</div>
<br>
                  
                  
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif
                                <table class="table table-bordered ">
                                     <thread >
                                         </tr >
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white; with:10px;">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:110px;">MÃ NHÂN VIÊN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">HỌ TÊN NHÂN VIÊN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:350px;">ĐỊA CHỈ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">GIỚI TÍNH</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">SỐ ĐIỆN THOẠI</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">CHỨC VỤ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">PHÒNG BAN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($nhanvien as $sv)
                                     <tr>
                                       <td style="text-align:center;">{{($nhanvien->currentPage() - 1)  * $nhanvien->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$sv->ma_nv}}</td>
                                        <td>{{$sv->hoten_nv}}</td>
                                        <td>{{$sv->diachi_nv}}</td>
                                        <td>{{$sv->gioitinh_nv}}</td>
                                        <td  style="text-align: center;">{{$sv->sdt_nv}}</td>
                                        <td>{{$sv->ten_cv}}</td>
                                        <td>{{$sv->ten_pb}}</td>
                                        <td style="text-align: center; vertical-align: middle;" class="td-actions">
                        <a href="{!! URL ::route('sua_nv',$sv->id)!!}" class=""><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>
                        <a href="{!! URL ::route('xoa_nv',$sv->id)!!}" class=""><i class="far fa-trash-alt" style="font-size:25px;color:red"></i>
                        </a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$nhanvien->links("pagination::bootstrap-4")}}
                             <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger mt-2"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
         </div>     

       @endsection

