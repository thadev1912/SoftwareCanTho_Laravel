<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhapkho_banhang', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('ma_phieu',100);
            $table->string('id_nhanvien',100);
            $table->string('id_vattu',100);
            $table->string('id_kho',100);
            $table->string('id_nhacc',100);
            $table->date('ngaynhap',100);
            $table->text('ghichu',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhapkho_banhang');
    }
};
