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
        Schema::create('dulieuchamcong', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nv');
            $table->string('ma_cv');
            $table->string('ma_pb');           
            $table->string('ngay_chamcong');
            $table->string('gio_chamcong');
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
        Schema::dropIfExists('dulieuchamcong');
    }
};
