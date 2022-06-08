<?php

use App\Models\Rumahtangga;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataIndividusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_individus', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Rumahtangga::class);
            // $table->string('no_data_individu');
            $table->string('no_prelist');
            $table->string('no_kk')->unique();
            $table->string('nik')->unique();
            $table->string('namaAnggotaKeluarga');
            $table->string('hubungankplkeluarga');
            $table->string('keberedaankeluarga')->nullable();
            $table->string('nourut')->nullable();
            $table->string('hubungankplrmhtangga')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->string('tanggallahir')->nullable();
            $table->string('statusperkawinan')->nullable();
            $table->string('kepemilikanbukunikah')->nullable();
            $table->string('kepemilikanidentitas')->nullable();
            $table->string('statuskehamilan')->nullable();
            $table->string('jeniscacat')->nullable();
            $table->string('penyakitkronis')->nullable();
            $table->string('bpjsmandiri')->nullable();
            $table->string('bpjsketenagakerjaan')->nullable();
            $table->string('asuransikesehatan')->nullable();
            $table->string('jenisPMKS')->nullable();
            $table->string('makananakyatim')->nullable();
            $table->string('makanlansia')->nullable();
            $table->string('makandisabilitas')->nullable();
            $table->string('khitan')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('statuspendidikan')->nullable();
            $table->string('kelas')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('biayasekolah')->nullable();
            $table->string('seragamsekolah')->nullable();
            $table->string('beasiswakuliah')->nullable();
            $table->string('bekerjaseminggu')->nullable();
            $table->string('pekerjaanutama')->nullable();
            $table->string('aktivitas')->nullable();
            $table->string('kedudukan')->nullable();
            $table->string('pendapatan')->nullable();
            $table->string('korbanPHK')->nullable();
            $table->string('lulusSMA')->nullable();
            $table->string('kb')->nullable();
            $table->string('rokok')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pkarya')->nullable();
            $table->string('pelatihan')->nullable();
            $table->string('keterampilan')->nullable();
            $table->string('persalinan')->nullable();
            $table->string('imunisasi')->nullable();
            $table->string('asi')->nullable();
            $table->string('tbparu')->nullable();
            $table->string('hipertensi')->nullable();
            $table->string('gangguanjiwa')->nullable();
            $table->string('catatan')->nullable();
            $table->string('tanggalsurvei')->nullable();
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
        Schema::dropIfExists('data_individus');
    }
}
