
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link type="icon/x-icon" href="{{asset('images/logodxmt.png')}}" rel="shortcut icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!--đăng ký token tại trang meta-->
    <title>Bất Động Sản Cần Thơ</title>   
    <!-- Main Styles CSS-->   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
    
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="{{asset('js/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <!--css toastr notification-->      
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> 
   
    <!--css sweet alert2 notification-->
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <!--Bdsct Css Styles---> 
  <link rel="stylesheet" href="{{ asset('bdsct/css/flash.css') }}">
  <link rel="stylesheet" href="{{ asset('bdsct/css/mycss.css') }}">  
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>    
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <!-- Cart Css Styles -->     
  <link rel="stylesheet" href="{{asset('cart/css/font-awesome.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/themify-icons.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/elegant-icons.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/owl.carousel.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/nice-select.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/jquery-ui.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/slicknav.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/detail.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('cart/css/style.css')}}" type="text/css">    
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/> 
 </head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-left" href="{!!URL::route('gioithieu')!!}">                
                <div class="sidebar-brand-text mx-3 bg-text-info">CT CP BẤT ĐỘNG SẢN CẦN THƠ</div>
            </a>         
            <!-- Divider -->        
            <!-- Divider Chức Năng-->
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-warning collapsed">
                HỆ THỐNG CHỨC NĂNG 
            </div>
             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#cn_quanlynhansu"
                    aria-expanded="true" aria-controls="quanlynhansu">
                    <i class="fas fa-user-friends"></i>
                    <span>Quản Lý Nhân Sự</span>
                </a>
                <div id="cn_quanlynhansu" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="{!!URL::route('ds_nhanvien')!!}">Thống Kê Nhân Viên</a>                        
                        <a class="collapse-item" href="{!!URL::route('hopdong')!!}"> Thống Kê Bảng Hợp Đồng </a>
                        <a class="collapse-item" href="{!!URL::route('baohiem')!!}"> Thống Kê Bảo Hiểm Xã Hội </a>
                        <a class="collapse-item" href="{!!URL::route('getform')!!}"> Lấy dữ liệu chấm công </a>
                        <a class="collapse-item" href="{!!URL::route('dulieu_chamcong')!!}"> Thống Kê Bảng Chấm Công </a>
                        <a class="collapse-item" href="{!!URL::route('phepnam')!!}"> Thống Kê Bảng Phép Năm </a>
                        <a class="collapse-item" href="{!!URL::route('bangluong')!!}"> Thống Kê Bảng Lương </a>
                        
                    </div>
                </div>
            </li>
              <!-- Nav Item - Kho Vật Tư -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#cn_quanlykhovattu"
                    aria-expanded="true" aria-controls="collapseTwentyOne">
                    <i class="fas fa-warehouse"></i>
                    <span>Quản Lý Kho Vật Tư</span>
                </a>
                <div id="cn_quanlykhovattu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{!!URL::route('nhapkho')!!}">Tạo Phiếu Nhập Kho</a>
                        <a class="collapse-item" href="{!!URL::route('xuatkho')!!}">Tạo Phiếu Xuất Kho</a>
                        <a class="collapse-item" href="{!!URL::route('ds_phieunhap')!!}">Danh Sách Phiếu Nhập</a>
                        <a class="collapse-item" href="{!!URL::route('ds_phieuxuat')!!}">Danh Sách Phiếu Xuất</a>
                        <a class="collapse-item" href="">Danh Sách Chuyển Kho</a>
                        <a class="collapse-item" href="{!!URL::route('xuatnhapton')!!}">Danh Sách Xuất Nhập Tồn </a>
                    </div>
                </div>
            </li>
              <!-- Nav Item - Shop Mobile -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#cn_quanlybanhang"
                    aria-expanded="false" aria-controls="collapseSeven">
                    <i class="fa fa-shopping-basket"></i>
                    <span>Quản lý Bán Hàng</span>
                </a>
                <div id="cn_quanlybanhang" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->                                    
                        <a class="collapse-item" href="{!!URL::route('giohang')!!}">Giỏ Hàng Sản Phẩm</a>
                        <a class="collapse-item" href="{!!URL::route('donhang')!!}">Đơn Hàng Thanh Toán</a>
                       
                        
                    </div>
                </div>
            </li>
                    <!-- Divider Chức Năng-->
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-warning collapsed">
                DANH MỤC HỆ THỐNG
            </div>
              <!-- Nav Item - Utilities Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-users-cog"></i>
                    <span>Danh Mục Nhân Viên</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->                       
                        <a class="collapse-item" href="{!!URL::route('nhanvien')!!}"> Danh Sách Nhân Viên</a>
                        
                    </div>
                </div>
            </li>
             <!-- Nav Item - Quản Lý Hợp Đồng -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-file-signature"></i>
                    <span>Danh Mục Hợp Đồng</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="{!!URL::route('hopdong')!!}">Danh Sách Hợp Đồng
                        </a>
                        
                    </div>
                </div>
            </li>
            
              <!-- Nav Item - Quản Lý Bảo Hiểm -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="false" aria-controls="collapseFour">
                    <i class="fas fa-book-medical"></i>
                    <span>Danh Mục Bảo Hiểm</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="{!!URL::route('baohiem')!!}">Danh Sách Bảo Hiểm</a>
                       
                    </div>
                </div>
            </li>
             <!-- Nav Item - Quản Lý Phép Năm -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#dm_phepnam"
                    aria-expanded="false" aria-controls="dm_phepnam">
                    <i class="fas fa-user-clock"></i>
                    <span>Danh Mục Phép Năm</span>
                </a>
                <div id="dm_phepnam" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="{!!URL::route('phepnam')!!}">Danh Sách Phép Năm</a>
                       
                    </div>
                </div>
            </li>
             <!-- Nav Item - Kho Vật Tư -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwentyOne"
                    aria-expanded="true" aria-controls="collapseTwentyOne">
                    <i class="fas fa-cogs"></i>
                    <span>Danh Mục Kho Vật Tư</span>
                </a>
                <div id="collapseTwentyOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="{{URL::route('vattukho')}}">Danh Sách Vật Tư</a>
                        <a class="collapse-item" href="{{URL::route('nhacungcap')}}">Danh Sách Nhà Cung Cấp</a>
                        <a class="collapse-item" href="{{URL::route('kho')}}">Danh Sách Kho </a>
                        <a class="collapse-item" href="{{URL::route('lydonhapkho')}}">Danh Sách Lý Do Nhập</a>
                        <a class="collapse-item" href="{{URL::route('lydoxuatkho')}}">Danh Sách Lý Do Xuất </a>
                       
                        
                    </div>
                </div>
            </li>                
                <!-- Nav Item - Danh Mục Bán Hàng -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseSeven"
                        aria-expanded="false" aria-controls="collapseSeven">
                        <i class="	fas fa-comment-dollar"></i>
                        <span>Danh Mục Bán Hàng</span>
                    </a>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                            <a class="collapse-item" href="{{URL::route('quanlysanpham')}}"> Quản Lý Sản Phẩm</a>                       
                            <a class="collapse-item" href=""> Doanh Thu Bán Hàng</a>  
                            <a class="collapse-item" href=""> Danh Sách Phiếu Xuất Hàng</a>                      
                           
                        </div>
                    </div>
                </li>
                  <!-- Nav Item - Quản Lý Tổng Hợp -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="false" aria-controls="collapseSix">
                    <i class="fas fa-user-cog"></i>
                    <span>Danh Mục Nhân Sự</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="{!!URL::route('phongban')!!}">Danh Mục Phòng Ban</a>
                        <a class="collapse-item" href="{!!URL::route('chucvu')!!}">Danh Mục Chức Vụ</a>                        
                        <a class="collapse-item" href="{!!URL::route('khenthuong')!!}">Danh Mục Khen Thưởng</a>
                        <a class="collapse-item" href="{!!URL::route('kyluat')!!}">Danh Mục Kỷ Luật</a>
                    </div>
                </div>
            </li>
          
                 
                  <!-- Nav Item -Danh Mục Tin Tức -->
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#tintuc"
                        aria-expanded="false" aria-controls="#tintuc">
                        <i class="far fa-newspaper"></i>
                        <span>Tin Tức Đất Xanh</span>
                    </a>
                    <div id="tintuc" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                            <a class="collapse-item" href="{!!URL::route('quanly_tintuc')!!}"> Quản Lý Bài Viết</a>                       
                                              
                           
                        </div>
                    </div>
                </li>
           
             
          
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-warning collapsed">
                 HỆ THỐNG PHẦN MỀM 
            </div>
             <!-- Nav Item - Phân Quyền -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseNine"
                    aria-expanded="false" aria-controls="collapseNine">
                    <i class="fas fa-wifi"></i>
                    <span>Kết nối API</span>
                </a>
                <div id="collapseNine" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="{!!URL::route('post_api')!!}">Tin Tức Đất Xanh</a>
                        <a class="collapse-item" href="{!!URL::route('nhanvien_api')!!}">Danh Sách Nhân Viên</a>
                        <a class="collapse-item" href="{!!URL::route('bangchamcong_api')!!}">Danh Sách Bảng Chấm Công</a>
                        <a class="collapse-item" href="{!!URL::route('free_api')!!}">Dữ Liệu Api free</a>
                        
                       
                        
                    </div>
                </div>
            </li>
            <!-- Nav Item - Phân Quyền -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{!!URL::route('bangluong')!!}" data-toggle="collapse" data-target="#collapseEight"
                    aria-expanded="false" aria-controls="collapseEight">
                    <i class="fas fa-user-lock"></i>
                    <span>Quản Trị Viên</span>
                </a>
                <div id="collapseEight" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                        <a class="collapse-item" href="{{URL::route('list_user')}}">Danh Sách Phân Quyền</a>
                        <a class="collapse-item" href="{{URL::route('role')}}">Danh Sách Nhóm Quyền</a>
                        <a class="collapse-item" href="{{URL::route('thongtin_khachhang')}}">Danh Sách Khách Hàng</a>
                        <a class="collapse-item" href="{{URL::route('dangnhap')}}">Đăng nhập</a>                        
                        <a class="collapse-item" href="{{URL::route('dangky')}}">Đăng Ký Thành Viên</a>
                       
                       
                        
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="modal" data-target="#lienhe"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fab fa-facebook-messenger"></i>
                    <span>Chăm Sóc Khách Hàng</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{URL::route('dangnhap')}}">Đăng nhập</a>
                        <a class="collapse-item" href="{{URL::route('dangky')}}">Đăng Ký</a>
                        <a class="collapse-item" href="">Quên mật khẩu</a>
                        <div class="collapse-divider"></div>
                        
                    </div>
                </div>
            </li>

          
      
          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
              
            <!-- Main Content -->
            <div id="content">
               
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <marquee direction="left" class="text-info font-weight-bold"><h3>CÔNG TY CỔ PHẦN DỊCH VỤ VÀ ĐẦU TƯ ĐẤT XANH MIỀN TÂY-TẦM NHÌN - SỨ MỆNH - GIÁ TRỊ CỐT LÕI </h3></marquee>
                    <!-- Sidebar Toggle (Topbar) -->
                  

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                                
                         
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">                          
                            <a class="nav-link dropdown-toggle" href="{{URL ::route('giohang')}}" id="alertsDropdown" role="button">
                                <i class="fas fa-cart-plus text-primary large"></i>
                                {{-- <i class="fas fa-bell fa-fw"></i> --}}
                                <!-- Counter - Alerts -->

                                <span class="badge badge-danger badge-counter">{{session()->get('session_count')}}</a>                              
                            
                            <!-- Dropdown - Alerts -->
                           
                       
                      <!-- Nav Item - Messages -->
                        
                      
                       
                        <!-- Nav Item - User Information -->
                       
                        @if(Auth::check())  
                                        
                        <li class="nav-item dropdown no-arrow mx1">
                            <a class="nav-link dropdown-toggle" href="{{URL::route('thoat')}}" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="text-white bg-danger rounded ">
                                {{Auth::user()->hoten}}
                                <img class="img-profile rounded-circle"
                               src="{{ asset ('images/'.Auth::user()->avatar) }}">  
                                </a>
                              
                                </span>
                                @else
                                <li class="nav-item dropdown no-arrow mx1">
                                    <a class="nav-link dropdown-toggle" href="{{URL::route('dangnhap')}}" id="userDropdown" role="button"
                                      >
                                        <span class="text-white bg-danger rounded">
                                        <strong >Đăng nhập</strong>
                                        <img class="img-profile rounded-circle"
                                        src="{{ asset ('images/avatar.png')}}">   
                                        </a>
                                      
                                        </span>
                                 
                             @endif  
                            
                       
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">                                
                                <a class="dropdown-item" href="{{URL::route('giohang')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông Tin Giỏ Hàng
                                </a>
                                <a class="dropdown-item" href="{{URL::route('donhang')}}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông Tin Đơn Hàng
                                </a>
                             
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{URL ::route('thoat')}}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thoát
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1 ">
                                                <a class="nhapnhay" href="{{URL::route('ds_nhanvien')}}" style="text-decoration: inherit;">QUẢN LÝ NHÂN SỰ</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4 ">
                            <div class="card border-left-success shadow h-100 py-2 bg-primary">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                            <a class="nhapnhay" href="{{URL::route('ds_phieunhap')}}" style="text-decoration: inherit;"> QUẢN LÝ KHO VẬT TƯ</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2 bg-warning">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-info text-uppercase mb-1 nav-item">
                                            <a class="nhapnhay" href="{{URL::route('shop')}}" style="">QUẢN LÝ BÁN HÀNG</a>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2 bg-info">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                            <a class="link-primary nhapnhay" href="{{URL::route('tintucdatxanh')}}" style="text-decoration: inherit; ">TIN TỨC ĐẤT XANH</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
            <!-- End of Main Content -->

           

                <!-- SRART RENDER BODY-->
                @yield('main_body')
                @yield('javascript')

                 <!-- SRART RENDER BODY-->
   <!--Modal Form Thêm Mới -->
   <div class="modal fade" id="lienhe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">  
      <div class="modal-content">  
        <div class="modal-header">
          <h5 class="modal-title nhapnhay" id="lienhe">&emsp;&emsp;&emsp;THÔNG TIN KHÁCH HÀNG</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" id="thongtin_kh">  
            @csrf   
             <div class="modal-body">    
               <input type="hidden" id="id">            
               <label>Họ và Tên Khách Hàng</label>
               <input id="txt_hoten_kh" name="txt_hoten_kh" class="form-control" type="text" value="">
               <small id="txt_hoten_kh_er" class="form-text text-danger d-none"></small>              
               <label>Nội Dung Tin Nhắn</label>
               <textarea id="txt_noidung_kh" name="txt_noidung_kh" class="form-control" type="text" value="" ></textarea>   
               <small id="txt_noidung_kh_er" class="form-text text-danger d-none"></small>            
               <label>Số điện thoại</label>
               <input id="txt_sdt_kh" name="txt_sdt_kh" class="form-control" type="text" value="" > 
               <small id="txt_sdt_kh_er" class="form-text text-danger d-none"></small>                
               <label>Địa Chỉ</label>
               <input id="txt_diachi_kh" name="txt_diachi_kh" class="form-control" type="text" value="" >
               <small id="txt_diachi_kh_er" class="form-text text-danger d-none"></small>             
          
              
      </div>
        
        <div class="modal-footer">                        
          <button class="btn btn-danger" data-toggle="modal" data-target="lienhe" type="submit" name="submit" value="" >Lưu Lại</button>
          <button type="button" class=" btn btn-info" data-dismiss="modal" aria-label="Close">Đóng</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
    <!--End Form Thêm Mới -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white text-danger">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-danger">
                        <p>Copyright &copy; Your Website 2022</p><br>
                        <p>© 2023 - CÔNG TY CỔ PHẦN BẤT ĐỘNG SẢN CẦN THƠ - ALL RIGHTS RESERVED <p><br>
