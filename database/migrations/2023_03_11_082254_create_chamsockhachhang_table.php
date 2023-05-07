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
        Schema::create('chamsockhachhang', function (Blueprint $table) {
            $table->id();
            $table->string('hoten_kh');
            $table->string('noidung_kh');
            $table->string('sdt_kh');
            $table->string('diachi_kh');
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
        Schema::dropIfExists('chamsockhachhang');
    }
};
