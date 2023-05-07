    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Export Notes List PDF - Tutsmake.com</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
       .container{
        padding: 5%;
       } 
       body
       {
        font-family: 'Times New Roman', Times, serif;
       }
       table,td,table,th
    {
        border: 1px solid black;
    }
    </style>
    </head>
<body>

<div class="container">
  <a href="{{URL::route('basic_view',['download'=>'pdf'])}}"> Download PDF</a>
  <table class="table table-bordered ">
    <tr>
        <th>Mã Số </th>
        <th>Tên Nhân Viên</th>
        <th>Phòng Ban</th>
        <th>Chức Vụ</th>
        <th>Địa Chỉ</th>
        <th>Giới Tính</th>
    </tr>
    @foreach ($items as $key=> $item)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$item->ma_nv}}</td>
        <td>{{$item->hoten_nv}}</td>
        <td>{{$item->ten_cv}}</td>
        <td>{{$item->diachi_nv}}</td>
        <td>{{$item->gioitinh_nv}}</td>
    </tr>
    @endforeach
</table>
</div>
</body>
</html>
