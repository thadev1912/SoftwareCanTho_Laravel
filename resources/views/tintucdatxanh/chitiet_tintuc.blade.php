@extends('layout.main')
@section('main_body')
<div class="row">  <!--||VÙNG CHIA DIV THÀNH 2 PHẦN||-->
    <div class=" col-sm-2  text-uppercas">
    <ul class="list-group">
         <li class="list-group-item active">
         DANH MỤC TIN TỨC
                <span class="badge"></span>
                
         </li>
       
         <li class="list-group-item list-group-item"><a href="{{URL::route('tintucdatxanh')}}#tttt">Tin Tức Thị Trường</a></li>
         <li class="list-group-item list-group-item"><a href="{{URL::route('tintucdatxanh')}}#vhdx">Văn Hóa Đất Xanh</a></li> 
    </ul>
           
         
     
                     <div class="card-body">
                     
</div>
                    
    </div>
    <div class ="col-sm-10 border ">
    <div class="section-header">
                                    
                                    <h2 class="text-uppercase">  {!!$data->danhmuc_tintuc !!}</h2>
                           </div>
                           <div class="title text-uppercase">
                                 <h3>{!!$data->tieude_tintuc !!}</h3>
                           </div><br>
                           <div class="content text-justify ">
                                <p> {!!$data->noidung_tintuc !!}</p>
                           </div>
@endsection