Giấy CNĐKHĐDN: 0301455459 - Ngày cấp: 27/12/2007,
Đăng Ký thay đổi lần thứ 27 ngày 16/8/2021
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn thoát?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Lựa chọn "Thoát" nếu bạn muốn kết thúc phiên làm việc.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy Bỏ</button>
                    <a class="btn btn-primary" href="{{URL::route('thoat')}}">Thoát</a>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
 $(document).ready(function(){   
    $('#thongtin_kh').submit(function(e){
        e.preventDefault();       
        $('#txt_hoten_kh_er').text('');
        $('#txt_noidung_kh_er').text('');
        $('#txt_sdt_kh_er').text('');
        $('#txt_diachi_kh_er').text('');
        let _token= $("input[name='_token']").val();   
        console.log(_token); 
        let txt_hoten_kh=$("input[name='txt_hoten_kh']").val();
        let txt_noidung_kh=$("textarea[name='txt_noidung_kh']").val();
        let txt_sdt_kh=$("input[name='txt_sdt_kh']").val();
        let txt_diachi_kh=$("input[name='txt_diachi_kh']").val();
        $.ajax({
            url:'{{URL::route('luuthongtin_khachhang')}}',
            method: 'POST',
            header:{
                                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
                                              "Content-Type": "application/x-www-form-urlencoded",                                              
                                            }, 
            data:{_token:_token,txt_hoten_kh:txt_hoten_kh,txt_noidung_kh:txt_noidung_kh,txt_sdt_kh:txt_sdt_kh,txt_diachi_kh:txt_diachi_kh},
            success:function(res)
            {
                if(res.status==200)
                {   
                   
                    $('#lienhe').modal('hide');   
                    Swal.fire({
                            position: 'center',
                             icon: 'success',                            
                             title: 'Gửi thông tin thành công! <br>Cám ơn quý khách hàng!!!',
                             showConfirmButton: true,
  timer: 10000
})       
                }
            },
            error: function (res) 
                            {
                              
                                   var res = $.parseJSON(res.responseText);
                                   console.log(res);
                                  $.each(res.errors, function (key, value) 
                                  {
                                              
                                            $("#" + key).next().html(value[0]);  
                                            $("#" + key).next().removeClass('d-none'); 
                                                                                 
                                 });
                                 
                            }
        });
         //alert('thongtin');
    });
 });

</script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('js/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
     <script src="{{ asset('/css/main.js') }}"></script> 
   
 <!--JS Slick--> 
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script> 
    <!--JS Sweet Alert2-->
 <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
    "></script>
   
</body>

</html>