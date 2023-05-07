<?php
session_start();
?>
@extends('layout.main')
@section('main_body')
@section('javascript')

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    <div class="card">
        <div class="card-header bg-danger text-center ">
            <div class="row">
                          <div class="col">
                               <h1 class="btn text-light"> DANH SÁCH GIỎ HÀNG</h1>
                          </div>
            
             </div>
          </div>
          <br>
      
    <!-- Shopping Cart Section Begin -->

        <div class="card-body">
            <div><a href="{!! URL::route('shop')!!}" class=" btn btn-primary"><i class="fa fa-shopping-basket">&nbsp;Tiếp tục mua sắm</i></a></div>
            <div class="row">
                <div class="col-lg-12">
                    
                    <!--check session cart-->
                    @if(Session::has('cart'))
                    
                    <div class="cart-table table table-bordered mt-2">
                    <form method="post" action="{!! URL ::route('update')!!}">
                          @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Ảnh SP</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Tên Sản Phẩm</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Giá</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Số lượng</th>
                                    <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Tổng cộng</th>                                   
									<th style="text-align: center; vertical-align: middle;background: blue;color: white;">Xóa SP</th>
                                </tr>
                            </thead>
                            @php $total=0;$qty=0;
                                       
                            @endphp
                            @foreach($cart as $item)
                            @php  $total=$total+$item['product']->price*$item['quantity']; 
                                  $qty =$qty+$item['quantity'];
                            @endphp 

                            
                         
                           
                            
                            
                            <tbody>
                                <tr>
                                    <td class="cart-pic first-row"><img src="img/products/{!!$item['product']->image!!}" style="width:80px; heigh: 60px;"alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$item['product']->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">{!!number_format($item['product']->price),''!!}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$item['quantity']}}" name="quantity[]">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{!!number_format($item['product']->price*$item['quantity']) !!}</td>
                                    <td><a href="{!! URL ::route('remove',$item['product']->id)!!}" class="btn mt-2"><i class="far fa-trash-alt" style="font-size:28px;color:red"></i></a></td>
									
                                </tr>
                                </tbody> 
                                @endforeach 
                                                
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng Số Tiền <span>{{number_format($total),}}</span></li>
                                    <li class="cart-total">Số lượng <span>{{number_format($qty),}}</span></li>
                                </ul>
                                <p></p>
                                <div class="capnhat">
                                   <button type="submit" class="form-control btn btn-primary">Cập nhật giỏ hàng</button>
                                </div>
                               
                                <p></p>
                                <div class="thanhtoan">
                                  <a href="{{URL ::route('payment')}}" class="form-control btn btn-danger" value="checkout">Đặt Hàng Ngay</a>
                               </div>
                                <!-- <button class="form-control bg-primary">CẬP NHẬT GIỎ HÀNG<button>
                                <button class="form-control bg-primary">THANH TOÁN<button> -->
                            </div>
</form>

                        </div>
                       
                    </div>
                    @else
                    <div class="alert alert-danger" style="margin-bottom:150px">
                         <p>Giỏ hàng đang trống. Vui lòng quay lại trang chủ mua sắm thêm....</p>
                         
                      </div>
                    @endif    <!--check session cart-->
                    <!-- kết thuc  -->
                    
                </div>
            </div>
            <div> <a href="{!! URL::route('shop')!!}" class=" btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại</i></a> <br></div>
        </div>
        </div>
    <!-- Shopping Cart Section End -->	

    

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