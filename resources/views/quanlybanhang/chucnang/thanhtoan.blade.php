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


   

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                  
                <div class="panel panel-success">
                <div class="panel-heading bg-primary">
                <form method="post" action="{!! URL ::route('chotdeal')!!}">
                    <h3 class="bg-danger text-white font-weight-bold">&nbsp;Thông tin khách hàng</h3>
                </div>
                <div class="panel-body"> <!--thông tin chi tiet khách hàng-->
                               <label>Họ và tên:</label>
                                         <input id="current-pass-control" name="txt_hoten" class="form-control" type="text" value="{{Auth::user()->hoten}}">
                                <label>Địa chỉ giao hàng:  </label>
                                         <input id="current-pass-control" name="txt_diachi" class="form-control" type="text" value="{{Auth::user()->diachi}}">
                                <label>Số điện thoại: </label>
                                         <input id="current-pass-control" name="txt_sdt" class="form-control" type="text" value="{{Auth::user()->sdt}}">
                                <label>Ghi chú:  </label>
                                         <input id="current-pass-control" name="txt_ghichu" class="form-control" type="text" value="">
                            </div>
                
            </div>
                </div>
                <div class="col-lg-8">
                <div class="cart-table table table-bordered">
                         <table>
                            <tr>
                              <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Hình Ảnh</th>
                              <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Sản Phẩm</th>
                              <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Số Lượng</th>
                              <th style="text-align: center; vertical-align: middle;background: blue;color: white;">Thành Tiền</th>
                            </tr>
                          
                                   
                                     @csrf
                                       @php $total=0;$qty=0;                                       
                                       @endphp
                                       @foreach($cart as $item)
                                       @php  $total=$total+$item['product']->price*$item['quantity']; 
                                             $qty =$qty+$item['quantity'];
                                       @endphp 
                                       <tbody>
                                        <tr>
                                            <td class="cart-pic first-row"><img src="img/products/{!!$item['product']->image!!}" style="width:80px; heigh: 80px;"alt=""></td>
                                            <td class="cart-pic first-row">{{$item['product']->name}}</td>                                
                                            <td class="cart-pic first-row">{{$item['quantity']}}</td>
                                            <td class="total-price first-row">{!!number_format($item['product']->price*$item['quantity']) !!}</td>
                                       
                                        </tr>
                                       </tbody>
                                       @endforeach
           
                                       </table> 
                                 </div>
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">Tổng Số Tiền <span>{{$tt=number_format($total)}} VNĐ</span></li>                                    
                                    <li class="cart-total">Phí Vận Chuyển <span>{{number_format(40000)}} VNĐ</span></li>
                                    <li class="cart-total">Mã giảm giá <span>{{number_format(500000)}} VNĐ</span></li>
                                    <li class="cart-total text-danger">Số Tiền Còn lại <span>{{ number_format($total-(40000+500000))}} VNĐ</span></li>
                                </ul>
                                <p></p>
                                <div class="capnhat">
                                   <a href="{{URL ::route('giohang')}}" class="form-control btn btn-primary">Quay lại giỏ hàng</a>
                                </div>
                                <p></p>
                                <div class="check_box">                               
                                <input type="radio" name="thanhtoan" value="cash" id="cash">&nbsp;&nbsp;   Thanh Toán Tiền Mặt                               
                                <div class="check_box">                               
                                <input type="radio" name="thanhtoan" value="momo" id="">&nbsp;&nbsp;   Thanh Toán MoMo
                                </div>
                                <div class="check_box">                               
                               <input type="radio" name="thanhtoan" value="vnpay" id="">&nbsp;&nbsp;   Thanh Toán VN Pay
                               </div>
                                <p></p>
                                <div class="thanhtoan">
                                  <button type="submit" class="form-control btn btn-danger" value="checkout">Thanh Toán</button>
                               </div>
                                <!-- <button class="form-control bg-primary">CẬP NHẬT GIỎ HÀNG<button>
                                <button class="form-control bg-primary">THANH TOÁN<button> -->
                            </div>
                            
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

