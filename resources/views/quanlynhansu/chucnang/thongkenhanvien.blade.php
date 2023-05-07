@extends('layout.main')
@section('main_body')
      
          <div class="card">      
               <div class="card-header bg-danger text-center ">
                    <div class="row">
                                  <div class="col">
                                       <h1 class="btn text-light"> DANH SÁCH NHÂN VIÊN</h1>
                                  </div>
                    
                     </div>
</div>
</br>

<div class="card-body">
<div class="form-row"> <!--thuộc tính form-row nó giúp chia 2 cột trên 1 row của nó-->
<div class="col-lg-10">
   <form class="form-inline" action="" method="GET">
             <input class="form-control mr-1 font-italic" type="search" name="tk_maten" placeholder="Tìm theo tên" aria-label="Search">&nbsp; &nbsp;
            <!--Phòng Ban-->
           
            <select name="tk_phongban" id="tk_phongban" class="form-select form-control">
               <option value="">--Xem Theo Phòng Ban--
               @foreach ($phongban as $key => $pb)                   
                   <option value="{{$pb->ma_pb}} " {{old('tk_phongban') == $pb->ma_pb ? "selected" :""}}>{{$pb->ten_pb}}</option>
               @endforeach
            </select> &nbsp; &nbsp;
            <select name="tk_chucvu" class="form-select form-control">
               <option value="">--Xem Theo Chức Vụ--
               @foreach ($chucvu as $cv)
               <option value="{{$cv->ma_cv}}">{{$cv->ten_cv}}</option>                  
                                 @endforeach
               </select> &nbsp; &nbsp; 
               <select name="tk_gioitinh" class="form-select form-control">
                  <option value="">--Xem Theo Giới Tính--
                  @foreach ($gioitinh as $gt)
                  <option value="{{$gt->gioitinh_nv}}">{{$gt->gioitinh_nv}}</option>                  
                                    @endforeach
                  </select> &nbsp; &nbsp; 
                  <select name="tk_tinhtrang" class="form-select form-control">
                     <option value="">--Xem Trạng Thái Hoạt Động--
                     @foreach ($tinhtrang as $tt)
                     <option value="{{$tt->tinhtrang}}">{{$tt->tinhtrang}}</option>                  
                                       @endforeach
                     </select> &nbsp; &nbsp; 
                    
             
             <button class="btn btn-primary" type="submit"><i class="fa fa-search">Tìm Kiếm</i></button>
  </form>
 
   
   
</div>
<div class="col-lg-1 float-right">    
   <a href="{!! URL::route('baocao_nhanvien')!!}" class=" btn btn-primary  "><i class="fas fa-file-pdf"> Xuất PDF</i></a>    
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
                                       <tr class="table-primary">
                                          <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:8px;">STT</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:90px;">MÃ SỐ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:170px;">TÊN NHÂN VIÊN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:240px;">PHÒNG BAN</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:220px;">CHỨC VỤ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white">ĐỊA CHỈ</th>
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:120px;">GIỚI TÍNH</th> 
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">TÌNH TRẠNG</th>                                          
                                           <th style="text-align: center; vertical-align: middle;background: blue;color: white; width:200px;" >TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($result as $sv)
                                     <tr>
                                       <td style="text-align:center;">{{($result->currentPage() - 1)  * $result->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$sv->ma_nv}}</td>
                                        <td>{{$sv->hoten_nv}}</td>
                                        <td>{{$sv->ten_pb}}</td>
                                        <td style="text-align:center;">{{$sv->ten_cv}}</td>
                                        <td>{{$sv->diachi_nv}}</td>                                        
                                        <td>{{$sv->gioitinh_nv}}</td>
                                        <td>{{$sv->tinhtrang}}</td>
                                        <td style="text-align:center" class="td-actions">
                                        <a href="{!! URL::route('chitiet_nhanvien',$sv->ma_nv)!!}" class="btn-sm btn-primary"><i class="fa fa-address-card">&nbsp;Xem Chi Tiết</i></a>           
                      

                       
                       
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$result->links("pagination::bootstrap-4")}}
                             <br>
           <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>   
           </div>
                  
                 
                 </div >   
              </div>
            </div>
          
      
       @endsection

