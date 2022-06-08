<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_user', function (Blueprint $table) {
            $table->user_id();
            $table->string('opd_id');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->timestamps('deleted_at');
            $table->string('rt_user');
            $table->string('rw_user');
            $table->string('id_kel');
            $table->string('id_kec');
            $table->string('no_rek_user');
            $table->string('no_tlp_user');
            $table->string('keterangan_user');
            $table->string('keterangan_tpk');
            $table->string('jenis_user');
            $table->string('wilayah_kerja_puskesmas');
            $table->string('kel_inject');
            $table->string('is_wpm');
            $table->string('is_ckb');
            $table->string('is_kader_sk');
            $table->string('jenis_kelamin');
            $table->string('tgl_lahir');
            $table->string('alamat_domisili');
            $table->string('id_kec_domisili');
            $table->string('id_kel_domisili');
            $table->string('rw_domisili');
            $table->string('rt_domisili');
            $table->string('alamat_ktp');
            $table->string('id_kec_ktp');
            $table->string('id_kel_ktp');
            $table->string('rw_ktp');
            $table->string('rt_ktp');
            $table->string('keterangan_wpm');
            $table->string('kader_bumil_pkk');
            $table->string('kader_kesehatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_user');
    }
}
