<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbJabatanFungsionalUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jabatan_fungsional_umum', function (Blueprint $table) {
            $table->string("id",32)->primary();
            $table->string("nama",100);
            $table->string("cepat_kode",6);
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
        Schema::dropIfExists('tb_jabatan_fungsional_umum');
    }
}
