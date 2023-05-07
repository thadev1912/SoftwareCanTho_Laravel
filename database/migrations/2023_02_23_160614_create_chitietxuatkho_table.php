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
        Schema::create('chitietxuatkho', function (Blueprint $table) {
            $table->id();
            $table->string('id_phieuxuat',50);
            $table->string('id_vattu',50);
            //$table->int('sl_vattu');
            $table->string('id_nhanvien',50)->nullable();
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
        Schema::dropIfExists('chitietxuatkho');
    }
};
