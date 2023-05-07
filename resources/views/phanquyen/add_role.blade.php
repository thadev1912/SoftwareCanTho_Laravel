@extends('layout.main')
@section('main_body')

        <div class="card">         
                    <div class="card-header bg-danger">
                               <div class="row">
                                     <div class="col-md-12" align="center">
                                            <h1 class="btn text-light"> DANH SÁCH NHÓM QUYỀN</h1>
                                     </div>                                  
                               </div>
                    </div>            
          <div class="card-body "> 
             <!-- Phần content các permission -->
               <div class="col">
               
               </div>
              <div class="col-12">
              
   <form action="{{URL::route('luu_role')}}" method="POST">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            
    <label for="sel1" class="form-label text-danger">Điền tên nhóm quyền bên dưới:</label>
    <input class="form-control mr-1 font-italic" type="text" name="ten_quyen" placeholder="Thêm tên nhóm">
   <br>
   {{-- <form class="form-inline" action="" method="GET">
   <label for="sel1" class="form-label text-danger">Tìm kiếm</label>
             <input class="form-control font-italic" type="search" name="search_route" placeholder="Tìm theo tên" aria-label="Search">
            
  </form> --}}
             <div class="col-12">
              <h4 class="text-danger">DANH SÁCH CÁC QUYỀN</h4>
              
              @php $total=0; @endphp
              <table>
                  
                  <tr>
              @foreach ($permission as $per)
             
                        <td>
             <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="route[]" value="{{$per}}" id="flexCheckDefault">
                           <label class="form-check-label" for="flexCheckDefault">{{$per}}</label>
             </div>
             </td>
             @php
             $total=$total+1;
             @endphp  
             @if($total %6==0)
                      @php echo "</tr>"; @endphp 
             
               @endif          
             @endforeach  
                        
             </table>
             </div>
             <br>
            
              <button class="btn btn-primary" type="submit"><i class="fa fa-save">&nbsp;Lưu Lại</i></button> 
              <a href="{{ url()->previous() }}" class=" btn-xs btn btn-danger"><i class="fa fa-reply-all">&nbsp;Quay Lại </i></a>
             
  </form>
</div>




          
    </div> 
        </div>
    @endsection
