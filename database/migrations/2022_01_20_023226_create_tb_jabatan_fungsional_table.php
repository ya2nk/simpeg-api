<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbJabatanFungsionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jabatan_fungsional', function (Blueprint $table) {
            $table->string('id',32)->primary();
            $table->string('nama',100);
            $table->tinyInteger('bup_usia');
            $table->string("kel_jabatan_id",32);
            $table->string('jenjang',2);
            $table->string('status',1);
            $table->string('cepat_kode',6);
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
        Schema::dropIfExists('tb_jabatan_fungsional');
    }
}
