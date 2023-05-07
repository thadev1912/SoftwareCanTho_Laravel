<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhanQuyen\AdminController;
use App\Http\Controllers\PhanQuyen\RoleController;
use App\Http\Controllers\Quanlynhansu\NhanvienController;
use App\Http\Controllers\Quanlynhansu\PhongbanController;
use App\Http\Controllers\Quanlynhansu\HopdongController;
use App\Http\Controllers\Quanlynhansu\BaohiemController;
use App\Http\Controllers\Quanlynhansu\ChucvuController;
use App\Http\Controllers\Quanlynhansu\KhenthuongController;
use App\Http\Controllers\Quanlynhansu\KyluatController;
use App\Http\Controllers\Quanlynhansu\PhepnamController;
use App\Http\Controllers\Quanlynhansu\ChamcongController;
use App\Http\Controllers\Quanlybanhang\CartController;
use App\Http\Controllers\Quanlybanhang\ProductController;
use App\Http\Controllers\Quanlybanhang\ChamsockhachhangController;
use App\Http\Controllers\Quanlykhovattu\KhoController;
use App\Http\Controllers\Quanlykhovattu\NhacungcapController;
use App\Http\Controllers\Quanlykhovattu\VattuController;
use App\Http\Controllers\Quanlykhovattu\LydonhapkhoController;
use App\Http\Controllers\Quanlykhovattu\LydoxuatkhoController;
use App\Http\Controllers\Quanlykhovattu\NhapkhoController;
use App\Http\Controllers\Quanlykhovattu\XuatkhoController;
use App\Http\Controllers\Quanlykhovattu\PhieunhapkhoController;
use App\Http\Controllers\Quanlykhovattu\PhieuxuatkhoController;
use App\Http\Controllers\Quanlykhovattu\Invoice_nhapController;
use App\Http\Controllers\Quanlykhovattu\Invoice_xuatController;
use App\Http\Controllers\Quanlykhovattu\PhieuchuyenkhoController;
use App\Http\Controllers\Quanlykhovattu\XuatnhaptonController;
use App\Http\Controllers\APIRestful\Connect_APIController;
use App\Http\Controllers\TinTucDatxanh\TintucdatxanhController;


