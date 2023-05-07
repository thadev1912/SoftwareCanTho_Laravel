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
        Schema::create('giohang', function (Blueprint $table) {
            $table->id();
            $table->string('anh_sp');
            $table->string('ten_sp');
            $table->string('gia_sp');
            $table->string('soluong_sp');
            $table->string('thanhtien_sp');
            $table->string('tonggiatien_sp');
            $table->string('tongsl_sp');
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
        Schema::dropIfExists('giohang');
    }
};
