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
        Schema::create('phieuxuatkho', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phieu',100);
            $table->string('ngay_xuat',100);
            $table->string('id_nhanvien',100);
            $table->string('lydo',100);
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
        Schema::dropIfExists('phieuxuatkho');
    }
};
