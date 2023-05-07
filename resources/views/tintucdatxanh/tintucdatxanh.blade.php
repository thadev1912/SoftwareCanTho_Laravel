@extends('layout.main')
@section('main_body')

<div class="body">
<div class="row"> <!--nên đặt chữ row thôi--->


    
                                     <div class="col-8">  <!--cột bên trái1-->
                                      <section id="tttt">
                                      <div class="section-header" data-aos="fade-up" data-aos-duration="6000">                                              
                                        <h2>  TIN TỨC THỊ TRƯỜNG</h2>
                                    </div>
                                     <div class="news row "><!--create one line -->
                                     
                                                <!--thông tin đầu tiên-->
                                                @foreach ($tintucthitruong as $tttt)
                                          <div class="subnew col-lg-4" data-aos="fade-up-left" data-aos-durartion="6000">
                                                <div class="card">
                                                        <div class="card-img">
                                                     <figure><img src="{{asset('images/'.$tttt->anhdaidien_tintuc)}}" style="width:100%;height:300px;" alt="" class="img-fluid"></figure>
                                                        </div>
                                                        <div class="content text-justify" style="height:180px">
                                                          <div class="bv_title"><h4><a href="{{URL::route('chitiet_tintuc',$tttt->id)}}" class="stretched-link">{{$tttt->tieude_tintuc}}</a></h4></p></div>
                                                             
                                                           <p>  {!! Illuminate\Support\Str::limit($tttt->noidung_tintuc, 240, $end='...') !!}<p><!-- code cắt chữ-->
                                                       </div>
                                                          </div>
                                          </div><!-- End  -->
                                          @endforeach     
                                        </div> <!--kêt thúc cột bên trái1-->
                                      </section>
                                        <!--bắt đầu cột bên trái2-->
                                        <section id="vhdx">
                                        <div class="section-header" data-aos="fade-up" data-aos-duration="6000">                                              
                                          <h2>  VĂN HÓA ĐẤT XANH</h2>  
                                     </div>
                                       <div class="news row "><!--create one line -->
                                       
                                                  <!--thông tin đầu tiên-->
                                                  @foreach ($vanhoadatxanh as $vhdx)
                                            <div class="subnew col-lg-4" data-aos="fade-up-left" data-aos-durartion="6000">
                                                  <div class="card">
                                                          <div class="card-img">
                                                       <figure><img src="../images/{{$vhdx->anhdaidien_tintuc}}" style="width:100%;height:300px;" alt="" class="img-fluid"></figure>
                                                       
                                                      </div>
                                                          <div class="content text-justify" style="height:180px">
                                                             <div class="bv_title"><h4><a href="{{URL::route('chitiet_tintuc',$vhdx->id)}}" class="stretched-link">{{$vhdx->tieude_tintuc}}</a></h4></p></div>
                                                                
                                                              <p>  {!! Illuminate\Support\Str::limit($vhdx->noidung_tintuc, 240, $end='...') !!}<p><!-- code cắt chữ-->
                                                          </div>
                                                            </div>
                                            </div><!-- End  -->
                                            @endforeach     
                                          </div> <!--kêt thúc cột bên trái2-->
                                        </section>
                                          </div>    <!--kết thúc col-8--->                                     
                                          <div class="col-4">  <!--cột san pham bán hàng-->
                                            <div class="section-header" data-aos="fade-up" data-aos-duration="6000">                                              
                                                    <h2 class="nhapnhay">  SẢN PHẨM HOT NHẤT THÁNG</h2>                                             
                                           </div>
                                           <div class="sales col-12 "><!--create one line -->
                                       
                                            <!--thông tin đầu tiên-->
                                            @foreach ($hot_sales as $hs)
                                      <div class="subnew col-12" data-aos="fade-up-left" data-aos-durartion="6000">
                                            <div class="card">
                                                    <div class="card-img">
                                                      <span class="dat_coc nhapnhay"><b>ĐẶT CỌC NGAY!!<b></span>
                                                <img src="../cart/img/products/{{$hs->image}}" style="width:100%;height:300px;" alt="" class="img-fluid">
                                                    </div>
                                                    <div class="content text-justify" style="height:50px">
                                                      <div class="title_hot_sales"><h4><a href="{!! URL ::route('chitiet_sanpham',$hs->id)!!}" class="stretched-link">{{$hs->name}}</a></h4></p></div>
                                                         
                                                       <p class="nhapnhay"> Giá Hiện Tại: {{$hs->price}}VNĐ<p><!-- code cắt chữ-->
                                                   </div>
                                                    
                                                      </div>
                                      </div><!-- End  -->
                                      @endforeach    
                                      
                                    </div> <!--kêt thúc cột bên trái2-->
                                   
                                          </div><!--kết thúc cột san pham bán hàng-->  
                                        </div>   
                                      </div>
                                    <script type="text/javascript" >
      AOS.init();
     
 $(document).ready(function(){
                                       
  $('.news').slick(
    {
     
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows:false,
      infinite: true, 
    
});
});
//sales

    </script>
    @endsection