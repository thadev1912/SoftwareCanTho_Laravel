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
        Schema::create('tintucdatxanh', function (Blueprint $table) {
            $table->id();
            $table->string('tieude_tintuc');
            $table->string('noidungtintuc_tintuc');
            $table->string('anhdaidien_tintuc');
            $table->string('danhmuc_tintuc');
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
        Schema::dropIfExists('tintucdatxanh');
    }
};
