<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarbpjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarbpjs', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('no_kk')->unique();
            $table->string('nama');
            $table->string('hubungan_keluarga');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('status_perkawinan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('kode_bpjs_kecamatan');
            $table->string('kode_bpjs_kelurahan');
            $table->string('nama_faskes_tk_1');
            $table->string('nama_faskes_dokter');
            $table->string('kode_faskes_dokter');
            $table->string('nomor_telpon');
            $table->string('email');
            $table->string('npp');
            $table->string('jabatan');
            $table->string('status_kerja');
            $table->string('kelas_rawat_inap');
            $table->string('tempat_kerja');
            $table->string('gaji_pokok');
            $table->string('kewarganegaraan');
            $table->string('no_polis');
            $table->string('nama_asuransi');
            $table->string('npwp')->unique();
            $table->string('no_paspor')->unique();
            $table->string('keterangan_mampu');
            $table->string('kesediaan_kelas');
            $table->string('upload1');
            $table->string('upload2');
            $table->string('upload3');
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
        Schema::dropIfExists('daftarbpjs');
    }
}
