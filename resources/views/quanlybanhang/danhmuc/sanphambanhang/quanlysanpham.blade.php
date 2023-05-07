@extends('layout.main')
@section('main_body')
<div class="card">
               <div class="card-header bg-danger">
                    <div class="row">
                                  <div class="col-md-12" align="center">
                                       <h1 class="btn text-light"> DANH SÁCH QUẢN LÝ SẢN PHẨM</h1>
                                  </div>
                    
                     </div>
</div>
</br>
<div class="card-body">

<a href="{{URL::route('them_sanpham')}}" class=" btn btn-primary"><i class="fas fa-feather">&nbsp;Thêm mới</i></a>


                  
                   @if(Session::has('thongbao'))
                      <div class="alert alert-success">
                         {{Session::get('thongbao')}}
                      </div>
                      @endif  
                   
                                <table class="table table-bordered mt-2">
                                     <thread >
                                         </tr >
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">STT</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Tên Sản Phẩm</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">Giá</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">Danh Mục Sản Phẩm</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:100px;">Hot Sale</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Hình ảnh 1</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Hình ảnh 2</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Hình ảnh 3</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Hình ảnh 4</th>
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Hình ảnh 5</th>                                           
                                            <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">TÙY CHỈNH</th>
                                          </tr>
                                     </thread>
                                    
                                     <tbody>
                                     @foreach ($sanpham as $sp)
                                     <tr>
                                       <td style="text-align:center;">{{($sanpham->currentPage() - 1)  * $sanpham->links()->paginator->perPage() + $loop->iteration }}</td>
                                        <td>{{$sp->name}}</td>
                                        <td  style="text-align: center; ">{{$sp->price}}</td>
                                        <td >{{$sp->danhmuc}}</td>  
                                        <td style="text-align: center; ">{{$sp->hot_sales}}</td>
                                        <td style="text-align: center; "><img src="../cart/img/products/{{$sp->image}}"></td>        
                                        <td style="text-align: center; "><img src="../cart/img/products/{{$sp->chitiet_image1}}"></td>                                                   
                                        <td style="text-align: center; "><img src="../cart/img/products/{{$sp->chitiet_image2}}"></td>  
                                        <td style="text-align: center; "><img src="../cart/img/products/{{$sp->chitiet_image3}}"></td>  
                                        <td style="text-align: center; "><img src="../cart/img/products/{{$sp->chitiet_image4}}"></td>  
                                        <td style="text-align: center; vertical-align: middle;" class="td-actions">
                        <a href="{{URL::route('sua_sanpham',$sp->id)}}"><i class="fas fa-edit" style="font-size:28px;color:blue"></i></a>
                        <a href="{{URL::route('xoa_sanpham',$sp->id)}}"><i class="far fa-trash-alt" style="font-size:25px;color:red"></i></a>
                    </td>
                                     </tr>
                                       @endforeach 
                                   
                                    </tbody>
                               </table>
                             <!--code gọi phân trang-->
                             {{$sanpham->links("pagination::bootstrap-4")}}
                     <br>
                     <div> <a href="{!! URL::route('gioithieu')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                  
                 
                 </div >   
              </div>
           </div>
       

      
       @endsection

