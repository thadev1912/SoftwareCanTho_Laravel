
@extends('layout.main')
@section('main_body')
@section('javascript')
    <!-- Google Font -->

    <div id="preloder">
        <div class="loader"></div>
    </div>

    
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="#">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!---TÌM KIẾM--->
                    <div class="row-lg-12 col-md-12 float-left">
                        <div class="col-6 advanced-search">
                            <button type="button" class="category-btn">Tìm kiếm</button>
                            <form action="#" id="timkiem_shop" class="input-group">
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                <input type="text" name="txt_search"  placeholder="Nhập từ khóa cần tìm">                               
                                <button type="button" class="float-right"><i class="ti-search lagre"></i></button>
                            </form>
                            <table class="list table table-bordered z-index:1090" id="list">                               
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
 
    </header>
    <!--Header End -->

    
      <!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Product Shop Section Begin -->

 
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
     
<!--danh mục điện thoại-->
<div class="row slider">
 
                        @foreach($canthos as $ct)
                            <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                                     <div class="pi-pic">
                                                                     <img src="../cart/img/products/{{$ct->image}}" alt="">
                                                                     <div class="sale pp-sale">Sale</div>
                                                                            <div class="icon">
                                                                                 <i class="icon_heart_alt"></i>
                                                                            </div>
                                                                 <ul>
                                                                           <li class="quick-view"><a href="{!! URL ::route('chitiet_sanpham',$ct->id)!!}"><i class="fas fa-eye">&nbsp;Chi Tiết</i></a></li>
                                                                           <li class="quick-view"><a href="{!! URL ::route('buy',$ct->id)!!}"><i class="fa fa-shopping-basket">&nbsp;Mua Ngay</i></a></li>
                                                                           <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                                                 </ul>
                                                     </div>
                                                     <div class="pi-text">
                                                                       <div class="catagory-name">{{$ct->danhmuc}}</div>
                                                                                <a href="#">
                                                                                               <h5>{{$ct->name}}</h5>
                                                                                </a>
                                                                       <div class="product-price">
                                                                                    {{number_format($ct->price),''}} VNĐ
                                                                      </div>
                                                    </div>
                                         </div>
                            </div>

                            @endforeach
                            
            
</div>
<!-- kết thúc danh mục điện thoại-->  
<!--danh mục dong ho-->
<div class="row slider">
                        @foreach($soctrangs as $st)
                            <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                                     <div class="pi-pic">
                                                                     <img src="../cart/img/products/{{$st->image}}" alt="">
                                                                     <div class="sale pp-sale">Sale</div>
                                                                            <div class="icon">
                                                                                 <i class="icon_heart_alt"></i>
                                                                            </div>
                                                                 <ul>
                                                                           <li class="quick-view"><a href="{!! URL ::route('chitiet_sanpham',$st->id)!!}"><i class="fas fa-eye">&nbsp;Chi Tiết</i></a></li>
                                                                           <li class="quick-view"><a href="{!! URL ::route('buy',$st->id)!!}"><i class="fa fa-shopping-basket">&nbsp;Mua Ngay</i></a></li>
                                                                           <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                                                 </ul>
                                                     </div>
                                                     <div class="pi-text">
                                                                       <div class="catagory-name">{{$st->danhmuc}}</div>
                                                                                <a href="#">
                                                                                               <h5>{{$st->name}}</h5>
                                                                                </a>
                                                                       <div class="product-price">
                                                                                    {{number_format($st->price),''}} VNĐ
                                                                      </div>
                                                    </div>
                                         </div>
                            </div>

                            @endforeach
                            
            
</div>
<!-- kết thúc danh mục điện thoại-->  
  <!-- show san pham laptop-->                  
  <div class="row slider">
                        @foreach($haugiangs as $hg)
                            <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                                     <div class="pi-pic">
                                                                     <img src="../cart/img/products/{{$hg->image}}" alt="">
                                                                     <div class="sale pp-sale">Sale</div>
                                                                            <div class="icon">
                                                                                 <i class="icon_heart_alt"></i>
                                                                            </div>
                                                                 <ul>
                                                                           <li class="quick-view"><a href="{!! URL ::route('chitiet_sanpham',$hg->id)!!}"><i class="fas fa-eye">&nbsp;Chi Tiết</i></a></li>
                                                                           <li class="quick-view"><a href="{!! URL ::route('buy',$hg->id)!!}"><i class="fa fa-shopping-basket">&nbsp;Mua Ngay</i></a></li>
                                                                           <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                                                 </ul>
                                                     </div>
                                                     <div class="pi-text">
                                                                       <div class="catagory-name">{{$hg->danhmuc}}</div>
                                                                                <a href="#">
                                                                                               <h5>{{$hg->name}}</h5>
                                                                                </a>
                                                                       <div class="product-price">
                                                                                    {{number_format($hg->price),''}} VNĐ
                                                                      </div>
                                                    </div>
                                         </div>
                                        
                            </div>

                            @endforeach
                            
                            
</div>
              
 <!-- end show san pham laptop-->


<script type="text/javascript" >
 $(document).ready(function(){
                                        $('#list').removeClass('d-none');
  $('.slider').slick(
    {
     
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows:false,
    
});
});
     $('#list').fadeOut();  
       
$('#timkiem_shop').keyup(function(){
    $('#list').html('');
    var search = $("input[name='txt_search']").val();//lấy gía trị ng dùng gõ
    //var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
    //console.log(search);
    if(search!='')
   
    {
       
    $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        
       url:'{{URL::route('timkiem_sanpham')}}',
        type:'GET',
        data:{search:search},
        dataType:'json', // cái này quan trọng
        success : function(res)
        {
            //console.table(res.data);
            let info= res.data.timkiem;
            console.table(info);            
            $('#list').fadeIn('slow');  
            $('#list').html('');
           
           //    $('#list').html(res.data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
            $.each(info,function(i,item)
            {
                $('#list').append('<tr>\
                <td><a href="../cart/chitietsanpham/'+item.id+'"><img src="../cart/img/products/'+item.image+'"style="width:30px;height:30px"></a></td>\
                <td><a href="../cart/chitietsanpham/'+item.id+'">'+item.name+'</a></td>\
                <td>'+item.price+'</td>\
                </tr>');  
                    $('#list').append('</hr>');         
            });
           
           
        }
       
    });
  //  $('#list').html('');
}
else{
    $('#list').fadeOut();  

}
});

                                   
</script>
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->  
    <script src="{{asset('cart/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('cart/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('cart/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('cart/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('cart/js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('cart/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('cart/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('cart/js/main.js')}}"></script>   

@endsection