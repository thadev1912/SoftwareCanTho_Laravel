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
        Schema::create('mypost', function (Blueprint $table) {
            $table->id();
            $table->string('id_baiviet');
            $table->string('tieude_baiviet');
            $table->string('noidung_baiviet');
            $table->string('danhmuc_baiviet');
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
        Schema::dropIfExists('mypost');
    }
};
