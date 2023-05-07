
	

@extends('layout.main')
@section('main_body')
@section('javascript')
<?php
session_start();
?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
<div class="card">
    <div class="card-header bg-danger text-center ">
        <div class="row">
                      <div class="col">
                           <h1 class="btn text-light"> DANH SÁCH ĐƠN HÀNG</h1>
                      </div>
        
         </div>
      </div>
      <br>
  
     
    <!-- Shopping Cart Section Begin -->
<div class="card-body">
    <div><a href="{!! URL::route('shop')!!}" class=" btn btn-primary"><i class="fa fa-shopping-basket">&nbsp;Tiếp tục mua sắm</i></a></div>
            <div class="row">
                <div class="col-lg-12">
                   
                    
                    <div >
                    <form method="post" action="{!! URL ::route('update')!!}">
                          @csrf
                        <table class="cart-table table table-bordered mt-2">
                            <thead>
                                <tr>
                                    
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:280px;">Đơn Hàng</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:250px;">Người mua</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:150px;">Ảnh SP</th>
                                    <th class="p-name" style="text-align: center; vertical-align: middle;background: blue;color: white;width:350px;"> Sản Phẩm</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;width150px;">Giá</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:50px;">S.Lượng</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;width:200px;">Thành Tiền</th>                                   
								
                                </tr>
                            </thead>
                            @php $total=0;$qty=0;
                                       
                            @endphp
                            @foreach($donhang as $dh)
      
                           

                            
                         
                           
                            
                            
                            <tbody>
                                <tr>
                               
                                <td class="cart-pic first-row">{!!$dh->ma_dh!!}</td>
                                <td class="cart-pic first-row">{!!$dh->hoten_user!!}</td>
                                    <td style="text-align: center;" class="cart-pic first-row"><img src="img/products/{!!$dh->anh_sp!!}" style="width:80px; heigh: 80px;"alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$dh->ten_sp}}</h5>
                                    </td>
                                    <td style="text-align: center;" class="p-price first-row">{!!number_format($dh->gia),''!!}</td>
                                    <td style="text-align: center;" class="qua-col first-row">{!!$dh->sl!!}</td>                                
                                    <td style="text-align: center;" class="total-price first-row">{!!$dh->sl*$dh->gia!!}</td>
                                   
									<!-- <td class="close-td first-row"><i class="ti-close"></i></td> -->
                                </tr>
                                </tbody> 
                                @endforeach 
                                                
                        </table>
                    </div>
                  
</form>
                        </div>
                    </div>
                   
                    <!-- kết thuc  -->
                    <div> <a href="{!! URL::route('shop')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
                </div>
               
            </div>
            <!-- Shopping Cart Section End -->	
 
        </div>     

</div>

    <!-- Js Plugins -->    
    <script src="{{ asset('cart/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('cart/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('cart/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('cart/js/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('cart/js/jquery.dd.min.js')}}"></script>
    <script src="{{ asset('cart/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('cart/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('cart/js/main.js')}}"></script>
@endsection