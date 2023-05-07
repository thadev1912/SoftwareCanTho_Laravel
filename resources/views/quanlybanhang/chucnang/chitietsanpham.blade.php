@extends('layout.main')
@section('main_body')
@section('javascript')
	

		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="show"><img src="../img/products/{{$data->image}}" style="width:850px;height:450px;"/></div>						
						</div>
						<ul class=" detail preview-thumbnail nav nav-tabs">
						  <li><a data-target="" data-toggle="tab" class="detail" ><img src="../img/products/{{$data->chitiet_image1}}"/></a></li>
						  <li><a data-target="" data-toggle="tab" class="detail" ><img src="../img/products/{{$data->chitiet_image2}}" /></a></li>
						  <li><a data-target="" data-toggle="tab" class="detail"><img src="../img/products/{{$data->chitiet_image3}}" /></a></li>
						  <li><a data-target="" data-toggle="tab" class="detail"><img src="../img/products/{{$data->chitiet_image4}}"/></a></li>
						  <li><a data-target="" data-toggle="tab" class="detail"><img src="../img/products/{{$data->image}}" /></a></li>
						  <script>					
							$('.detail>img').on("click",function(e)
							{
								const image = document.getElementById("show");	
								//alert('đúng rồi!!!');
						        var get=$(this).attr('src');							  
							    console.log(get);
								$('#show>img').attr('src',get);
							
						                                      
						  });                  
						  </script>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$data->name}}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
							</div>
							<span class="review-no">{{$data->views}} lượt view</span>
						</div>
						<p class="product-description text-justify font-weight-bold">{{$data->noidung_sp}}</p>
						<h4 class="price">GIÁ KÍCH HOẠT: <span>{{number_format($data->price),''}} VNĐ</span></h4>
						<p class="price"><strong> Sản phẩm được Chiết Khấu <span>10%</span></strong><br> Hỗ trợ trả góp vay từ ngân hàng VietCombank <strong><span>0%</span></strong> Lãi Suất</p>
						
						
						<div class="action">
							<a href="{!! URL::route('buy',$data->id) !!}" class=" btn btn-primary"><i class="fas fa-shopping-cart">&nbsp;Mua Ngay</i></a>							
							<a href="{!! URL::route('shop') !!}" class=" btn btn-danger"><i class="fas fa-reply-all">&nbsp;Quay lại</i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

    @endsection
  