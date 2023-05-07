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
        Schema::create('kho_banhang', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('ma_kho')->nullable();
            $table->string('ten_kho');
            $table->string('dia_chi');
            $table->char('so_dien_thoai')->nullable();
            $table->text('ghi_chu')->nullable();
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
        Schema::dropIfExists('kho_banhang');
    }
};