// Phân Quyền Hệ Thống
Route::group(['middleware'=>'auth'],function()
{
//Danh mục Nhân Viên
Route::group(['prefix'=>'nhanvien'],function()
{
Route::get('thongkenhanvien',[NhanvienController::class,'thongke_nhanvien'])
->name('ds_nhanvien');
  Route::get('/nhanvien',[NhanvienController::class,'nhanvien'])
  ->name('nhanvien'); 
  Route::get('/timnhanvien',[NhanvienController::class,'timkiem'])
  ->name('timkiem');
  Route::get('/timkiem_dsnhanvien',[NhanvienController::class,'timkiem_dsnhanvien'])
  ->name('timkiem_dsnhanvien');
  Route::get('/chitietnhanvien/{id}',[NhanvienController::class,'chitiet_nhanvien'])
  ->name('chitiet_nhanvien');
   Route::get('/themnhanvien',[NhanvienController::class,'them_nv'])
  ->name('them_nv');
  Route::post('/luunhanvien',[NhanvienController::class,'luu_nv'])
  ->name('luu_nv');
  Route::get('/suanhanvien/{id}',[NhanvienController::class,'sua_nv'])
  ->name('sua_nv');
  Route::post('/capnhatnhanvien/{id}',[NhanvienController::class,'capnhat_nv'])
  ->name('capnhat_nv');
  Route::get('/xoanhanvien/{id}',[NhanvienController::class,'xoa_nv'])
  ->name('xoa_nv');
  Route::get('/pdf_nhanvien',[NhanvienController::class,'pdf_nhanvien'])
  ->name('pdf_nhanvien');
  Route::get('baocao',[NhanvienController::class,'baocao'])
->name('baocao_nhanvien');
});
  // Danh muc phong ban  
  Route::group(['prefix'=>'phongban'],function()
{
  Route::get('/phongban',[PhongbanController::class,'phongban'])
  ->name('phongban');
  Route::get('/themphongban',[PhongbanController::class,'them_pb'])
 ->name('them_pb');
 Route::post('/luuphongban',[PhongbanController::class,'luu_pb'])
 ->name('luu_pb');
 Route::get('/suaphongban/{id}',[PhongbanController::class,'sua_pb'])
 ->name('sua_pb');
 Route::post('/capnhatphongban/{id}',[PhongbanController::class,'capnhat_pb'])
 ->name('capnhat_pb');
 Route::get('/xoaphongban/{id}',[PhongbanController::class,'xoa_pb'])
 ->name('xoa_pb');

});


//Danh muc chuc vu
Route::group(['prefix'=>'chucvu'],function()
{
  Route::get('chucvu',[ChucvuController::class,'chucvu'])
  ->name('chucvu');
  Route::get('/themchucvu',[ChucvuController::class,'them_cv'])
  ->name('them_cv');
  Route::post('/luuchucvu',[ChucvuController::class,'luu_cv'])
  ->name('luu_cv');
  Route::get('/suachucvu/{id}',[ChucvuController::class,'sua_cv'])
  ->name('sua_cv');
  Route::post('/capnhatchucvu/{id}',[ChucvuController::class,'capnhat_cv'])
  ->name('capnhat_cv');
  Route::get('/xoachucvu/{id}',[ChucvuController::class,'xoa_cv'])
  ->name('xoa_cv');
});
  //Danh mục khen thưởng
  Route::group(['prefix'=>'khenthuong'],function()
{
  Route::get('khenthuong',[KhenthuongController::class,'khenthuong'])
  ->name('khenthuong');
   Route::get('/themkhenthuong',[KhenthuongController::class,'them_kt'])
  ->name('them_kt');
  Route::post('/luukhenthuong',[KhenthuongController::class,'luu_kt'])
  ->name('luu_kt');
  Route::get('/suakhenthuong/{id}',[KhenthuongController::class,'sua_kt'])
  ->name('sua_kt');
  Route::post('/capnhatkhenthuong/{id}',[KhenthuongController::class,'capnhat_kt'])
  ->name('capnhat_kt');
  Route::get('/xoa/{id}',[KhenthuongController::class,'xoa_kt'])
  ->name('xoa_kt');
});

    //Danh mục ky luat
    Route::group(['prefix'=>'khenthuong'],function()
    {
  Route::get('kyluat',[KyluatController::class,'kyluat'])
  ->name('kyluat');
  Route::get('/themkyluat',[KyluatController::class,'them_kl'])
  ->name('them_kl');
  Route::post('/luukyluat',[KyluatController::class,'luu_kl'])
  ->name('luu_kl');
  Route::get('/suakyluat/{id}',[KyluatController::class,'sua_kl'])
  ->name('sua_kl');
  Route::post('/capnhatkyluat/{id}',[KyluatController::class,'capnhat_kl'])
  ->name('capnhat_kt');
  Route::get('/xoakyluat/{id}',[KyluatController::class,'xoa_kl'])
  ->name('xoa_kl');
    });


 //Danh mục Hợp đồng
 Route::group(['prefix'=>'hopdong'],function()
 {
 Route::get('/hopdong',[HopdongController::class,'hopdong'])
  ->name('hopdong');
  Route::get('/themhopdong',[HopdongController::class,'them_hd'])
 ->name('them_hd');
 Route::post('/luuhopdong',[HopdongController::class,'luu_hd'])
 ->name('luu_hd');
 Route::get('/suahopdong/{id}',[HopdongController::class,'sua_hd'])
 ->name('sua_hd');
 Route::post('/capnhathopdong/{id}',[HopdongController::class,'capnhat_hd'])
 ->name('capnhat_hd');
 Route::get('/xoahopdong/{id}',[HopdongController::class,'xoa_hd'])
 ->name('xoa_hd');
 Route::get('/chitiethopdong/{id}',[HopdongController::class,'chitiet_hopdong'])
 ->name('chitiet_hopdong');
 Route::get('baocao',[HopdongController::class,'baocao'])
 ->name('baocao_hopdong');
 });
 //Danh mục Bảo Hiểm
 Route::group(['prefix'=>'baohiem'],function()
 {
 Route::get('baohiem',[BaohiemController::class,'baohiem'])
 ->name('baohiem');
  Route::get('/thembaohiem',[BaohiemController::class,'them_bhxh'])
 ->name('them_bhxh');
 Route::post('/luubaohiem',[BaohiemController::class,'luu_bhxh'])
 ->name('luu_bhxh');
 Route::get('/suabaohiem/{id}',[BaohiemController::class,'sua_bhxh'])
 ->name('sua_bhxh');
 Route::post('/capnhatbaohiem/{id}',[BaohiemController::class,'capnhat_bhxh'])
 ->name('capnhat_bhxh');
 Route::get('/xoabaohiem/{id}',[BaohiemController::class,'xoa_bhxh'])
 ->name('xoa_bhxh');
 Route::get('/chitietbaohiem/{id}',[BaohiemController::class,'chitiet_bhxh'])
 ->name('chitiet_bhxh');
 Route::get('baocao',[BaohiemController::class,'baocao'])
 ->name('baocao_baohiem');
 });
  //Danh mục phep nam
  Route::group(['prefix'=>'phepnam'],function()
{
  Route::get('phepnam',[PhepnamController::class,'phepnam'])
  ->name('phepnam');
  Route::get('themphepnam',[PhepnamController::class,'them_pn'])
  ->name('them_pn');
  Route::post('ajax',[PhepnamController::class,'ajax'])
  ->name('ajax');
  Route::post('/luuphepnam',[PhepnamController::class,'luu_pn'])
  ->name('luu_pn');
  Route::get('/suaphepnam/{id}',[PhepnamController::class,'sua_pn'])
  ->name('sua_pn');
  Route::post('/capnhatphepnam/{id}',[PhepnamController::class,'capnhat_pn'])
  ->name('capnhat_pn');
  Route::get('/xoaphepnam/{id}',[PhepnamController::class,'xoa_pn'])
  ->name('xoa_pn');
  Route::get('baocao',[PhepnamController::class,'baocao'])
  ->name('baocao_phepnam');
});
  //Du lieu cham cong
  Route::group(['prefix'=>'dulieuchamcong'],function()
  {
Route::get('/getform',[ChamcongController::class,'getform'])
->name('getform');
Route::post('import',[ChamcongController::class,'import'])
->name('import');
Route::get('/dulieuchamcong',[ChamcongController::class,'dulieu_chamcong'])
->name('dulieu_chamcong');  
Route::get('/timkiemchamcong',[ChamcongController::class,'timkiem_chamcong'])
->name('timkiem_chamcong');  
Route::get('/bangluong',[ChamcongController::class,'bangluong'])
->name('bangluong'); 
Route::get('/chitietbangluong/{id}',[ChamcongController::class,'chitiet_bangluong'])
->name('chitiet_bangluong'); 
Route::get('baocao',[ChamcongController::class,'baocao'])
->name('baocao_bangchamcong');
Route::get('baocao_bangluong',[ChamcongController::class,'baocao_bangluong'])
->name('baocao_bangluong');
});

//Phan quyen_Role
Route::group(['prefix'=>'phanquyen'],function()
{
Route::get('/role',[RoleController::class,'role'])
->name('role');
Route::get('/add_role',[RoleController::class,'add_role'])
->name('add_role');
Route::get('/timkiem_route',[RoleController::class,'timkiem_route'])
->name('timkiem_route');
Route::post('/luu_role',[RoleController::class,'luu_role'])
->name('luu_role');
Route::get('/chitiet_role/{id}',[RoleController::class,'chitiet_role'])
->name('chitiet_role');
Route::get('/chinhsua_role/{id}',[RoleController::class,'chinhsua_role'])
->name('chinhsua_role');
Route::post('/capnhat_role/{id}',[RoleController::class,'capnhat_role'])
->name('capnhat_role');
Route::get('/xoa_role/{id}',[RoleController::class,'xoa_role'])
->name('xoa_role');
//Phan quyen_User_Role
Route::get('/list_user',[AdminController::class,'list_user'])
->name('list_user');
Route::get('/add_user_role/{id}',[AdminController::class,'add_user_role'])
->name('add_user_role');
Route::post('/luu_user_role',[AdminController::class,'luu_user_role'])
->name('luu_user_role');
Route::get('/them_quyen/{id}',[AdminController::class,'them_quyen'])
->name('them_quyen');
Route::post('/capnhat_quyen/{id}',[AdminController::class,'capnhat_quyen'])
->name('capnhat_quyen');
Route::get('/xoa_user/{id}',[AdminController::class,'xoa_user'])
->name('xoa_user');
});

//Show dữ liệu từ API
Route::group(['prefix'=>'api'],function()
{
Route::get('post_api',[Connect_APIController::class,'post_api'])
->name('post_api');
Route::get('free_api',[Connect_APIController::class,'free_api'])
->name('free_api');
Route::get('nhanvien_api',[Connect_APIController::class,'nhanvien_api'])
->name('nhanvien_api');
Route::get('bangchamcong_api',[Connect_APIController::class,'bangchamcong_api'])
->name('bangchamcong_api');
});

Route::group(['prefix'=>'nhapkho'],function()
{
// Phieu nhap kho
Route::get('nhapkho',[NhapkhoController::class,'nhapkho'])
->name('nhapkho');
Route::get('phieunhapkho',[PhieunhapkhoController::class,'phieunhapkho'])
->name('phieunhapkho');
Route::post('them_phieunhapkho',[PhieunhapkhoController::class,'them_phieunhapkho'])
->name('them_phieunhapkho');
Route::post('capnhat_phieunhapkho/{id}',[PhieunhapkhoController::class,'capnhat_phieunhapkho'])
->name('capnhat_phieunhapkho');
Route::get('ds_phieunhap',[NhapkhoController::class,'ds_phieunhap'])
->name('ds_phieunhap');
Route::get('chitiet_phieunhap/{id}',[NhapkhoController::class,'chitiet_phieunhap'])
->name('chitiet_phieunhap');
});
// Phieu xuat kho
Route::group(['prefix'=>'xuatkho'],function()
{
Route::get('xuatkho',[XuatkhoController::class,'xuatkho'])
->name('xuatkho');
Route::get('phieuxuatkho',[PhieuxuatkhoController::class,'phieuxuatkho'])
->name('phieuxuatkho');
Route::post('them_phieuxuatkho',[PhieuxuatkhoController::class,'them_phieuxuatkho'])
->name('them_phieuxuatkho');
Route::post('capnhat_phieuxuatkho/{id}',[PhieuxuatkhoController::class,'capnhat_phieuxuatkho'])
->name('capnhat_phieuxuatkho');
Route::get('invoice',[Invoice_nhapController::class,'invoice'])
->name('invoice');
Route::get('invoice_xuat',[Invoice_xuatController::class,'invoice_xuat'])
->name('invoice_xuat');
Route::get('ds_phieuxuat',[XuatkhoController::class,'ds_phieuxuat'])
->name('ds_phieuxuat');
Route::get('chitiet_phieuxuat/{id}',[XuatkhoController::class,'chitiet_phieuxuat'])
->name('chitiet_phieuxuat');
});
//Phieu Chuyen Kho
Route::group(['prefix'=>'phieuchuyenkho'],function(){
  Route::get('phieuchuyenkho',[PhieuchuyenkhoController::class,'phieuchuyenkho'])
  ->name('phieuchuyenkho');
});
//Xuatnhapton
Route::group(['prefix'=>'xuatnhapkho'],function()
{
Route::get('/xuatnhapton',[XuatnhaptonController::class,'xuatnhapton'])
->name('xuatnhapton');
Route::get('chitiet_vtnhap/{id}',[XuatnhaptonController::class,'chitiet_vtnhap'])
->name('chitiet_vtnhap');
Route::get('chitiet_vtxuat/{id}',[XuatnhaptonController::class,'chitiet_vtxuat'])
->name('chitiet_vtxuat');
});
// Tin Tức
Route::group(['prefix'=>'tintuc'],function()
{
Route::get('quanly_tintuc',[TintucdatxanhController::class,'quanly_tintuc'],)
->name('quanly_tintuc');
Route::get('/themmoi_tintuc',[TintucdatxanhController::class,'themmoi_tintuc'],)
->name('themmoi_tintuc');
Route::post('/luu_tintuc',[TintucdatxanhController::class,'luu_tintuc'],)
->name('luu_tintuc');
Route::get('/sua_tintuc/{id}',[TintucdatxanhController::class,'sua_tintuc'],)
->name('sua_tintuc');
Route::post('/capnhat_tintuc/{id}',[TintucdatxanhController::class,'capnhat_tintuc'],)
->name('capnhat_tintuc');
Route::get('/xoa_tintuc/{id}',[TintucdatxanhController::class,'xoa_tintuc'],)
->name('xoa_tintuc');
});
//Chăm sóc khách hàng
Route::group(['prefix'=>'lienhe'],function()
{
Route::get('/thongtin_khachhang',[ChamsockhachhangController::class,'thongtin_khachhang'])
->name('thongtin_khachhang');
Route::get('/chitiet_thongtin/{id}',[ChamsockhachhangController::class,'chitiet_thongtin'])
->name('chitiet_thongtin');
Route::get('/xoa_thongtin/{id}',[ChamsockhachhangController::class,'xoa_thongtin'])
->name('xoa_thongtin');

});
//Vattu
Route::group(['prefix'=>'vattukho'],function()
{
Route::get('vattukho',[VattuController::class,'vattukho'])
->name('vattukho');
Route::get('them_vattukho',[VattuController::class,'them_vattukho'])
->name('them_vattukho');
Route::post('luu_vattukho',[VattuController::class,'luu_vattukho'])
->name('luu_vattukho');
Route::get('sua_vattukho/{id}',[VattuController::class,'sua_vattukho'])
->name('sua_vattukho');
Route::post('capnhat_vattukho/{id}',[VattuController::class,'capnhat_vattukho'])
->name('capnhat_vattukho');
Route::get('xoa_vattukho/{id}',[VattuController::class,'xoa_vattukho'])
->name('xoa_vattukho');
});
//Nhà cung cấp
Route::group(['prefix'=>'nhacungcap'],function()
{
Route::get('nhacungcap',[NhacungcapController::class,'nhacungcap'])
->name('nhacungcap');
Route::get('them_nhacungcap',[NhacungcapController::class,'them_nhacungcap'])
->name('them_nhacungcap');
Route::post('luu_nhacungcap',[NhacungcapController::class,'luu_nhacungcap'])
->name('luu_nhacungcap');
Route::get('sua_nhacungcap/{id}',[NhacungcapController::class,'sua_nhacungcap'])
->name('sua_nhacungcap');
Route::post('capnhat_nhacungcap/{id}',[NhacungcapController::class,'capnhat_nhacungcap'])
->name('capnhat_nhacungcap');
Route::get('xoa_nhacungcap/{id}',[NhacungcapController::class,'xoa_nhacungcap'])
->name('xoa_nhacungcap');
}); 

//Kho 
Route::group(['prefix'=>'kho'],function()
{
Route::get('kho',[KhoController::class,'kho'])
->name('kho');
Route::get('them_kho',[KhoController::class,'them_kho'])
->name('them_kho');
Route::post('luu_kho',[KhoController::class,'luu_kho'])
->name('luu_kho');
Route::get('sua_kho/{id}',[KhoController::class,'sua_kho'])
->name('sua_kho');
Route::post('capnhat_kho/{id}',[KhoController::class,'capnhat_kho'])
->name('capnhat_kho');
Route::get('xoa_kho/{id}',[KhoController::class,'xoa_kho'])
->name('xoa_kho');
});

//Lý do Nhập Kho
Route::group(['prefix'=>'lydonhapkho'],function(){
  Route::get('lydonhapkho',[LydonhapkhoController::class,'lydonhapkho'])
  ->name('lydonhapkho');
  Route::get('them_lydonhapkho',[LydonhapkhoController::class,'them_lydonhapkho'])
  ->name('them_lydonhapkho');
  Route::post('luu_lydonhapkho',[LydonhapkhoController::class,'luu_lydonhapkho'])
  ->name('luu_lydonhapkho');
  Route::get('sua_lydonhapkho/{id}',[LydonhapkhoController::class,'sua_lydonhapkho'])
  ->name('sua_lydonhapkho');
  Route::post('capnhat_lydonhapkho/{id}',[LydonhapkhoController::class,'capnhat_lydonhapkho'])
  ->name('capnhat_lydonhapkho');
  Route::get('xoa_lydonhapkho/{id}',[LydonhapkhoController::class,'xoa_lydonhapkho'])
  ->name('xoa_lydonhapkho');
});
//Lý do Xuất Kho
Route::group(['prefix'=>'lydoxuatkho'],function(){
  Route::get('lydoxuatkho',[LydoxuatkhoController::class,'lydoxuatkho'])
  ->name('lydoxuatkho');
  Route::get('them_lydoxuatkho',[LydoxuatkhoController::class,'them_lydoxuatkho'])
  ->name('them_lydoxuatkho');
  Route::post('luu_lydoxuatkho',[LydoxuatkhoController::class,'luu_lydoxuatkho'])
  ->name('luu_lydoxuatkho');
  Route::get('sua_lydoxuatkho/{id}',[LydoxuatkhoController::class,'sua_lydoxuatkho'])
  ->name('sua_lydoxuatkho');
  Route::post('capnhat_lydoxuatkho/{id}',[LydoxuatkhoController::class,'capnhat_lydoxuatkho'])
  ->name('capnhat_lydoxuatkho');
  Route::get('xoa_lydoxuatkho/{id}',[LydoxuatkhoController::class,'xoa_lydoxuatkho'])
  ->name('xoa_lydoxuatkho');
});

//Quanlysanpham
Route::group(['prefix'=>'sanpham'],function(){

  Route::get('quanlysanpham',[ProductController::class,'quanlysanpham'])
  ->name('quanlysanpham');
  Route::get('them_sanpham',[ProductController::class,'them_sanpham'])
  ->name('them_sanpham');
  Route::post('luu_sanpham',[ProductController::class,'luu_sanpham'])
  ->name('luu_sanpham');
  Route::get('sua_sanpham/{id}',[ProductController::class,'sua_sanpham'])
  ->name('sua_sanpham');
  Route::post('capnhat_sanpham/{id}',[ProductController::class,'capnhat_sanpham'])
  ->name('capnhat_sanpham');
  Route::get('xoa_sanpham/{id}',[ProductController::class,'xoa_sanpham'])
  ->name('xoa_sanpham');
  });
}); //kết thúc phân quyền

