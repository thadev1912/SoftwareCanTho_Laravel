<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link type="icon/x-icon" href="{{asset('images/logodxmt.png')}}" rel="shortcut icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bất Động Sản Cần Thơ</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <script src="js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
    
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
      
        <style>
          body{
            background-image: url('images/bg_bdsct.jpg')
            
          }
          .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
} 
        </style>
    </head>
    <body>
    {{-- <form method="POST" action="{{URL::route('xulydangnhap')}}">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" /> --}}
    <section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="{{ asset('/images/logodxmt.png')}}"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Chào mừng đến với Công ty BĐSCT</h4>
                  @if(Session::has('thongbao'))
                  <div class="alert alert-danger">
                     {{Session::get('thongbao')}}
                  </div>
                  @endif
                </div>
                <form method="POST" action="{{URL::route('xulydangky')}}">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="username" class="form-control font-italic" placeholder="Tài khoản..."value="{!! old('username') !!}">                    
                  </div>
                  @error('username')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                    </div>
                    <input type="text" name="hoten" class="form-control font-italic" placeholder="Họ Tên..." value="{!! old('hoten') !!}">                    
                  </div>
                  @error('hoten')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control font-italic" placeholder="Email..." value="{!! old('email') !!}">                    
                  </div>
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="sdt" class="form-control font-italic" placeholder="Số điện thoại..."value="{!! old('sdt') !!}">                    
                  </div>
                  @error('sdt')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                    </div>
                    <input type="text" name="diachi" class="form-control font-italic" placeholder="Địa chỉ..."value="{!! old('diachi') !!}">                    
                  </div>
                  @error('diachi')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="pass" class="form-control font-italic" placeholder="Mật khẩu..."value="{!! old('pass') !!}">
                  </div>
                  @error('pass')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit" type="button">ĐĂNG KÝ NGAY
                    </button>
                    <a href="{{URL::route('dangnhap')}}"  class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="submit">QUAY LẠI
                    </a>
                  </div>
                 
                </form>
                {{-- <form>
                 

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Tài Khoản </label>
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Phone number or email address" />
        
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Mật Khẩu</label>
                    <input type="password" id="form2Example22" class="form-control" />
                  
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">ĐĂNG NHẬP
                    </button>
                    <a class="text-muted" href="#!">Quên mật khẩu?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Bạn chưa có Tài Khoản</p>
                    <button type="button" class="btn bg-info"> Đăng Ký</button>
                  </div>

                </form> --}}

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">KIÊN TRÌ-TIẾN LÊN-HIỆU QUẢ</h4>
                <p class="small mb-0 font-italic text-justify">Mang trong mình khát vọng mãnh liệt – chinh phục vùng đất mới, những người con của Đất Xanh bằng ý chí, quyết tâm của mình đã dựng xây nền móng vững chãi để chinh phục những mục tiêu cao hơn. Ban lãnh đạo nhiệt huyết, tư duy sắc bén cùng đội ngũ quản lý trẻ, sung sức, tài năng, trung thành, chính trực đã giúp Đất Xanh Miền Tây có được những thành quả tự hào – dẫn đầu khu vực Đồng bằng sông Cửu Long trong lĩnh vực môi giới, củng cố thế và lực trở thành Nhà phát triển dự án bất động sản tốt nhất khu vực.</p>
                <img src="{{ asset('/images/cbnv.jpg')}}" class="circle img-thumbnail mt-2" style="width:350px;height:280px"alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
