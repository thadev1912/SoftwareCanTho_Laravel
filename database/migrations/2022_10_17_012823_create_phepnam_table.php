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
        Schema::create('phepnam', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nv');
            $table->date('ngay_nhanviec');
            $table->date('ngay_ketthuc');
            $table->string('tongso_phepnam');
            $table->string('phepnam_dadung');
            $table->string('ngaysudung_phepnam');
            $table->string('phepnam_conlai');
            $table->string('thamnien');
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
        Schema::dropIfExists('phepnam');
    }
};
