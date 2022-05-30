<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahtanggasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumahtanggas', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('nik');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('no_urut_keluarga');
            $table->string('nama_kepala_keluarga');
            $table->string('pengelola_makan');
            $table->string('ruta_daftar_dtms');
            $table->string('no_urut_ruta');
            
   //          $table->string('alamat_domisili');
   //          $table->string('no_hp');
			// $table->string('rt_domisili');
			// $table->string('rw_domisili');
   //          $table->string('kecamatan_domisili');
   //          $table->string('kelurahan_domisili');
   //          $table->string('jumlah_anggota_kel');
   //          $table->string('jumlah_keluarga');
            $table->date('tanggal_pencacah');
            $table->string('nama_pencacah');
            $table->date('tanggal_pemeriksa');
            $table->string('nama_pemeriksa');
            $table->string('hasil_pencacah');
            $table->string('tempat_tinggal');
            $table->string('status_lahan');
            $table->string('biaya_pbb'); 
            $table->string('luas_lantai');
            $table->string('jenis_lantai');
            $table->string('dinding_terluas');
            $table->string('kualitas_dinding');
            $table->string('jenis_atap')->nullable();
            $table->string('kualitas_atap');
            $table->string('kamar_tidur');
            $table->string('air_minum');
            $table->string('biaya_pdam');
            $table->string('perolehan_air_minum');
            $table->string('penerangan_utama');
            $table->string('daya_listrik');
            $table->string('bahan_bakar_memasak');
            $table->string('fasilitas_bab');
            $table->string('jenis_kloset');
            $table->string('pembuangan_akhir_tinja');
            //$table->string('pendapatan_keluarga');
               
            $table->string('biaya_listrik');
            $table->string('biaya_gas');
            //$table->string('menerima_perbaikan_rumah');
            //$table->string('kepemilikan_listrik');
            $table->string('no_id_pln');
            //$table->string('bukan_pln');
            $table->string('kepemilikan_gas');
            $table->string('kepemilikan_kulkas');
            $table->string('kepemilikan_ac');
            $table->string('kepemilikan_pemanas_air');
            $table->string('kepemilikan_telepon_rumah');
            $table->string('kepemilikan_tv');
            $table->string('kepemilikan_emas');
            $table->string('kepemilikan_komputer');
            //$table->string('kepemilikan_sepeda');
            $table->string('kepemilikan_motor');
            $table->string('kepemilikan_mobil');
            $table->string('kepemilikan_perahu');
            //$table->string('kepemilikan_motor_tempel');
            $table->string('kepemilikan_perahu_motor');
            //$table->string('kepemilikan_kapal');
            $table->string('pajak_sepeda_motor');
            $table->string('berapa_motor');
            $table->string('pajak_mobil');
            $table->string('berapa_mobil');
            $table->string('kepemilikan_lahan_lain');
            $table->string('luas_lahan_lain');
            $table->string('rumah_di_tempat_lain');
            $table->string('jumlah_sapi');
            $table->string('jumlah_kerbau');
            $table->string('jumlah_kuda');
            $table->string('jumlah_babi');
            $table->string('jumlah_kambing');
            $table->string('jumlah_ayam');
            $table->string('keluarga_memiliki_usaha');
            $table->string('angsuran_kredit_kendaraan');
            $table->string('besaran_angsuran')->nullable();
            $table->string('biaya_sampah');
            $table->string('punya_kks');
            $table->string('punya_kip');
            $table->string('punya_kis');
            $table->string('punya_bpjs_mandiri');
            $table->string('punya_jamsostek');
            $table->string('asuransi_kesehatan_lain');
            $table->string('peserta_pkh');
            $table->string('peserta_raskin');
            $table->string('peserta_kur');
            //$table->string('kepemilikan_hp');
            //$table->string('jumlah_hp');
            // $table->string('no_hp_aktif');
            // $table->string('tv_30_inc');
            // $table->string('telpon_seluler_usaha');
            // $table->string('kepemilikan_tablet');
            // $table->string('cara_sambungan_layanan');
            // $table->string('berapa_kali_isi_pulsa_per_minggu');
            // $table->string('mengunjungi_blc');
            // $table->string('mengunjungi_warnet_per_minggu');
            // $table->string('cara_memperoleh_sebagian_aset');
            // $table->string('aset_untuk_usaha');

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
        Schema::dropIfExists('rumahtanggas');
    }
}
