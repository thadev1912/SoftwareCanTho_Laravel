@extends('layout.main')
@section('main_body')
  <div class="container"> 
        <div class="card">         
                    <div class="card-header bg-primary">
                               <div class="row">
                                     <div class="col-md-12" align="center">
                                            <h1 class="btn text-light"> CHI TIẾT NHÓM QUYỀN</h1>
                                     </div>                                  
                               </div>
                    </div>            
          <div class="card-body "> 
                 @foreach($permission as $per)
                 <div class="form-check">
                 <input class="form-check-input" type="checkbox" disabled="true"  name="role[]" value="{{$per}}" id="flexCheckDefault" Checked disable>
                        
                        <label class="form-check-label" for="">{{$per}}</label>
              </div>
                    @endforeach
                    <a href="{{URL::route('chinhsua_role',$data->id)}}" class="mt-3 btn-xs btn btn-danger"><i class="btn-icon-only icon-edit">Chỉnh Sửa Nhóm Quyền</i></a>
                    <a href="{{ url()->previous() }}" class="mt-3 btn-xs btn btn-danger"><i class="btn-icon-only icon-edit">Quay lại</i></a>
</div>         
</div>
    @endsection
