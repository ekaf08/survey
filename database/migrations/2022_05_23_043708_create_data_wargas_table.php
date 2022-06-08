<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_wargas', function (Blueprint $table) {
            $table->id();
            $table->string('no_prelist');
            $table->string('no_kk');
            $table->string('nik');
            $table->string('nama');
            $table->string('hub_keluarga');
            $table->string('alamat');
            $table->string('no_rw');
            $table->string('no_rt');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('periode');
            $table->string('tahun');
            $table->string('status_keluarga');
            $table->string('status_ekonomi');
            $table->string('hasil_prelist');
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('data_wargas');
    }
}
