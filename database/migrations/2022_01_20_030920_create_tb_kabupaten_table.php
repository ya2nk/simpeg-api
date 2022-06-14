<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kabupaten', function (Blueprint $table) {
            $table->string('id',32)->primary();
            $table->string('lokasi_id',32);
            $table->string('nama',40);
            $table->string('jenis',2);
            $table->string('jenis_kabupaten',3);
            $table->string('kode_prov_bps',3);
            $table->string('kode_kab_bps',3);
            $table->string('kode_kec_bps',3);
            $table->date('removal_date');
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
        Schema::dropIfExists('tb_kabupaten');
    }
}
