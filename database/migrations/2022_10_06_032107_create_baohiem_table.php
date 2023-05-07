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
        Schema::create('baohiem', function (Blueprint $table) {
            $table->id();
            $table->string('ma_bhxh');
            $table->string('ma_nv');
            $table->string('loai_bhxh');
            $table->string('ngaycap');
            $table->string('ngayhethan');
            $table->string('noicap');
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
        Schema::dropIfExists('baohiem');
    }
};