//Gioithieu
Route::get('/',function()
{
  return view('layout.gioithieu');
})
->name('gioithieu');
//Tin Tức Đất Xanh
Route::group(['prefix'=>'tintuc'],function()
{
Route::get('/tintucdatxanh',[TintucdatxanhController::class,'tintucdatxanh'])
->name('tintucdatxanh');
Route::get('/chitiet_tintuc/{id}',[TintucdatxanhController::class,'chitiet_tintuc'])
->name('chitiet_tintuc');

});

//Giohang
Route::group(['prefix'=>'cart'],function()
{
Route::get('/shop', [ProductController::class, 'sanpham'])
->name('shop');
Route::get('/chitietsanpham/{id}', [ProductController::class, 'chitiet_sanpham'])
->name('chitiet_sanpham');
Route::get('/check_login',[CartController::class,'check_login'])
->name('check_login');
Route::get('/giohang',[CartController::class,'giohang'])
->name('giohang');
Route::get('buy/{id}',[CartController::class,'buy'])
->name('buy');
Route::get('remove/{id}',[CartController::class,'remove'])
->name('remove');
Route::post('update',[CartController::class,'update'])
->name('update');
Route::get('/thanhtoan',[CartController::class,'payment'])
->name('payment');
Route::post('/chotdel',[CartController::class,'chotdeal'])
->name('chotdeal');
Route::get('/donhang',[CartController::class,'donhang'])
->name('donhang');
});
//Login_Logout Account
Route::get('/dangnhap',[AdminController::class,'dangnhap'])
->name('dangnhap');
Route::get('/dangky',[AdminController::class,'dangky'])
->name('dangky');
Route::post('/xulydangky',[AdminController::class,'xulydangky'])
->name('xulydangky');
Route::post('/xulydangnhap',[AdminController::class,'xulydangnhap'])
->name('xulydangnhap');
Route::get('/thoat',[AdminController::class,'thoat'])
->name('thoat');

