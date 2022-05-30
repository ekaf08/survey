@extends('layouts.dashboard')
@section('custom-stylesheet')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection
@section('main-content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last"></div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/main/list-data-rumahtangga/">Data Rumah Tangga</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Forms</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
<style>
h6 {
  text-align: center;
    }
</style>
        <form method="post" action="/entridata/svDatarumahtangga" enctype="multipart/form-data">
            @csrf
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Rumah Tangga</h4>
                    </div>
<!-- CARD BODY PENGENALAN TEMPAT-->
                    <div class="card-body">
                        <h6>I. PENGENALAN TEMPAT RESPONDEN</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan"
                                        value="{{ old('kecamatan') }}" required onkeyup="myFunction()">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan</label>
                                    <input type="text" class="form-control" name="kelurahan" id="kelurahan"
                                        value="{{ old('kelurahan') }}" required onkeyup="myFunction()">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        value="{{ old('alamat') }}" required onkeyup="myFunction()">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rt">RT</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="rt" maxlength="3" id="rt"
                                        value="{{ old('rt') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="rw" maxlength="3" id="rw"
                                        value="{{ old('rw') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="perekaman_koordinat">Perekaman Koordinat Lokasi Rumah Tangga</label>
                                    <input type="text" class="form-control" name="perekaman_koordinat" id="perekaman_koordinat"
                                        value="{{ old('perekaman_koordinat') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                
                                    <label for="foto_bangunan_ditempati">Foto Bangunan Yang Ditempati</label>
                          
                            </div>
                            <div class="col-md-12">
                                <label for="foto_bangunan_depan">Bangunan Tampak Depan</label>
                                <div class="form-group">
                                    <input name="foto_bangunan_depan" type="file" id="fileName" accept=".jpg,.jpeg,.png" onchange="validateFileType()"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="foto_bagian_dalam">Bagian Dalam Bangunan</label>
                                <div class="form-group">
                                    <input name="foto_bagian_dalam" type="file" id="fileName1" accept=".jpg,.jpeg,.png" onchange="validateFileType1()"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="foto_bagian_kloset">Bagian Kloset</label>
                                <div class="form-group">  
                                    <input name="foto_bagian_kloset" type="file" id="fileName2" accept=".jpg,.jpeg,.png" onchange="validateFileType2()"/>             
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="foto_dengan_responden">Foto Dengan Responden</label>
                                <div class="form-group">
                                    <input name="foto_dengan_responden" type="file" id="fileName3" accept=".jpg,.jpeg,.png" onchange="validateFileType3()"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="foto_pengesahan_pernyataan">Pengesahan Pernyataan</label>
                                <div class="form-group">
                                    <input name="foto_pengesahan_pernyataan" type="file" id="fileName4" accept=".jpg,.jpeg,.png" onchange="validateFileType4()"/>
                                    
                                    <!-- <input type="text" class="form-control" name="perekaman_koordinat" id="perekaman_koordinat"
                                        value="{{ old('perekaman_koordinat') }}" required> -->
                                    
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nik">NIK / No. KTP Kepala Rumah Tangga</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"class="form-control" id="nik" name="nik" maxlength="16"
                                        value="{{ old('nik') }}" required>
                                </div>
                            </div> -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_urut_keluarga">Nomor Urut Keluarga</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"  class="form-control" name="no_urut_keluarga" maxlength="3" id="no_urut_keluarga"
                                        value="{{ old('no_urut_keluarga') }}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                                    <input type="text" class="form-control" name="nama_kepala_keluarga" id="nama_kepala_keluarga"
                                        value="{{ old('nama_kepala_keluarga') }}" required onkeyup="myFunction()">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pengelola_makan">Isikan Nomor KK Termasuk KK Lain Yang Satu Pengelolaan Makan Dengan Keluarga Ini</label>
                                    <input type="text" class="form-control" name="pengelola_makan" id="pengelola_makan"
                                        value="{{ old('pengelola_makan') }}" required><button type="button" onclick="img7(0)">Tambah KK</button>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group" id="dvShow11" style="display:none;">

                                    <input type="text" class="form-control" name="pengelola_makan1" id="pengelola_makan1"
                                        value="{{ old('pengelola_makan1') }}"><button type="button" onclick="img8(0)">Tambah KK</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"id="dvShow12" style="display:none;">

                                    <input type="text" class="form-control" name="pengelola_makan2" id="pengelola_makan2"
                                        value="{{ old('pengelola_makan2') }}"><button type="button" onclick="img9(0)">Tambah KK</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" id="dvShow13" style="display:none;">

                                    <input type="text" class="form-control" name="pengelola_makan3" id="pengelola_makan3"
                                        value="{{ old('pengelola_makan3') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="keluarga_masuk_prelist">Apakah keluarga ini sudah didata sebagai bagian rumah tangga dari keluarga lain yang juga masuk prelist? <span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluarga_masuk_prelist" value="Ya" id="keluarga_masuk_prelist" required onclick="img10(0)">
                                    <label class="form-check-label" for="keluarga_masuk_prelist">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluarga_masuk_prelist" id="keluarga_masuk_prelist" value="Tidak" onclick="img10(1)">
                                    <label class="form-check-label" for="keluarga_masuk_prelist">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <!-- <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="ruta_daftar_dtms">Apakah bagian dari Ruta didaftar DTMS 2022? <span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ruta_daftar_dtms" value="Ya" id="chkYes" required onclick="ShowHideDiv()">
                                    <label class="form-check-label" for="ruta_daftar_dtms">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ruta_daftar_dtms" id="chkYesn" value="Tidak" onclick="ShowHideDiv()">
                                    <label class="form-check-label" for="ruta_daftar_dtms">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group" id="dvShow14" style="display:none;">
                                    <label for="ruta_daftar_dtms">No Ruta DTMS2022</label>
                                    <input type="text" class="form-control" name="ruta_daftar_dtms" id="no_urut_ruta"
                                        value="{{ old('ruta_daftar_dtms') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" id="dvShow15" style="display:none;">
                                    <label for="no_urut_ruta">Isikan No Urut Rumah Tangga</label>
                                    <input type="text" class="form-control" name="no_urut_ruta" id="no_urut_ruta"
                                        value="{{ old('no_urut_ruta') }}">
                                </div>
                            </div>
                          <!--   <div class="col-md-12">
                                <div class="form-group" id="dvShown" style="display:none;">
                                    <label for="no_urut_ruta">Tuliskan No Urut Ruta</label>
                                    <input type="text" class="form-control" name="no_urut_ruta" id="no_urut_ruta"
                                        value="{{ old('no_urut_ruta') }}">
                                </div>
                            </div> -->
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat_domisili">Alamat Domisili</label>
                                    <input type="text" class="form-control" name="alamat_domisili" id="alamat_domisili"
                                        value="{{ old('alamat_domisili') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rt_domisili">RT Domisili</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="rt_domisili" maxlength="3" id="rt_domisili"
                                        value="{{ old('rt_domisili') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kelurahan_domisili">Kelurahan Domisili</label>
                                    <input type="text" class="form-control" name="kelurahan_domisili" id="kelurahan_domisili"
                                        value="{{ old('kelurahan_domisili') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_hp">No Handphone</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="no_hp" id="no_hp"
                                        value="{{ old('no_hp') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_anggota_kel">Jumlah Anggota Keluarga</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="jumlah_anggota_kel" id="jumlah_anggota_kel"
                                        value="{{ old('jumlah_anggota_kel') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_keluarga">Jumlah Keluarga</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="jumlah_keluarga" id="jumlah_keluarga"
                                        value="{{ old('jumlah_keluarga') }}" required>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                </div>
<!-- CARD BODY END PENGENALAN TEMPAT                 -->
<!-- CARD BODY KETERANGAN PETUGAS DAN RESPONDEN -->
                <div class="card">
                    <div class="card-body">
                        <h6>II. KETERANGAN PETUGAS DAN RESPONDEN</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggal_pencacah">Tanggal Pencacah</label>
                                    <input type="date" class="form-control" name="tanggal_pencacah" id="tanggal_pencacah"
                                        value="{{ old('tanggal_pencacah') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_pencacah">Nama Pencacah</label>
                                    <input type="text" class="form-control" name="nama_pencacah" id="nama_pencacah"
                                    value="{{ old('nama_pencacah') }}" required onkeyup="myFunction()">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggal_pemeriksa">Tanggal Pemeriksa</label>
                                    <input type="date" class="form-control" name="tanggal_pemeriksa" id="tanggal_pemeriksa"
                                        value="{{ old('tanggal_pemeriksa') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_pemeriksa">Nama Pemeriksa</label>
                                    <input type="text" class="form-control" name="nama_pemeriksa" id="nama_pemeriksa"
                                        value="{{ old('nama_pemeriksa') }}" required onkeyup="myFunction()">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="1">Hasil Pencacah Rumah Tangga <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasil_pencacah" value="1. SELESAI DICACAH" id="1" required>
                                    <label class="form-check-label" for="1">
                                        1. Selesai Dicacah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasil_pencacah" id="2" value="2. RUMAH TANGGA TIDAK DITEMUKAN">
                                    <label class="form-check-label" for="2">
                                        2. Rumah Tangga Tidak Ditemukan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasil_pencacah" id="3" value="3. RUMAH TANGGA PINDAH / BANGUNAN SENSUS TIDAK ADA">
                                    <label class="form-check-label" for="3">
                                        3. Rumah Tangga Pindah / Bangunan Sensus Tidak Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasil_pencacah" id="4" value="4. BAGIAN DARI RUMAH TANGGA LAIN">
                                    <label class="form-check-label" for="4">
                                        4. Bagian Dari Rumah Tangga Lain
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
<!-- CARD BODY END KETERANGAN PETUGAS DAN RESPONDEN     -->            
<!-- CARD BODY KETERANGAN PERUMAHAN -->
                <div class="card">
                    <div class="card-body">
                        <h6>III. KETERANGAN PERUMAHAN DAN KEIKUTSERTAAN PROGRAM</h6>
                        <div class="row">
                            <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="1">Status Penguasaan Bangunan Yang Ditempati <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tempat_tinggal" value="1. MILIK SENDIRI" id="l1" onclick="ShowHideDiv3()" required >
                                    <label class="form-check-label" for="1">
                                        1. Milik Sendiri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tempat_tinggal" id="l2" value="2. KONTRAK / SEWA" onclick="ShowHideDiv3()">
                                    <label class="form-check-label" for="2">
                                        2. Kontrak / Sewa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tempat_tinggal" id="l3" value="3. BEBAS SEWA" onclick="ShowHideDiv3()">
                                    <label class="form-check-label" for="3">
                                        3. Bebas Sewa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tempat_tinggal" id="l4" value="4. DINAS" onclick="ShowHideDiv3()">
                                    <label class="form-check-label" for="4">
                                        4. Dinas
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group" id="dvShow3" style="display:none;">
                                <label for="1">Status Lahan Tempat Tinggal Yang Ditempati <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_lahan" value="1. MILIK SENDIRI" id="1">
                                    <label class="form-check-label" for="1">
                                        1. Milik Sendiri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_lahan" id="2" value="2. MILik ORANG LAIN">
                                    <label class="form-check-label" for="2">
                                        2. Milik Orang Lain
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_lahan" id="3" value="3. TANAH NEGARA">
                                    <label class="form-check-label" for="3">
                                        3. Tanah Negara
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_lahan" id="4" value="4. LAINNYA">
                                    <label class="form-check-label" for="4">
                                        4. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="biaya_pbb">Nilai PBB Dalam Setahun Yang Dibayarkan</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="biaya_pbb" name="biaya_pbb"
                                        value="{{ old('biaya_pbb') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="luas_lantai">Luas Lantai(m2)</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="luas_lantai" name="luas_lantai"
                                        value="{{ old('luas_lantai') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="1">Jenis Lantai Terluas <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" value="1. MARMER / GRANIT" id="1" required>
                                    <label class="form-check-label" for="1">
                                        1. Marmer / Granit
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="2" value="2. KERAMIK">
                                    <label class="form-check-label" for="2">
                                        2. Keramik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="3" value="3. PARKET / VINIL / PERMADANI">
                                    <label class="form-check-label" for="3">
                                        3. Parket / Vinil / Permadani
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="4" value="4. UBIN / TEGEL / TERASO">
                                    <label class="form-check-label" for="4">
                                        4. Ubin / Tegel / Teraso
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="5" value="5. KAYU / PAPAN KUALITAS TINGGI">
                                    <label class="form-check-label" for="5">
                                        5. Kayu / Papan Kualitas Tinggi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="6" value="6. SEMEN / BATA MERAH">
                                    <label class="form-check-label" for="6">
                                        6. Semen / Bata Merah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="7" value="7. BAMBU">
                                    <label class="form-check-label" for="7">
                                        7. Bambu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="8" value="8. KAYU / PAPAN KUALITAS RENDAH">
                                    <label class="form-check-label" for="8">
                                        8. Kayu / Papan Kualitas Rendah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="9" value="9. TANAH">
                                    <label class="form-check-label" for="9">
                                        9. Tanah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_lantai" id="10" value="10. LAINNYA">
                                    <label class="form-check-label" for="10">
                                        10. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="1">Jenis Dinding Terluas <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dinding_terluas" value="1. TEMBOK" id="j1" required onclick="img(0)">
                                    <label class="form-check-label" for="1">
                                        1. Tembok
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dinding_terluas" id="j2" value="2. PLESTERAN ANYAMAN BAMBU / KAWAT" onclick="img(0)">
                                    <label class="form-check-label" for="2">
                                        2. Plesteran Anyaman Bambu / Kawat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dinding_terluas" id="j3" value="3. KAYU / PAPAN" onclick="img(0)">
                                    <label class="form-check-label" for="3">
                                        3. Kayu / Papan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dinding_terluas" id="j4" value="4. ANYAMAN BAMBU" onclick="img(1)">
                                    <label class="form-check-label" for="4">
                                        4. Anyaman Bambu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dinding_terluas" id="j5" value="5. BATANG KAYU" onclick="img(1)">
                                    <label class="form-check-label" for="5">
                                        5. Batang Kayu
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group" id="dvShow4" style="display:none;">
                                <label for="1">Kondisi Dinding <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kualitas_dinding" value="1. BAGUS / KUALITAS TINGGI" id="1">
                                    <label class="form-check-label" for="1">
                                        1. Bagus / Kualitas Tinggi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kualitas_dinding" id="2" value="2. JELEK / KUALITAS RENDAH">
                                    <label class="form-check-label" for="2">
                                        2. Jelek / Kualitas Rendah
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="1">Jenis Atap Terluas <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" value="1. BETON / GENTENG BETON" id="1" required onclick="img1(0)">
                                    <label class="form-check-label" for="1">
                                        1. Beton / Genteng Beton
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="2" value="2. GENTENG KERAMIK" onclick="img1(0)">
                                    <label class="form-check-label" for="2">
                                        2. Genteng Keramik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="3" value="3. GENTENG METAL" onclick="img1(0)">
                                    <label class="form-check-label" for="3">
                                        3. Genteng Metal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="4" value="4. GENTENG TANAH LIAT" onclick="img1(0)">
                                    <label class="form-check-label" for="4">
                                        4. Genteng Tanah Liat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="5" value="5. ASBES" onclick="img1(0)">
                                    <label class="form-check-label" for="5">
                                        5. Asbes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="6" value="6. SENG" onclick="img1(0)">
                                    <label class="form-check-label" for="6">
                                        6. Seng
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="7" value="7. SIRAP" onclick="img1(0)">
                                    <label class="form-check-label" for="7">
                                        7. Sirap
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="8" value="8. BAMBU" onclick="img1(1)">
                                    <label class="form-check-label" for="8">
                                        8. Bambu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="9" value="9. JERAMI / IJUK / DAUN-DAUNAN / RUMBIA" onclick="img1(1)">
                                    <label class="form-check-label" for="9">
                                        9. Jerami / Ijuk / Daun-daunan / Rumbia
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_atap" id="10" value="10. LAINNYA"onclick="img1(1)">
                                    <label class="form-check-label" for="10">
                                        10. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group" id="dvShow5"style="display:none;">
                                <label for="1">Kondisi Atap <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kualitas_atap" value="1. BAGUS / KUALITAS TINGGI" id="1">
                                    <label class="form-check-label" for="1">
                                        1. Bagus / Kualitas Tinggi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kualitas_atap" id="2" value="2. JELEK / KUALITAS RENDAH">
                                    <label class="form-check-label" for="2">
                                        2. Jelek / Kualitas Rendah
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kamar_tidur">Jumlah Kamar Tidur</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="kamar_tidur" name="kamar_tidur" maxlength="3"
                                        value="{{ old('kamar_tidur') }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <fieldset class="form-group">
                                <label for="1">Sumber Air Minum <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" value="1. AIR KEMASAN BERMEREK" id="1" required onclick="img2(1)">
                                    <label class="form-check-label" for="1">
                                        1. Air Kemasan Bermerek
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="2" value="2. AIR ISI ULANG" onclick="img2(1)">
                                    <label class="form-check-label" for="2">
                                        2. Air Isi Ulang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="3" value="3. LEDING METERAN" onclick="img2(0)">
                                    <label class="form-check-label" for="3">
                                        3. Leding Meteran
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="4" value="4. LEDING ECERAN" onclick="img2(1)">
                                    <label class="form-check-label" for="4">
                                        4. Leding Eceran
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="5" value="5. SUMUR BOR / POMPA" onclick="img2(1)">
                                    <label class="form-check-label" for="5">
                                        5. Sumur Bor / Pompa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="6" value="6. SUMUR TERLINDUNG" onclick="img2(1)">
                                    <label class="form-check-label" for="6">
                                        6. Sumur Terlindung
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="7" value="7. SUMUR TAK TERLINDUNG" onclick="img2(1)">
                                    <label class="form-check-label" for="7">
                                        7. Sumur Tak Terlindung
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="8" value="8. MATA AIR TERLINDUNG" onclick="img2(1)">
                                    <label class="form-check-label" for="8">
                                        8. Mata Air Terlindung
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="9" value="9. MATA AIR TAK TERLINDUNG" onclick="img2(1)">
                                    <label class="form-check-label" for="9">
                                        9. Mata Air Tak Terlindung
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="10" value="10. AIR SUNGAI / DANAU / WADUK" onclick="img2(1)">
                                    <label class="form-check-label" for="10">
                                        10. Air Sungai / Danau / Waduk
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="11" value="11. AIR HUJAN" onclick="img2(1)">
                                    <label class="form-check-label" for="11">
                                        11. Air Hujan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="air_minum" id="12" value="12. LAINNYA" onclick="img2(1)">
                                    <label class="form-check-label" for="12">
                                        12. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group" id="dvShow6"style="display:none;">
                                    <label for="biaya_pdam">Biaya Untuk Keperluan Air Minum / PDAM</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="biaya_pdam"  name="biaya_pdam"
                                        value="{{ old('biaya_pdam') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="1">Cara Memperoleh Air Minum <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="perolehan_air_minum" value="1. MEMBELI ECERAN" id="1" required>
                                    <label class="form-check-label" for="1">
                                        1. Membeli Eceran
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="perolehan_air_minum" id="2" value="2. Langganan">
                                    <label class="form-check-label" for="2">
                                        2. Langganan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="perolehan_air_minum" id="3" value="3. TIDAK MEMBELI">
                                    <label class="form-check-label" for="3">
                                        3. Tidak Membeli
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="1">Sumber Penerangan Utama <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penerangan_utama" value="1. LISTRIK PLN" id="1" required onclick="img3(0)">
                                    <label class="form-check-label" for="1">
                                        1. Listrik PLN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penerangan_utama" id="2" value="2. LISTRIK NON PLN" onclick="img3(1)">
                                    <label class="form-check-label" for="2">
                                        2. Listrik Non PLN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penerangan_utama" id="3" value="3. BUKAN LISTRIK" onclick="img3(1)">
                                    <label class="form-check-label" for="3">
                                        3. Bukan Listrik
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-4" id="dvShow7"style="display:none;">
                            <fieldset class="form-group">
                                <label for="1">Daya Listrik <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="daya_listrik" value="1. 450 WATT" id="1" required onclick="img4(0)">
                                    <label class="form-check-label" for="1">
                                        1. 450 Watt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="daya_listrik" id="2" value="2. 900 WATT" onclick="img4(0)">
                                    <label class="form-check-label" for="2">
                                        2. 900 Watt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="daya_listrik" id="3" value="3. 1300 WATT" onclick="img4(0)">
                                    <label class="form-check-label" for="3">
                                        3. 1300 Watt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="daya_listrik" id="4" value="4. 2200 WATT" onclick="img4(0)">
                                    <label class="form-check-label" for="4">
                                        4. 2200 Watt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="daya_listrik" id="5" value="5. > 2200 WATT" onclick="img4(0)">
                                    <label class="form-check-label" for="5">
                                        5. > 2200 Watt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="daya_listrik" id="6" value="6. TANPA METERAN" onclick="img4(1)">
                                    <label class="form-check-label" for="6">
                                        6. Tanpa Meteran
                                    </label>
                                </div>
                            </fieldset>
                            </div>                            
                            <div class="col-md-8">
                                <div class="form-group" id="dvShow8"style="display:none;">
                                    <label for="no_id_pln">No ID Pelanggan Listrik</label>
                                    <input type="text" class="form-control" id="no_id_pln" name="no_id_pln"
                                        value="{{ old('no_id_pln') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="biaya_listrik">Biaya Listrik Yang Dikeluarkan Dalam 1 Bulan</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="biaya_listrik" name="biaya_listrik"
                                        value="{{ old('biaya_listrik') }}" required placeholder="Rp.">
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="1">Bahan Bakar/Energi Utama Untuk Memasak <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" value="1. LISTRIK" id="1" required>
                                    <label class="form-check-label" for="1">
                                        1. Listrik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="2" value="2. GAS > 3 KG">
                                    <label class="form-check-label" for="2">
                                        2. Gas > 3 Kg
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="3" value="3. GAS 3 KG">
                                    <label class="form-check-label" for="3">
                                        3. Gas 3 Kg
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="4" value="4. GAS KOTA / BIOGAS">
                                    <label class="form-check-label" for="4">
                                        4. Gas Kota / Biogas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="5" value="5. MINYAK TANAH">
                                    <label class="form-check-label" for="5">
                                        5. Minyak Tanah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="6" value="6. BRIKET">
                                    <label class="form-check-label" for="6">
                                        6. Briket
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="7" value="7. ARANG">
                                    <label class="form-check-label" for="7">
                                        7. Arang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="8" value="8. KAYU BAKAR">
                                    <label class="form-check-label" for="8">
                                        8. Kayu Bakar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan_bakar_memasak" id="9" value="9. TIDAK MEMASAK DI RUMAH">
                                    <label class="form-check-label" for="9">
                                        9. Tidak Memasak Di Rumah
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="biaya_gas">Biaya Yang Dikeluarkan Dalam 1 Bulan Untuk Keperluan Memasak (Gas/Elpiji)</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="biaya_gas" name="biaya_gas"
                                        value="{{ old('biaya_gas') }}" required placeholder="Rp.">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="1">Penggunaan Fasilitas Tempat Buang Air Besar <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fasilitas_bab" value="1. SENDIRI" id="1" required onclick="img5(0)">
                                    <label class="form-check-label" for="1">
                                        1. Sendiri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fasilitas_bab" id="2" value="2. BERSAMA" onclick="img5(0)">
                                    <label class="form-check-label" for="2">
                                        2. Bersama
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fasilitas_bab" id="3" value="3. UMUM" onclick="img5(0)">
                                    <label class="form-check-label" for="3">
                                        3. Umum
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fasilitas_bab" id="4" value="4. TIDAK ADA" onclick="img5(1)">
                                    <label class="form-check-label" for="4">
                                        4. Tidak Ada
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-6">
                            <fieldset class="form-group" id="dvShow9"style="display:none;">
                                <label for="1">Jenis Kloset <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kloset" value="1. LEHER ANGSA" id="1" required>
                                    <label class="form-check-label" for="1">
                                        1. Leher Angsa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kloset" id="2" value="2. PLENGSENGAN">
                                    <label class="form-check-label" for="2">
                                        2. Plengsengan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kloset" id="3" value="3. CEMPLUNG / CUBLUK">
                                    <label class="form-check-label" for="3">
                                        3. Cemplung / Cubluk
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kloset" id="4" value="4. TIDAK PAKAI">
                                    <label class="form-check-label" for="4">
                                        4. Tidak Pakai
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="1">Tempat Pembuangan Akhir Tinja <span class="required">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pembuangan_akhir_tinja" value="1. TANGKI" id="1" required>
                                    <label class="form-check-label" for="1">
                                        1. Tangki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pembuangan_akhir_tinja" id="2" value="2. SPAL">
                                    <label class="form-check-label" for="2">
                                        2. SPAL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pembuangan_akhir_tinja" id="3" value="3. LUBANG TANAH">
                                    <label class="form-check-label" for="3">
                                        3. Lubang Tanah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pembuangan_akhir_tinja" id="4" value="4. KOLAM / TANAH / SUNGAI / DANAU / LAUT">
                                    <label class="form-check-label" for="4">
                                        4. Kolam / Tanah / Sungai / Danau / Laut
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pembuangan_akhir_tinja" id="5" value="5. PANTAI/ TANAH LAPANG / KEBUN">
                                    <label class="form-check-label" for="5">
                                        5. Pantai / Tanah Lapang / Kebun
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pembuangan_akhir_tinja" id="6" value="6. LAINNYA">
                                    <label class="form-check-label" for="6">
                                        6. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            
                            
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pendapatan_keluarga">Pendapatan Keluarga</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="pendapatan_keluarga" name="pendapatan_keluarga"
                                        value="{{ old('pendapatan_keluarga') }}" required>
                                </div>
                            </div>                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kepemilikan_listrik">Status Kepemilikan Listrik</label>
                                    <input type="text" class="form-control" id="kepemilikan_listrik" name="kepemilikan_listrik"
                                        value="{{ old('kepemilikan_listrik') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bukan_pln">Bukan Pelanggan PLN</label>
                                    <input type="text" class="form-control" id="bukan_pln" name="bukan_pln"
                                        value="{{ old('bukan_pln') }}" required>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_gas">Kepemilikan Tabung Gas 5,5 Kg Atau Lebih<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_gas" value="Ya" id="kepemilikan_gas" required>
                                    <label class="form-check-label" for="kepemilikan_gas">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_gas" id="kepemilikan_gas" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_gas">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_kulkas">Kepemilikan Lemari Es/Kulkas<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_kulkas" value="Ya" id="kepemilikan_kulkas" required>
                                    <label class="form-check-label" for="kepemilikan_kulkas">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_kulkas" id="kepemilikan_kulkas" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_kulkas">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_ac">Kepemilikan AC<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_ac" value="Ya" id="kepemilikan_ac" required>
                                    <label class="form-check-label" for="kepemilikan_ac">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_ac" id="kepemilikan_ac" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_ac">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_pemanas_air">Kepemilikan Pemanas Air<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_pemanas_air" value="Ya" id="kepemilikan_pemanas_air" required>
                                    <label class="form-check-label" for="kepemilikan_pemanas_air">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_pemanas_air" id="kepemilikan_pemanas_air" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_pemanas_air">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_telepon_rumah">Kepemilikan Telepon Rumah<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_telepon_rumah" value="Ya" id="kepemilikan_telepon_rumah" required>
                                    <label class="form-check-label" for="kepemilikan_telepon_rumah">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_telepon_rumah" id="kepemilikan_telepon_rumah" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_telepon_rumah">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_tv">Kepemilikan TV Layar Datar Minimal 30"<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_tv" value="Ya" id="kepemilikan_tv" required>
                                    <label class="form-check-label" for="kepemilikan_tv">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_tv" id="kepemilikan_tv" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_tv">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_emas">Kepemilikan Emas/Perhiasan Dan Tabungan<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_emas" value="Ya" id="kepemilikan_emas" required>
                                    <label class="form-check-label" for="kepemilikan_emas">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_emas" id="kepemilikan_emas" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_emas">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_hp">Kepemilikan HP Yang Aktif<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_hp" value="Ya" id="kepemilikan_hp" required>
                                    <label class="form-check-label" for="kepemilikan_hp">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_hp" id="kepemilikan_hp" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_hp">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> 
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_komputer">Kepemilikan Komputer/Laptop/Tablet<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_komputer" value="Ya" id="kepemilikan_komputer" required>
                                    <label class="form-check-label" for="kepemilikan_komputer">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_komputer" id="kepemilikan_komputer" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_komputer">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <!-- <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_sepeda">Kepemilikan Sepeda<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_sepeda" value="Ya" id="kepemilikan_sepeda" required>
                                    <label class="form-check-label" for="kepemilikan_sepeda">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_sepeda" id="kepemilikan_sepeda" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_sepeda">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> -->
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_motor">Kepemilikan Sepeda Motor<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_motor" value="Ya" id="kepemilikan_motor" required>
                                    <label class="form-check-label" for="kepemilikan_motor">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_motor" id="kepemilikan_motor" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_motor">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_mobil">Kepemilikan Mobil<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_mobil" value="Ya" id="kepemilikan_mobil" required>
                                    <label class="form-check-label" for="kepemilikan_mobil">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_mobil" id="kepemilikan_mobil" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_mobil">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_perahu">Kepemilikan Perahu<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_perahu" value="Ya" id="kepemilikan_perahu" required>
                                    <label class="form-check-label" for="kepemilikan_perahu">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_perahu" id="kepemilikan_perahu" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_perahu">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <!-- <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_motor_tempel">Kepemilikan Motor Tempel<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_motor_tempel" value="Ya" id="kepemilikan_motor_tempel" required>
                                    <label class="form-check-label" for="kepemilikan_motor_tempel">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_motor_tempel" id="kepemilikan_motor_tempel" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_motor_tempel">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> -->
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_perahu_motor">Kepemilikan Perahu Motor<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_perahu_motor" value="Ya" id="kepemilikan_perahu_motor" required>
                                    <label class="form-check-label" for="kepemilikan_perahu_motor">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_perahu_motor" id="kepemilikan_perahu_motor" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_perahu_motor">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <!-- <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_kapal">Kepemilikan Kapal<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_kapal" value="Ya" id="kepemilikan_kapal" required>
                                    <label class="form-check-label" for="kepemilikan_kapal">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_kapal" id="kepemilikan_kapal" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_kapal">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pajak_sepeda_motor">Pajak Sepeda Motor Per Tahun</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="pajak_sepeda_motor" name="pajak_sepeda_motor"
                                        value="{{ old('pajak_sepeda_motor') }}" required placeholder="Rp.">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="berapa_motor">Untuk Berapa Motor</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="berapa_motor" name="berapa_motor"
                                        value="{{ old('berapa_motor') }}" required placeholder="Rp.">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pajak_mobil">Pajak Mobil Per Tahun</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="pajak_mobil" name="pajak_mobil"
                                        value="{{ old('pajak_mobil') }}" required placeholder="Rp.">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="berapa_mobil">Untuk Berapa Mobil</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="berapa_mobil" name="berapa_mobil"
                                        value="{{ old('berapa_mobil') }}" required placeholder="Rp.">
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_lahan_lain">Kepemilikan Lahan Ditempat Lain<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_lahan_lain" value="Ya" id="chkYes2" required onclick="ShowHideDiv2()">
                                    <label class="form-check-label" for="kepemilikan_lahan_lain">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_lahan_lain" id="chkNo" value="Tidak" onclick="ShowHideDiv2()">
                                    <label class="form-check-label" for="kepemilikan_lahan_lain">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>      
                            <div class="col-md-12">
                                <div class="form-group" id="dvShow2" style="display:none;">
                                    <label for="luas_lahan_lain">Luas Lahan Ditempat Lain</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="luas_lahan_lain"
                                        value="{{ old('luas_lahan_lain') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="rumah_di_tempat_lain">Kepemilikan Rumah Ditempat Lain<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rumah_di_tempat_lain" value="Ya" id="rumah_di_tempat_lain" required>
                                    <label class="form-check-label" for="rumah_di_tempat_lain">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rumah_di_tempat_lain" id="rumah_di_tempat_lain" value="Tidak">
                                    <label class="form-check-label" for="rumah_di_tempat_lain">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_sapi">Jumlah Sapi</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="jumlah_sapi" name="jumlah_sapi" maxlength="3"
                                        value="{{ old('jumlah_sapi') }}" required placeholder="Isi Data">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_kerbau">Jumlah Kerbau</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="jumlah_kerbau" name="jumlah_kerbau" maxlength="3"
                                        value="{{ old('jumlah_kerbau') }}" required placeholder="Isi Data">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_kuda">Jumlah Kuda</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="jumlah_kuda" name="jumlah_kuda" maxlength="3"
                                        value="{{ old('jumlah_kuda') }}" required placeholder="Isi Data">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_babi">Jumlah Babi</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="jumlah_babi" name="jumlah_babi" maxlength="3"
                                        value="{{ old('jumlah_babi') }}" required placeholder="Isi Data">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_kambing">Jumlah Kambing / Domba</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="jumlah_kambing"  name="jumlah_kambing" maxlength="3"
                                        value="{{ old('jumlah_kambing') }}"required placeholder="Isi Data">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_ayam">Jumlah Ayam / Bebek</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="jumlah_ayam"  name="jumlah_ayam" maxlength="3"
                                        value="{{ old('jumlah_ayam') }}"required placeholder="Isi Data">
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="keluarga_memiliki_usaha">Terdapat Anggota Rumah Tangga Yang Memiliki Usaha<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluarga_memiliki_usaha" value="Ya" id="keluarga_memiliki_usaha" required>
                                    <label class="form-check-label" for="keluarga_memiliki_usaha">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keluarga_memiliki_usaha" id="keluarga_memiliki_usaha" value="Tidak">
                                    <label class="form-check-label" for="keluarga_memiliki_usaha">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> -->
                            <div class="col-md-7">
                            <fieldset class="form-group">
                                <label for="angsuran_kredit_kendaraan">Apakah Saat Ini Memiliki Angsuran Kredit Pembelian Kendaraan<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="angsuran_kredit_kendaraan" value="Ya" id="chkYes" required onclick="img6(0)">
                                    <label class="form-check-label" for="angsuran_kredit_kendaraan">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="angsuran_kredit_kendaraan" id="angsuran_kredit_kendaraan" value="Tidak" onclick="img6(1)">
                                    <label class="form-check-label" for="angsuran_kredit_kendaraan">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>      
                            <div class="col-md-5">
                                <div class="form-group" id="dvShow10" style="display:none;">
                                    <label for="besaran_angsuran">Besaran Angsuran Setiap Bulan</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="besaran_angsuran"
                                        value="{{ old('besaran_angsuran') }}" placeholder="Rp.">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="biaya_sampah">Biaya Retribusi Sampah Yang Dikeluarkan Dalam 1 Bulan</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="biaya_sampah"  name="biaya_sampah"
                                        value="{{ old('biaya_sampah') }}" required placeholder="Rp.">
                                </div>
                            </div> 
                            <!-- <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="punya_kks">Punya KKS<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_kks" value="Ya" id="punya_kks" required>
                                    <label class="form-check-label" for="punya_kks">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_kks" id="punya_kks" value="Tidak">
                                    <label class="form-check-label" for="punya_kks">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="punya_kip">Punya KIP<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_kip" value="Ya" id="punya_kip" required>
                                    <label class="form-check-label" for="punya_kip">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_kip" id="punya_kip" value="Tidak">
                                    <label class="form-check-label" for="punya_kip">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="punya_kis">Punya KIS<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_kis" value="Ya" id="punya_kis" required>
                                    <label class="form-check-label" for="punya_kis">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_kis" id="punya_kis" value="Tidak">
                                    <label class="form-check-label" for="punya_kis">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="punya_bpjs_mandiri">Punya BPJS Mandiri<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_bpjs_mandiri" value="Ya" id="punya_bpjs_mandiri" required>
                                    <label class="form-check-label" for="punya_bpjs_mandiri">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_bpjs_mandiri" id="punya_bpjs_mandiri" value="Tidak">
                                    <label class="form-check-label" for="punya_bpjs_mandiri">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="punya_jamsostek">Punya Jamsostek<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_jamsostek" value="Ya" id="punya_jamsostek" required>
                                    <label class="form-check-label" for="punya_jamsostek">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="punya_jamsostek" id="punya_jamsostek" value="Tidak">
                                    <label class="form-check-label" for="punya_jamsostek">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="asuransi_kesehatan_lain">Punya Asuransi Kesehatan Lain<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="asuransi_kesehatan_lain" value="Ya" id="asuransi_kesehatan_lain" required>
                                    <label class="form-check-label" for="asuransi_kesehatan_lain">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="asuransi_kesehatan_lain" id="asuransi_kesehatan_lain" value="Tidak">
                                    <label class="form-check-label" for="asuransi_kesehatan_lain">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="peserta_pkh">Peserta PKH<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peserta_pkh" value="Ya" id="peserta_pkh" required>
                                    <label class="form-check-label" for="peserta_pkh">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peserta_pkh" id="peserta_pkh" value="Tidak">
                                    <label class="form-check-label" for="peserta_pkh">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="peserta_raskin">Peserta Raskin<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peserta_raskin" value="Ya" id="peserta_raskin" required>
                                    <label class="form-check-label" for="peserta_raskin">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peserta_raskin" id="peserta_raskin" value="Tidak">
                                    <label class="form-check-label" for="peserta_raskin">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> -->
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="perbaikan_rumah">Apakah Rumah Saudara Pernah Mendapatkan Program Perbaikan Rumah Dari Pemerintah Kota?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="perbaikan_rumah" value="Ya" id="perbaikan_rumah" required>
                                    <label class="form-check-label" for="perbaikan_rumah">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="perbaikan_rumah" id="perbaikan_rumah" value="Tidak">
                                    <label class="form-check-label" for="perbaikan_rumah">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_pemakaman">Apakah Rumah Tangga Mendapatkan Bantuan Pemakaman?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_pemakaman" value="Ya" id="bantuan_pemakaman" required>
                                    <label class="form-check-label" for="bantuan_pemakaman">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_pemakaman" id="bantuan_pemakaman" value="Tidak">
                                    <label class="form-check-label" for="bantuan_pemakaman">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_rumah_susun">Apakah Mendapatkan Bantuan Rumah Susun?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_rumah_susun" value="Ya" id="bantuan_rumah_susun" required>
                                    <label class="form-check-label" for="bantuan_rumah_susun">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_rumah_susun" id="bantuan_rumah_susun" value="Tidak">
                                    <label class="form-check-label" for="bantuan_rumah_susun">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_kursi_roda">Apakah Mendapatkan Bantuan Lainnya?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_kursi_roda" value="Ya" id="bantuan_kursi_roda" required>
                                    <label class="form-check-label" for="bantuan_kursi_roda">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_kursi_roda" id="bantuan_kursi_roda" value="Tidak">
                                    <label class="form-check-label" for="bantuan_kursi_roda">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_modal_usaha">Apakah Mendapatkan Bantuan Modal Usaha?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_modal_usaha" value="Ya" id="bantuan_modal_usaha" required>
                                    <label class="form-check-label" for="bantuan_modal_usaha">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_modal_usaha" id="bantuan_modal_usaha" value="Tidak">
                                    <label class="form-check-label" for="bantuan_modal_usaha">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_becak">Apakah Mendapatkan Bantuan Becak?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_becak" value="Ya" id="bantuan_becak" required>
                                    <label class="form-check-label" for="bantuan_becak">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_becak" id="bantuan_becak" value="Tidak">
                                    <label class="form-check-label" for="bantuan_becak">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_sepeda_roda3">Apakah Mendapatkan Bantuan Sepeda Motor Roda 3?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_sepeda_roda3" value="Ya" id="bantuan_sepeda_roda3" required>
                                    <label class="form-check-label" for="bantuan_sepeda_roda3">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_sepeda_roda3" id="bantuan_sepeda_roda3" value="Tidak">
                                    <label class="form-check-label" for="bantuan_sepeda_roda3">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_kaki_palsu">Apakah Mendapatkan Bantuan Kaki Palsu?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_kaki_palsu" value="Ya" id="bantuan_kaki_palsu" required>
                                    <label class="form-check-label" for="bantuan_kaki_palsu">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_kaki_palsu" id="bantuan_kaki_palsu" value="Tidak">
                                    <label class="form-check-label" for="bantuan_kaki_palsu">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_gerobak">Apakah Mendapatkan Bantuan Gerobak / Rombong?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_gerobak" value="Ya" id="bantuan_gerobak" required>
                                    <label class="form-check-label" for="bantuan_gerobak">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_gerobak" id="bantuan_gerobak" value="Tidak">
                                    <label class="form-check-label" for="bantuan_gerobak">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_tempat_tidur">Apakah Mendapatkan Bantuan Tempat Tidur?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_tempat_tidur" value="Ya" id="bantuan_tempat_tidur" required>
                                    <label class="form-check-label" for="bantuan_tempat_tidur">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_tempat_tidur" id="bantuan_tempat_tidur" value="Tidak">
                                    <label class="form-check-label" for="bantuan_tempat_tidur">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_bedah_rumah">Apakah Mendapatkan Bantuan Bedah Rumah dari CSR?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_bedah_rumah" value="Ya" id="bantuan_bedah_rumah" required>
                                    <label class="form-check-label" for="bantuan_bedah_rumah">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_bedah_rumah" id="bantuan_bedah_rumah" value="Tidak">
                                    <label class="form-check-label" for="bantuan_bedah_rumah">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="bantuan_bencana">Apakah Mendapatkan Bantuan Bencana/Kebakaran?<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_bencana" value="Ya" id="bantuan_bencana" required>
                                    <label class="form-check-label" for="bantuan_bencana">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bantuan_bencana" id="bantuan_bencana" value="Tidak">
                                    <label class="form-check-label" for="bantuan_bencana">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>

                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="peserta_kur">Apakah Memiliki Angsuran Kredit Untuk Usaha <span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peserta_kur" value="Ya" id="peserta_kur" required>
                                    <label class="form-check-label" for="peserta_kur">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peserta_kur" id="peserta_kur" value="Tidak">
                                    <label class="form-check-label" for="peserta_kur">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_hp">Jumlah HP</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="jumlah_hp" name="jumlah_hp"
                                        value="{{ old('jumlah_hp') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_hp_aktif">Jumlah Nomor HP Aktif</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="no_hp_aktif" name="no_hp_aktif"
                                        value="{{ old('no_hp_aktif') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tv_30_inc">Jumlah Kepemilikan TV Layar Datar 30 Inchi</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="tv_30_inc" name="tv_30_inc"
                                        value="{{ old('tv_30_inc') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="telpon_seluler_usaha">Telepon Seluler Diperlukan Untuk Keperluan Usaha<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="telpon_seluler_usaha" value="Ya" id="telpon_seluler_usaha" required>
                                    <label class="form-check-label" for="telpon_seluler_usaha">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="telpon_seluler_usaha" id="telpon_seluler_usaha" value="Tidak">
                                    <label class="form-check-label" for="telpon_seluler_usaha">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="kepemilikan_tablet">Kepemilikan Tablet<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_tablet" value="Ya" id="kepemilikan_tablet" required>
                                    <label class="form-check-label" for="kepemilikan_tablet">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikan_tablet" id="kepemilikan_tablet" value="Tidak">
                                    <label class="form-check-label" for="kepemilikan_tablet">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cara_sambungan_layanan">Cara Memperoleh Sambungan Layanan</label>
                                    <input type="text" class="form-control" id="cara_sambungan_layanan" name="cara_sambungan_layanan"
                                        value="{{ old('cara_sambungan_layanan') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="berapa_kali_isi_pulsa_per_minggu">Berapa Kali Isi Pulsa Dalam 1 Minggu</label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="berapa_kali_isi_pulsa_per_minggu" name="berapa_kali_isi_pulsa_per_minggu"
                                        value="{{ old('berapa_kali_isi_pulsa_per_minggu') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mengunjungi_blc">Apakah pernah pengunjungi Warnet / BLC</label>
                                    <input type="text" class="form-control" id="mengunjungi_blc" name="mengunjungi_blc"
                                        value="{{ old('mengunjungi_blc') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mengunjungi_warnet_per_minggu">Berapa Kali Mengunjungi Warnet Dalam 1 Minggu</label>
                                    <input type="text"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="mengunjungi_warnet_per_minggu" name="mengunjungi_warnet_per_minggu"
                                        value="{{ old('mengunjungi_warnet_per_minggu') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cara_memperoleh_sebagian_aset">Cara Memperoleh Sebagian Besar Aset</label>
                                    <input type="text" class="form-control" id="cara_memperoleh_sebagian_aset" name="cara_memperoleh_sebagian_aset"
                                        value="{{ old('cara_memperoleh_sebagian_aset') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="aset_untuk_usaha">Apakah Aset Tersebut Dimanfaatkan Untuk Usaha<span class="required">*</span>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="aset_untuk_usaha" value="Ya" id="aset_untuk_usaha" required>
                                    <label class="form-check-label" for="aset_untuk_usaha">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="aset_untuk_usaha" id="aset_untuk_usaha" value="Tidak">
                                    <label class="form-check-label" for="aset_untuk_usaha">
                                        Tidak
                                    </label>
                                </div>
                            </fieldset>
                            </div>-->
                        </div>
                    </div>
                </div>
<!-- CARD BODY END KEPEMILIKAN ASET DAN KEIKUTSERTAAN PROGRAM -->

                <div class="col-12 d-flex justify-content-start">
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                </div>
            </section>
        </form>
    </div>
@endsection

<script type="text/javascript" language="javascript">

    function myFunction() {
      var x = document.getElementById("kecamatan");
      x.value = x.value.toUpperCase();
      var x1 = document.getElementById("kelurahan");
      x1.value = x1.value.toUpperCase();
      var x2 = document.getElementById("alamat");
      x2.value = x2.value.toUpperCase();
      var x3 = document.getElementById("nama_kepala_keluarga");
      x3.value = x3.value.toUpperCase();
      var x4 = document.getElementById("nama_pencacah");
      x4.value = x4.value.toUpperCase();
      var x5 = document.getElementById("nama_pemeriksa");
      x5.value = x5.value.toUpperCase();
    }

    function validateFileType(){
        var fileName = document.getElementById("fileName").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");

        }   
    }

    function validateFileType1(){
        var fileName = document.getElementById("fileName1").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            
        }   
    }
    function validateFileType2(){
        var fileName = document.getElementById("fileName2").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            
        }   
    }
    function validateFileType3(){
        var fileName = document.getElementById("fileName3").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            
        }   
    }
    function validateFileType4(){
        var fileName = document.getElementById("fileName4").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
            
        }   
    }
    
            
    
            
    </script>