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
        Schema::create('vattu_banhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_vattu')->length(100);
            $table->string('ten_vattu')->length(100);
            $table->string('dvt_vattu')->length(100);
            $table->tinyInteger('soluong')->length(100)->nullable();
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
        Schema::dropIfExists('vattu_banhang');
    }
};
