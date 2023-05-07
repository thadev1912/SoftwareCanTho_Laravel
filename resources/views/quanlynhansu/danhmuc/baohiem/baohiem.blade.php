@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH BẢO HIỂM XÃ HỘI</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">

<a href="{!! URL::route('them_bhxh')!!}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a>
 <a href="{!! URL::route('baocao_baohiem')!!}" class=" btn btn-primary"><i class="fas fa-file-pdf">&nbsp;Xuất PDF</i></a>

                  
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif  
                   
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">STT</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">MÃ BHXH</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">HỌ TÊN NHÂN VIÊN</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">LOẠI BHXH</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">NGÀY CẤP</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">NGÀY HẾT HẠN</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:210px;">NƠI CẤP</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">NƠI KHÁM BỆNH</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($baohiem as $bh)
                                     <tr>
                                       <td style="text-align:center;">{{($baohiem->currentPage() - 1)  * $baohiem->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$bh->ma_bhxh}}</td>
                                        <td>{{$bh->hoten_nv}}</td>
                                        <td>{{$bh->loai_bhxh}}</td>
                                        <td style="text-align:center;">{{$bh->ngaycap}}</td>
                                        <td style="text-align:center;">{{$bh->ngayhethan}}</td>
                                        <td>{{$bh->noicap}}</td>
                                        <td>{{$bh->noikham}}</td>
                                        <td style="text-align: center; vertical-align: middle;" class="td-actions">
                        <a href="{!! URL::route('sua_bhxh',$bh->id)!!}"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>
                        <a href="{!! URL::route('xoa_bhxh',$bh->id)!!}"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$baohiem->links("pagination::bootstrap-4")}}
                     <br>
                     <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
       

      
       @endsection

