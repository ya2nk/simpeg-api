<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKelJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kel_jabatan', function (Blueprint $table) {
            $table->string('id',32)->primary();
            $table->string('nama',100);
            $table->tinyInteger('jenis_jabatan_id');
            $table->string('rumpun_jabatan_id',32);
            $table->string('pembina_id',32);
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
        Schema::dropIfExists('tb_kel_jabatan');
    }
}
