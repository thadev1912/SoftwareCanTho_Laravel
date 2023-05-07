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
                <div class="col-lg-12">
                  
                 
                    <div class="alert alert-danger" style="margin-bottom:150px">
                         <p>Vui lòng đăng nhập để sử dụng chức năng giỏ hàng...<a href="{{URL::route('dangnhap')}}">Đăng nhập tại đây!!!</p>
                         
                      </div>
                   <!--check session cart-->
                    <!-- kết thuc  -->
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