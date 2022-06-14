<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_instansi', function (Blueprint $table) {
            $table->string('id',32)->primary();
            $table->string('nama',100);
            $table->string('jenis',1);
            $table->string('cepat_kode',10);
            $table->string('jenis_instansi',10);
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
        Schema::dropIfExists('tb_instansi');
    }
}
