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
        Schema::create('nhacc_banhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nhacc')->lenght(100);
            $table->string('ten_nhacc')->length(100);
            $table->char('diachi_nhacc')->lenght(100);
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
        Schema::dropIfExists('nhacc_banhang');
    }
};
