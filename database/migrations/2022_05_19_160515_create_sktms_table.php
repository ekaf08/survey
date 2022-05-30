<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSktmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sktms', function (Blueprint $table) {
            $table->id();
            $table->string('NIK')->unique();
            $table->string('nama_rt');
            $table->string('kelamin');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('status_kawin');
            $table->string('no_kk')->unique();
            $table->string('nama_penerima');
            $table->string('kelamin_penerima');
            $table->string('pekerjaan');
            $table->string('hubungan_keluarga');
            $table->string('alasan_penerbitan_skm');
            $table->string('pemohon');
            $table->string('penandatangan');
            $table->date('tanggal_pengeluaran_surat');
            $table->string('no_surat');
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
        Schema::dropIfExists('sktms');
    }
}
