<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->string("id",32)->primary();
            $table->string("nip_baru",20);
            $table->string("nip_lama",20);
            $table->string("nama",60);
            $table->string("gelar_depan",20);
            $table->string("gelar_belakang",20);
            $table->string("tempat_lahir",30);
            $table->string("tempat_lahir_id",32);
            $table->date("tanggal_lahir");
            $table->string("agama",20);
            $table->string("agama_id",32);
            $table->string("email",50);
            $table->string("nik",20);
            $table->string("alamat",150);
            $table->string("no_hp",30);
            $table->string("no_telp",30);
            
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
        Schema::dropIfExists('tb_pegawai');
    }
}
