@extends('layout.main')
@section('main_body')
<div class="antialiased ">
    <div class="d-flex  align-items-center justify-content-center ">
        <div class="mt-2 border">
            <h4 class="m-0 p-0" style="color: #495057" for="">Chèn File Excel</h4>
            <div class="border p-2 ">
                @if (\Session::has('success'))
                    <div class="text-success text-center" id="hideMe">
                        <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('success') !!}</strong>
                    </div>
                @endif
                @if (\Session::has('danger'))
                    <div class="text-warning text-center" id="hideMe">
                        <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('danger') !!}</strong>
                    </div>
                @endif
                @if (\Session::has('choose_file'))
                    <div class="text-danger text-center" id="hideMe">
                        <strong id="hideMe" style=" text-align:center !important;">{!! \Session::get('choose_file') !!}</strong>
                    </div>
                @endif
                <form action="{!! route('import')!!}" class="p-2" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2>Vui lòng chọn file cần Import</h2>
                    <input type="file" name="file" accept=".xlsx" class="form-control col">
                    <input class="btn btn-success m-1" type="submit" value="Import">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

