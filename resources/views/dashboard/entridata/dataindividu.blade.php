@extends('layouts.dashboard')
@section('custom-stylesheet')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/dselect.css">
@endsection
@section('main-content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last"></div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-md-end float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard/">Dashboard</a></li>
                            {{-- <li class="breadcrumb-item"><a href="/insiden/">Insiden</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Edit Detail</li>
                        </ol>
                    </nav>
                </div>
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

    <form method="post" action="/entridata/svDataindividu" enctype="multipart/form-data">
        @csrf
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Individu</h4>
                </div>
                <div class="card-body">

{{-- Field Untuk NO KK APabila Sudah di gabung dengan DATA ART--}}
                    {{-- <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="noKK">Nomor Kartu Keluarga</label>
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control" id="noKK" name="noKK"
                                    value="{{ old('noKK') }}" required>
                            </div>
                        </div>
                    </div> --}}
{{-- END Field Untuk NO KK APabila Sudah di gabung dengan DATA ART--}}


                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nik">NIK Anggota Keluarga<span class="required">*</span> </label>
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control"  id="nik" name="nik"
                                    value='{{ old('nik') }}' required>
                            </div>
                        </div>
                    </div>

                       <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="namaAnggotaKeluarga">Nama Anggota Keluarga<span class="required">*</span> </label>
                                    <input type="text" class="form-control" id="namaAnggotaKeluarga" onkeyup="myFunction()" name="namaAnggotaKeluarga"
                                        value='{{ old('namaAnggotaKeluarga') }}' required>
                                </div>
                            </div>
                        </div>

{{-- Radio Button Hubungan degn kepala keluarga --}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="1">Hubungan dengan kepala keluarga <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" value="1. KEPALA RUMAH TANGGA" id="1">
                                    <label class="form-check-label" for="1">
                                        1. Kepala Rumah Tangga
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" id="2" value="2. SUAMI/ISTRI">
                                    <label class="form-check-label" for="2">
                                        2. Suami / Istri
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" id="3" value="3. ANAK">
                                    <label class="form-check-label" for="3">
                                        3. Anak
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" id="4" value="4. MENANTU">
                                    <label class="form-check-label" for="4">
                                        4. Menantu
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" id="5" value="5. CUCU">
                                    <label class="form-check-label" for="5">
                                        5. Cucu
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" id="6" value="6. ORANG TUA/MERTUA">
                                    <label class="form-check-label" for="6">
                                        6. Orang Tua / Mertua
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" id="7" value="7. PEMBANTU RUTA">
                                    <label class="form-check-label" for="7">
                                       7. Pembantu Ruta
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplkeluarga" id="8" value="8. LAINNYA">
                                    <label class="form-check-label" for="8">
                                       8. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- End Radio Button Hubungan degn kepala keluarga --}}


{{-- Radio Button keberadaan anggot keluarga --}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="keberedaankeluarga">Keberadaan Anggota Keluarga <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keberedaankeluarga" value="1. TINGGAL BERSAMA" id="keberedaankeluarga">
                                    <label class="form-check-label" for="keberedaankeluarga">
                                        1. Tinggal Bersama
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keberedaankeluarga" id="keberedaankeluarga1" value="2. MENINGGAL">
                                    <label class="form-check-label" for="keberedaankeluarga1">
                                        2. Meninggal
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keberedaankeluarga" id="keberedaankeluarga2" value="3. TIDAK TINGGAL BERSAMA KELUARGA">
                                    <label class="form-check-label" for="keberedaankeluarga2">
                                        3. Tidak Tinggal Bersama Keluarga / Pindah
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keberedaankeluarga" id="keberedaankeluarga3" value="4. ANGGOTA KELUARGA BARU">
                                    <label class="form-check-label" for="keberedaankeluarga3">
                                        4. Anggota Keluarga Baru
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="keberedaankeluarga" id="keberedaankeluarga4" value="5. TIDAK DITEMUKAN">
                                    <label class="form-check-label" for="keberedaankeluarga4">
                                        5. Tidak Ditemukan
                                    </label>
                                </div>

                            </fieldset>
                        </div>
{{-- End Radio Button keberadaan anggot keluarga --}}

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nourut">No Urut Keluarga Ke <span class="required">*</span> </label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control"  id="nourut" name="nourut"
                                        value='{{ old('nourut') }}' >
                                </div>
                            </div>
                        </div>

{{-- Radio Button Hubungan degn kepala Rumah Tangga --}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="1">Hubungan dengan kepala Rumah Tangga <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" value="1. KEPALA KELUARGA" id="hubungankplrmhtangga1">
                                    <label class="form-check-label" for="hubungankplrmhtangga1">
                                        1. Kepala Keluarga
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" id="hubungankplrmhtangga2" value="2. SUAMI/ISTRI">
                                    <label class="form-check-label" for="hubungankplrmhtangga2">
                                        2. Suami / Istri
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" id="hubungankplrmhtangga3" value="3. ANAK">
                                    <label class="form-check-label" for="hubungankplrmhtangga3">
                                        3. Anak
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" id="hubungankplrmhtangga4" value="4. MENANTU">
                                    <label class="form-check-label" for="hubungankplrmhtangga4">
                                        4. Menantu
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" id="hubungankplrmhtangga5" value="5. CUCU">
                                    <label class="form-check-label" for="hubungankplrmhtangga5">
                                        5. Cucu
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" id="hubungankplrmhtangga6" value="6. ORANGTUA/MERTUA">
                                    <label class="form-check-label" for="hubungankplrmhtangga6">
                                        6. Orang Tua / Mertua
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" id="hubungankplrmhtangga7" value="7. PEMBANTU RUTA">
                                    <label class="form-check-label" for="hubungankplrmhtangga7">
                                    7. Pembantu Ruta
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hubungankplrmhtangga" id="hubungankplrmhtangga8" value="8. LAINNYA">
                                    <label class="form-check-label" for="hubungankplrmhtangga8">
                                    8. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- End Radio Button Hubungan degn kepala keluarga --}}

{{-- Radio Button Jenis Kelamin --}}
                    <div class="col-md-10">
                        <fieldset class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin <span class="required">*</span> </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" value="PRIA" id="jeniskelamin">
                                <label class="form-check-label" for="jeniskelamin">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin2" value="WANITA">
                                <label class="form-check-label" for="jeniskelamin2">
                                    Wanita
                                </label>
                            </div>
                        </fieldset>
                    </div>
{{-- Radio Button Jenis Kelamin --}}

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggallahir">Tanggal Lahir<span class="required">*</span> </label>
                                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                                    value='{{ old('tanggallahir') }}' >
                            </div>
                        </div>


{{-- Radio Button Status Perkawinan--}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="1">Status Perkawinan <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statusperkawinan" value="1. BELUM KAWIN" id="statusperkawinan1">
                                    <label class="form-check-label" for="statusperkawinan1">
                                        1. Belum Kawin
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statusperkawinan" id="statusperkawinan2" value="2. KAWIN ATAU NIKAH">
                                    <label class="form-check-label" for="statusperkawinan2">
                                        2. Kawin Atau Nikah
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statusperkawinan" id="statusperkawinan3" value="3. CERAI HIDUP">
                                    <label class="form-check-label" for="statusperkawinan3">
                                        3. Cerai Hidup
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statusperkawinan" id="statusperkawinan4" value="4. CERAI MATI">
                                    <label class="form-check-label" for="statusperkawinan4">
                                        4. Cerai Mati
                                    </label>
                                </div>


                            </fieldset>
                        </div>
{{-- End Radio Button Status Perkawinan--}}

{{-- Radio Button Kepemilikan Akta / Buku Nikah / Akta Cerai--}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="1">Kepemilikan Akta / Buku Nikah / Akta Cerai <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanbukunikah" value="0. TIDAK" id="kepemilikanbukunikah1">
                                    <label class="form-check-label" for="kepemilikanbukunikah1">
                                        0. Tidak
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanbukunikah" id="kepemilikanbukunikah2" value="1. YA, DAPAT DI TUNJUKAN">
                                    <label class="form-check-label" for="kepemilikanbukunikah2">
                                        1. Ya, Dapat Di Tunjukan
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanbukunikah" id="kepemilikanbukunikah3" value="2. YA, TIDAK DAPAT DITUNJUKAN">
                                    <label class="form-check-label" for="kepemilikanbukunikah3">
                                        2. Ya, Tidak Dapat Di Tunjuka
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- End Radio Button Kepemilikan Akta / Buku Nikah / Akta Cerai--}}

{{-- Radio Button Kepemilikan Identitas--}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="1">Kepemilikan Identitas <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanidentitas" value="0. TIDAK ADA" id="kepemilikanidentitas1">
                                    <label class="form-check-label" for="kepemilikanidentitas1">
                                        0. Tidak Ada
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanidentitas" id="kepemilikanidentitas2" value="1. AKTA">
                                    <label class="form-check-label" for="kepemilikanidentitas2">
                                        1. Akta
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanidentitas" id="kepemilikanidentitas3" value="2. KARTU PELAJAR">
                                    <label class="form-check-label" for="kepemilikanidentitas3">
                                        2. Kartu Pelajar 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanidentitas" id="kepemilikanidentitas4" value="3. KTP">
                                    <label class="form-check-label" for="kepemilikanidentitas4">
                                        3. KTP
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kepemilikanidentitas" id="kepemilikanidentitas5" value="4. SIM">
                                    <label class="form-check-label" for="kepemilikanidentitas5">
                                        4. SIM
                                    </label>
                                </div>

                            </fieldset>
                        </div>
{{-- End Radio Button Kepemilikan Identitas--}}

{{-- Radio Button Status Kehamilan --}}
                    <div class="col-md-10">
                        <fieldset class="form-group">
                            <label for="statuskehamilan">Apakah Saat Ini Sedang Hamil ? <span class="required">*</span> </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="statuskehamilan" onchange="handleChange1();" value="1. Ya" id="statuskehamilan">
                                <label class="form-check-label" for="statuskehamilan">
                                    1. Ya
                                    <input class="form-control" id="div_kehamilan"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="" style="display:none" type="text" name="statuskehamilan" value=" {{ old('statuskehamilan') }}" id="statuskehamilan" placeholder="Bulan">
                                    {{-- <input class="form-control" id="div_kehamilan"   maxlength="" style="display:none" type="text" hidden name="statuskehamilan" value=" -BULAN" id="statuskehamilan" placeholder="Bulan"> --}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="statuskehamilan" onchange="handleChange2();" id="statuskehamilan2" value="2">
                                <label class="form-check-label" for="statuskehamilan2">
                                    2. Tidak
                                </label>
                            </div>
                        </fieldset>
                    </div>
{{-- Radio Button Status Kehamilan --}}

{{-- Radio Button Jenis Cacat--}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="1">Jenis Cacat <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat1" value="0. TIDAK ADA">
                                    <label class="form-check-label" for="jeniscacat1">
                                        0. Tidak Ada
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat2" value="1. TUNA DAKSA/CACAT TUBUH">
                                    <label class="form-check-label" for="jeniscacat2">
                                        1. Tuna Daksa / Cacat Tubuh
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat3" value="2. TUNA NETRA">
                                    <label class="form-check-label" for="jeniscacat3">
                                        2. Tuna Netra / Buta
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat4" value="3 TUNA RUNGU">
                                    <label class="form-check-label" for="jeniscacat4">
                                        3. Tuna Rungu 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat5" value="4. TUNA WICARA">
                                    <label class="form-check-label" for="jeniscacat5">
                                        4. Tuna Wicara 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat6" value="5. TUNA RUNGU DAN TUNA WICARA">
                                    <label class="form-check-label" for="jeniscacat6">
                                        5. Tuna Rungu Dan Tuna Wicara 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat7" value="6. TUNA NETRA DAN CACAT TUBUH">
                                    <label class="form-check-label" for="jeniscacat7">
                                        6. Tuna Netra Dan Cacat Tubuh 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat8" value="7. TUNA NETRA, RUNGU DAN WICARA">
                                    <label class="form-check-label" for="jeniscacat8">
                                        7. Tuna Netra, Rungu dan Wicara 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat9" value="8. TUNA RUNGU, WICARA DAN CACAT TUBUH">
                                    <label class="form-check-label" for="jeniscacat9">
                                        8. Tuna Rungu, Wicara dan Cacat Tubuh 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat10" value="9. TUNA RUNGU, WICARA, NETRA DAN CACAT TUBUH">
                                    <label class="form-check-label" for="jeniscacat10">
                                        9. Tuna Rungu, Wicara, Netra dan Cacat Tubuh 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat11" value="10. CACAT MENTAL RETARDASI">
                                    <label class="form-check-label" for="jeniscacat11">
                                        10. Cacat Mental Retardasi
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat12" value="11. MANTAN PENDERITA GANGGUAN JIWA">
                                    <label class="form-check-label" for="jeniscacat12">
                                        11. Mantan Penderita Gangguan Jiwa
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniscacat" id="jeniscacat13" value="12. CACAT FISIK DAN MENTAL">
                                    <label class="form-check-label" for="jeniscacat13">
                                        12. Cacat Fisik Dan Mental 
                                    </label>
                                </div>

                            </fieldset>
                        </div>
{{-- End Radio Button Jenis Cacat--}}

{{-- Radio Button Penyakit Kronis / Menahun--}}
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label for="1">Penyakit Kronis / Menahun <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis1" value="0. TIDAK ADA">
                                    <label class="form-check-label" for="penyakitkronis1">
                                        0. Tidak Ada
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis2" value="1. HIPERTENSI">
                                    <label class="form-check-label" for="penyakitkronis2">
                                        1. Hipertensi (Tekanan Darah Tinggi)
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis3" value="2. REMATIK">
                                    <label class="form-check-label" for="penyakitkronis3">
                                        2. Rematik
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis4" value="3. ASMA">
                                    <label class="form-check-label" for="penyakitkronis4">
                                        3. Asma
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis5" value="4. MASALAH JANTUNG">
                                    <label class="form-check-label" for="penyakitkronis5">
                                        4. Masalah Jantung 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis6" value="5. DIABETES">
                                    <label class="form-check-label" for="penyakitkronis6">
                                        5. Diabetes (Kencing Manis) 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis7" value="6. TBC">
                                    <label class="form-check-label" for="penyakitkronis7">
                                        6. Tuberkolosis (TBC) 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis8" value="7. STROKE">
                                    <label class="form-check-label" for="penyakitkronis8">
                                        7. Stroke
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis9" value="8. KANKER ATAU TUMOR GANAS">
                                    <label class="form-check-label" for="penyakitkronis9">
                                        8. Kanker Atau Tumor Ganas 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyakitkronis" id="penyakitkronis10" value="9. LAINNYA">
                                    <label class="form-check-label" for="penyakitkronis10">
                                        9. Lainnya (Gagal Ginjal, Paru Paru Flek dan Sejenisnya)
                                    </label>
                                </div>

                            </fieldset>
                        </div>
{{-- End Radio Button Penyakit Kronis / Menahun--}}

{{-- Radio Button BPJS Kesehatan Peserta Mandiri --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="bpjsmandiri">BPJS Kesehatan Peserta Mandiri <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bpjsmandiri" value="1. YA" id="bpjsmandiri1">
                                    <label class="form-check-label" for="bpjsmandiri1">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bpjsmandiri" id="bpjsmandiri2" value="2. TIDAK">
                                    <label class="form-check-label" for="bpjsmandiri2">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button BPJS Kesehatan Peserta Mandiri --}}

{{-- Radio Button BPJS Ketenagakerjaan (Jamsostek) --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="bpjsketenagakerjaan">BPJS Ketenagakerjaan (Jamsostek) <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bpjsketenagakerjaan" value="1. YA" id="bpjsketenagakerjaan">
                                    <label class="form-check-label" for="bpjsketenagakerjaan">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bpjsketenagakerjaan" id="bpjsketenagakerjaan" value="2. TIDAK">
                                    <label class="form-check-label" for="bpjsketenagakerjaan">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button BPJS Ketenagakerjaan (Jamsostek) --}}

{{-- Radio Button Asuransi Kesehatan Lainnya--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="asuransikesehatan">Asuransi Kesehatan Lainnya<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="asuransikesehatan" value="1. YA" id="asuransikesehatan1">
                                    <label class="form-check-label" for="asuransikesehatan1">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="asuransikesehatan" id="asuransikesehatan2" value="2. TIDAK">
                                    <label class="form-check-label" for="asuransikesehatan2">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Asuransi Kesehatan Lainnya--}}

{{-- Radio Button Jenis PMKS--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="jenisPMKS">Jenis PMKS<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS1" value="ANAK BALITA TERLANTAR">
                                    <label class="form-check-label" for="jenisPMKS1">
                                        a. Anak Balita Terlantar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="ANAK BERHADAPAN DENGAN HUKUM" id="jenisPMKS2">
                                    <label class="form-check-label" for="jenisPMKS2">
                                        b. Anak Berhadapan Dengan Hukum
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS3" value="ANAK DENGAN KEDISABILAN">
                                    <label class="form-check-label" for="jenisPMKS3">
                                        c. Anak Dengan Kedisabilitasan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="ANAK JALANAN" id="jenisPMKS4">
                                    <label class="form-check-label" for="jenisPMKS4">
                                        d. Anak Jalanan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS5" value="5. ANAK KORBAN TINDAK KEKERASAN">
                                    <label class="form-check-label" for="jenisPMKS5">
                                        e. Anak Korban Tindak Kekerasan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="ANAK TERLANTAR" id="jenisPMKS6">
                                    <label class="form-check-label" for="jenisPMKS6">
                                        f. Anak Terlantar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS7" value="ANAK YANG MEMERLUKAN PERLINDUNGAN KHUSUS">
                                    <label class="form-check-label" for="jenisPMKS7">
                                        g. Anak Yang Memerlukan Perlindungan Khusus
                                    </label>
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="BEKAS WARGA BINAAN LEMBAGA PEMASYARAKATAN" id="jenisPMKS8">
                                    <label class="form-check-label" for="jenisPMKS8">
                                        h. Bekas Warga Binaan Lembaga Pemasyarakatan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS9" value="GELANDANGAN">
                                    <label class="form-check-label" for="jenisPMKS9">
                                        i. Gelandangan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="KELUARGA BERMASALAH SOSIAL" id="jenisPMKS10">
                                    <label class="form-check-label" for="jenisPMKS10">
                                        j. Keluarga Bermasalah Sosial
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS11" value="FAKIR MISKIN">
                                    <label class="form-check-label" for="jenisPMKS11">
                                        k. Fakir Miskin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="KORBAN BENCANA ALAM" id="jenisPMKS12">
                                    <label class="form-check-label" for="jenisPMKS12">
                                        l. Korban Bencana Alam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS13" value="KORBAN BENCANA SOSIAL">
                                    <label class="form-check-label" for="jenisPMKS13">
                                        m. Korban Bencana Sosial
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="KORBAN PENYALAHGUNAAN NAPZA" id="jenisPMKS14">
                                    <label class="form-check-label" for="jenisPMKS14">
                                        n. Korban Penyalahgunaan NAPZA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS15" value="KORBAN TINDAK KEKERASAN">
                                    <label class="form-check-label" for="jenisPMKS15">
                                        o. Korban Tindak Kekerasan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="KORBAN TRAFFICKING" id="jenisPMKS16">
                                    <label class="form-check-label" for="jenisPMKS16">
                                        p. Korban Trafficking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS17" value="LANJUT USIA TERLANTAR">
                                    <label class="form-check-label" for="jenisPMKS17">
                                        q. Lanjut Usia Terlantar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="ORANG DENGAN HIV/AIDS (ODHA)" id="jenisPMKS18">
                                    <label class="form-check-label" for="jenisPMKS18">
                                        r. Orang Dengan HIV / AIDS (ODHA)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS19" value="PEKERJAAN MIGRAN BERMASALAH SOSIAL">
                                    <label class="form-check-label" for="jenisPMKS19">
                                        s. Pekerjaan Migran Bermasalah Sosial
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS20" value="PEMULUNG">
                                    <label class="form-check-label" for="jenisPMKS20">
                                       t. Pemulung
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="PENGEMIS" id="jenisPMKS21">
                                    <label class="form-check-label" for="jenisPMKS21">
                                        u. Pengemis
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS22" value="PENYANDANG DISABILITAS">
                                    <label class="form-check-label" for="jenisPMKS23">
                                        v. Penyandang Disabilitas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS24" value="PEREMPUAN RAWAN SOSIAL EKONOMI">
                                    <label class="form-check-label" for="jenisPMKS24">
                                       w. Perempuan Rawan Sosial Ekonomi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" value="TUNA SUSILA" id="jenisPMKS25">
                                    <label class="form-check-label" for="jenisPMKS25">
                                       x. Tuna Susila 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS25" value="KELOMPOK MINORITAS">
                                    <label class="form-check-label" for="jenisPMKS25">
                                      y. Kelompok Minoritas  
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisPMKS" id="jenisPMKS26" value="KELUARGA BERUMAH TAK LAYAK HUNI">
                                    <label class="form-check-label" for="jenisPMKS26">
                                      z. Keluarga Berumah Tak Layak Huni  
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Jenis PMKS--}}

{{-- Radio Button Bantuan Permakanan Bagi Anak Yatim Piatu dan Yatim Piatu Miskin--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="makananakyatim">Bantuan Permakanan Bagi Anak Yatim Piatu dan Yatim Piatu Miskin<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="makananakyatim" value="1. YA" id="makananakyatim">
                                    <label class="form-check-label" for="makananakyatim">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="makananakyatim" id="makananakyatim1" value="2. TIDAK">
                                    <label class="form-check-label" for="makananakyatim1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Bantuan Permakanan Bagi Anak Yatim Piatu dan Yatim Piatu Miskin--}}

{{-- Radio Button Bantuan Permakanan Bagi Lanjut Usia--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="makanlansia">Bantuan Permakanan Bagi Lanjut Usia<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="makanlansia" value="1. YA" id="makanlansia">
                                    <label class="form-check-label" for="makanlansia">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="makanlansia" id="makanlansia1" value="2. TIDAK">
                                    <label class="form-check-label" for="makanlansia1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Bantuan Permakanan Bagi Lanjut Usia--}}

{{-- Radio Button Bantuan Permakanan Bagi Penyandang Disabilitas--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="makandisabilitas">Bantuan Permakanan Bagi Penyandang Disabilitas<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="makandisabilitas" value="1. YA" id="makandisabilitas">
                                    <label class="form-check-label" for="makandisabilitas">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="makandisabilitas" id="makandisabilitas2" value="2. TIDAK">
                                    <label class="form-check-label" for="makandisabilitas2">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Bantuan Makan Bagi Penyandang Disabilitas--}}

{{-- Radio Button Apakah Sudah Di Khitan--}}
                    <div class="col-md-10">
                        <fieldset class="form-group">
                            <label for="khitan">Apakah Sudah Di Khitan<span class="required">*</span> </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="khitan" value="1. YA" id="khitan">
                                <label class="form-check-label" for="khitan">
                                    1. Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="khitan" id="khitan1" value="2. TIDAK">
                                <label class="form-check-label" for="khitan1">
                                    2. Tidak
                                </label>
                            </div>
                        </fieldset>
                    </div>
{{-- Radio Button Apakah Sudah Di Khitan--}}

{{-- Radio Button Partisipasi Sekolah--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="sekolah">Partisipasi Sekolah<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onchange="handleChange2();" name="sekolah" value="0. TIDAK BERSEKOLAH" id="sekolah0" >
                                    <label class="form-check-label" for="sekolah0">
                                        0. Tidak / Belum Pernah Bersekolah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onchange="handleChange1();" name="sekolah" id="sekolah1" value="1. MASIH BERSEKOLAH">
                                    <label class="form-check-label" for="sekolah1">
                                        1. Masih Bersekolah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onchange="handleChange1();" name="sekolah" id="sekolah2" value="2. TIDAK BERSEKOLAH">
                                    <label class="form-check-label" for="sekolah2">
                                        2. Tidak Bersekolah
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Partisipasi Sekolah--}}

{{-- Radio Button Jenjang Dan Jenis Pendidikan Tertinggi Yang Pernah / Sedang Di Duduki--}}

                        <div class="col-md-10" id="div_jenis_pendidikan" style="display:none">
                            <fieldset class="form-group" >
                                <label for="statuspendidikan">Jenjang Dan Jenis Pendidikan Tertinggi Yang Pernah / Sedang Di Duduki<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" value="1. SD/SLB" id="statuspendidikan1">
                                    <label class="form-check-label" for="statuspendidikan1">
                                    1. SD/SDLB
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan2" value="2. PAKET A">
                                    <label class="form-check-label" for="statuspendidikan2">
                                    2. Paket A
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan3" value="3. MI">
                                    <label class="form-check-label" for="statuspendidikan3">
                                    3. MI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" value="4. SMP/SMPLB" id="statuspendidikan4">
                                    <label class="form-check-label" for="statuspendidikan4">
                                    4. SMP / SMPLB
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan5" value="5. PAKET B">
                                    <label class="form-check-label" for="statuspendidikan5">
                                    5. Paket B
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan6" value="6. MTS">
                                    <label class="form-check-label" for="statuspendidikan6">
                                    6. MTs
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan7" value="7. SMA/SMK/SMALB">
                                    <label class="form-check-label" for="statuspendidikan7">
                                        7. SMA / SMK / SMALB
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan8" value="8. PAKET C">
                                    <label class="form-check-label" for="statuspendidikan8">
                                        8. Paket C
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan9" value="9. MA">
                                    <label class="form-check-label" for="statuspendidikan9">
                                        9. MA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statuspendidikan" id="statuspendidikan10" value="10. PERGURUAN TINGGI">
                                    <label class="form-check-label" for="statuspendidikan10">
                                        10. Perguruan Tinggi
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Jenjang Dan Jenis Pendidikan Tertinggi Yang Pernah / Sedang Di Duduki--}}

{{-- Checked Kelas Tertinggi Yang Sedang Di Duduki--}}
                        <div class="col-md-10" id="div_pendidikan_saatini" style="display:none">
                            <fieldset class="form-group">
                                <label for="sekolah">Kelas Tertinggi Yang Sedang Di Duduki<span class="required">*</span> </label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas1" value="1">
                                    <label class="form-check-label" for="kelas1">1</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas2" value="2">
                                    <label class="form-check-label" for="kelas2">2</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas3" value="3" >
                                    <label class="form-check-label" for="kelas3">3</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas4" value="4">
                                    <label class="form-check-label" for="kelas4">4</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas5" value="5">
                                    <label class="form-check-label" for="kelas5">5</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas6" value="6" >
                                    <label class="form-check-label" for="kelas6">6</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas7" value="7">
                                    <label class="form-check-label" for="kelas7">7</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas8" value="8" >
                                    <label class="form-check-label" for="kelas8">8</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="kelas" type="radio" id="kelas9" value="TAMAT" >
                                    <label class="form-check-label" for="kelas9">Tamat</label>
                                  </div>
                                
                            </fieldset>
                        </div>
{{-- Radio Button Kelas Tertinggi Yang Sedang Di Duduki--}}

{{-- Radio Button Ijazah Tertinggi Yang Dimiliki--}}
                        <div class="col-md-10" id="div_ijazah_tertinggi" style="display:none">
                            <fieldset class="form-group">
                                <label for="ijazah">Ijazah Tertinggi Yang Dimiliki<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ijazah" value="0. TIDAK PUNYA IJAZAH" id="ijazah1">
                                    <label class="form-check-label" for="ijazah1">
                                       0. Tidak Punya Ijazah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ijazah" id="ijazah2" value="1. SD/SEDERAJAT">
                                    <label class="form-check-label" for="ijazah2">
                                        1. SD/Sederajat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ijazah" id="ijazah3" value="2. SMP/SEDERAJAT">
                                    <label class="form-check-label" for="ijazah3">
                                        2. SMP/Sederajat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ijazah" value="3. SMA/SEDERAJAT" id="ijazah4">
                                    <label class="form-check-label" for="ijazah4">
                                       3. SMA/Sederajat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ijazah" id="ijazah5" value="4. D1/D2/D3">
                                    <label class="form-check-label" for="ijazah5">
                                        4. D1/D2/D3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ijazah" id="ijazah6" value="5. D4/S1">
                                    <label class="form-check-label" for="ijazah6">
                                        5. D4/S1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ijazah" id="ijazah7" value="6. S2/S3">
                                    <label class="form-check-label" for="ijazah7">
                                        6. S2/S3
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Ijazah Tertinggi Yang Dimiliki--}}



{{-- Radio Button Pembebeasan Biaya Sekolah--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="biayasekolah">Pembebeasan Biaya Pendidikan SD / SMP<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="biayasekolah" id="biayasekolah" value="1. YA">
                                    <label class="form-check-label" for="biayasekolah">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="biayasekolah" id="biayasekolah1" value="2. TIDAK">
                                    <label class="form-check-label" for="biayasekolah1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Pembebeasan Biaya Sekolah--}}

{{-- Radio Button Bantuan Seragam Sekolah SD / SMP--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="seragamsekolah">Bantuan Seragam Sekolah SD / SMP<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="seragamsekolah" id="seragamsekolah" value="1. YA">
                                    <label class="form-check-label" for="seragamsekolah">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="seragamsekolah" id="seragamsekolah2" value="2. TIDAK">
                                    <label class="form-check-label" for="seragamsekolah2">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Bantuan Seragam Sekolah SD / SMP--}}

{{-- Radio Button Beasiswa SMA / SMK Perguruan Tinggi--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="beasiswakuliah">Beasiswa SMA / SMK Perguruan Tinggi<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beasiswakuliah" id="beasiswakuliah" value="1. YA">
                                    <label class="form-check-label" for="beasiswakuliah">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="beasiswakuliah" id="beasiswakuliah1" value="2. TIDAK">
                                    <label class="form-check-label" for="beasiswakuliah1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Beasiswa SMA / SMK Perguruan Tinggi--}}

{{-- Radio Button Bekerja / Membantu Bekerja Selama Seminggu Yang Lalu--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="bekerjaseminggu">Bekerja / Membantu Bekerja Selama Seminggu Yang Lalu<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onchange="handlepekerjaan1();" name="bekerjaseminggu" id="bekerjaseminggu" value="1. YA">
                                    <label class="form-check-label" for="bekerjaseminggu">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onchange="handlepekerjaan2();" name="bekerjaseminggu" id="bekerjaseminggu1" value="2. TIDAK">
                                    <label class="form-check-label" for="bekerjaseminggu1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Bekerja / Membantu Bekerja Selama Seminggu Yang Lalu--}}

{{-- Radio Button Jika Bekerja, Lapangan Usaha Dari Pekerjaan Utama--}}
                        <div class="col-md-10" id="div_bekerja" style="display:none">
                            <fieldset class="form-group">
                                <label for="pekerjaanutama">Jika Bekerja, Lapangan Usaha Dari Pekerjaan Utama<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" value="1. PERTANIAN TANAMAN PADI DAN PALAWIJA" id="pekerjaanutama1">
                                    <label class="form-check-label" for="pekerjaanutama1">
                                      1. Pertanian Tanaman Padi Dan Palawija
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama2" value="2. HOLTIKULTURA">
                                    <label class="form-check-label" for="pekerjaanutama2">
                                        2. Holtikulturan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama3" value="3. PERKEBUNAN">
                                    <label class="form-check-label" for="pekerjaanutama3">
                                        3. Perkebunan 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" value="4. PERIKANAN TANGKAP" id="pekerjaanutama4">
                                    <label class="form-check-label" for="pekerjaanutama4">
                                        4. Perikanan Tangkap
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama5" value="5. PERIKANAN BUDIDAYA">
                                    <label class="form-check-label" for="pekerjaanutama5">
                                        5. Perikanan Budidaya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama6" value="6. PETERNAKAN">
                                    <label class="form-check-label" for="pekerjaanutama6">
                                        6. Peternakan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama7" value="7. KEHUTANAN DAN PERTANIAN LAINNYA">
                                    <label class="form-check-label" for="pekerjaanutama7">
                                       7. Kehutanan Dan Pertanian Lainnya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama8" value="8. PERTAMBANGAN/PENGGALIAN">
                                    <label class="form-check-label" for="pekerjaanutama8">
                                        8. Pertambangan / Penggalian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama9" value="9. INDUSTRI PENGOLAHAN">
                                    <label class="form-check-label" for="pekerjaanutama9">
                                        9. Industri Pengolahan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama10" value="10. LISTRIK DAN GAS">
                                    <label class="form-check-label" for="pekerjaanutama10">
                                       10. Listrik Dan Gas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama11" value="11. BANGUNAN KONSTRUKSI">
                                    <label class="form-check-label" for="pekerjaanutama11">
                                        11. Bangunan Konstruksi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama12" value="12. PERDAGANGAN">
                                    <label class="form-check-label" for="pekerjaanutama12">
                                        12. Perdagangan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama13" value="13. HOTEL DAN RUMAH MAKAN">
                                    <label class="form-check-label" for="pekerjaanutama13">
                                       13. Hotel Dan Rumah Makan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama14" value="14. TRANSPORTASI DAN PERGUDANGAN">
                                    <label class="form-check-label" for="pekerjaanutama14">
                                        14. Transportasi Dan Pergudangan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama15" value="INFORMASI DAN KOMUNIKASI">
                                    <label class="form-check-label" for="pekerjaanutama15">
                                        15. Informasi Dan Komunikasi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama16" value="16. KEUANGAN DAN ASURANSI">
                                    <label class="form-check-label" for="pekerjaanutama16">
                                       16. Keuangan Dan Asuransi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama17" value="17. JASA PENDIDIKAN">
                                    <label class="form-check-label" for="pekerjaanutama"17>
                                        17. Jasa Pendidikan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama18" value="18. JASA KESEHATAN">
                                    <label class="form-check-label" for="pekerjaanutama18">
                                        18. Jasa Kesehatan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama19" value="19. JASA KEMASYARAKATAN, PEMERINTAHAN DAN PERORANGAN">
                                    <label class="form-check-label" for="pekerjaanutama19">
                                       19. Jasa Kemasyarakatan, Pemerintahan Dan Perorangan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama20" value="20. PEMULUNG">
                                    <label class="form-check-label" for="pekerjaanutama20">
                                        20. Pemulung
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pekerjaanutama" id="pekerjaanutama21" value="21. LAINNYA">
                                    <label class="form-check-label" for="pekerjaanutama21">
                                        21. Lainnya
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Jika Bekerja, Lapangan Usaha Dari Pekerjaan Utama--}}

                        <div class="row" id="div_bekerja1" style="display:none">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="aktivitas">Tuliskan Kegiatan / Aktifitas Dalam Pekerjaan </label>
                                    <textarea class="form-control" name="aktivitas" id="aktivitas" value='{{ old('aktivitas') }}' ></textarea>
                                </div>
                            </div>
                        </div>

{{-- Radio Button Status Kedudukan Dalam Pekerjaan Utama--}}
                        <div class="col-md-10" id="div_bekerja2" style="display:none">
                            <fieldset class="form-group">
                                <label for="kedudukan">Status Kedudukan Dalam Pekerjaan Utama<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" value="1. BERUSAHA SENDIRI" id="kedudukan1">
                                    <label class="form-check-label" for="kedudukan1">
                                    1. Berusaha Sendiri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" id="kedudukan2" value="2. BERUSAHA DIBANTU BURUH TIDAK TETEAP/TIDAK DIBAYAR">
                                    <label class="form-check-label" for="kedudukan2">
                                    2. Berusaha Dibantu Buruh Tidak Tetap / Tidak Di Bayar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" id="kedudukan3" value="3. BERUSAHA DIBANTU BURUH TETAP/DIBAYAR">
                                    <label class="form-check-label" for="kedudukan3">
                                    3. Berusaha Dibantu Buruh Tetap / Di Bayar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" value="4. BURUH/KARYAWAN/PEGAWAI" id="kedudukan4">
                                    <label class="form-check-label" for="kedudukan4">
                                    4. Buruh / Karyawan / Pegawai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" id="kedudukan5" value="5. PNS/TNI/PORI/BUMN/BUMD/ANGGOTA LEGISLATIF">
                                    <label class="form-check-label" for="kedudukan5">
                                        5. PNS/TNI/Polri/BUMN/BUMD/Anggota Legislatif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" id="kedudukan6" value="6. PEKERJA BEBAS PERTANIAN">
                                    <label class="form-check-label" for="kedudukan6">
                                        6. Pekerja Bebas Pertanian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" id="kedudukan7" value="7. PEKERJA BEBAS NON PERTANIAN">
                                    <label class="form-check-label" for="kedudukan7">
                                        7. Pekerja Bebas Non Pertanian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kedudukan" id="kedudukan8" value="8. PEKERJA KELUARGA TIDAK DIBAYAR">
                                    <label class="form-check-label" for="kedudukan8">
                                        8. Pekerja Keluarga Tidak Dibayar
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Status Kedudukan Dalam Pekerjaan Utama--}}

                        <div class="row" id="div_bekerja3" style="display:none">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="pendapatan">Pendapatan / Upah / Pengshasilan Sebulan Terakhir <span class="required">*</span> </label>
                                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control"  id="pendapatan" name="pendapatan"
                                        value="{{ old('pendapatan') }}" >
                                </div>
                            </div>
                        </div>

{{-- Radio Button Korban PHK (Usia 35 Tahun Ke Atas)--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="korbanPHK">Korban PHK (Usia 35 Tahun Ke Atas)<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="korbanPHK" id="korbanPHK" value="1. YA">
                                    <label class="form-check-label" for="korbanPHK">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="korbanPHK" id="korbanPHK1" value="2. TIDAK">
                                    <label class="form-check-label" for="korbanPHK1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Korban PHK (Usia 35 Tahun Ke Atas)--}}

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="lulusSMA">Kapan Lulus SMA / SMK <span class="required">*</span> </label>
                                    <input type="text" maxlength="16" class="form-control"  id="lulusSMA" name="lulusSMA"
                                        value="" >
                                </div>
                            </div>
                        </div>

{{-- Radio Button Wanita Usia 10-49 Dan Status Kawin =2 Jenis Alat / Metode KB Yang Digunakan--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="kb">Wanita Usia 10-49 Dan Status Kawin =2 Jenis Alat / Metode KB Yang Digunakan<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" value="0. TIDAK MENGGUNAKAN" id="kb0">
                                    <label class="form-check-label" for="kb0">
                                    0. Tidak Menggunakan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb1" value="1. STERILISASI WANITA/MOW">
                                    <label class="form-check-label" for="kb1">
                                        1. Sterilisasi Wanita / Tubektomi / MOW
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb2" value="2. STERILISASI PRIA/MOP">
                                    <label class="form-check-label" for="kb2">
                                        2. Sterilisai Pria / Vasektomi / MOP
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" value="3. IUD/AKDR/SPIRAL" id="kb3">
                                    <label class="form-check-label" for="kb3">
                                    3. IUD / AKDR / Spiral
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb4" value="4. SUNTIK/INJEKSI">
                                    <label class="form-check-label" for="kb4">
                                        4. Suntik / Injeksi 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb5" value="5. SUNTIK KB/IMPLAN">
                                    <label class="form-check-label" for="kb5">
                                        5. Suntik KB / Implan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb6" value="6. PILL">
                                    <label class="form-check-label" for="kb6">
                                        6. Pil
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb7" value="7. KONDOM KARET">
                                    <label class="form-check-label" for="kb7">
                                        7. Kondom Karet
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb8" value="8. INTRAVAG/DIAFRAGMA">
                                    <label class="form-check-label" for="kb8">
                                        8. Intravag /Diafragma
                                    </label>
                                </div> <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb9" value="9. METODE AMENORHEA LAKTASI (MAL)">
                                    <label class="form-check-label" for="kb9">
                                        9. Metode Amenorhea Laktasi (MAL)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb10" value="10. PANTANG BERKALA">
                                    <label class="form-check-label" for="kb10">
                                        10. Pantang Berkala / Kalender
                                    </label>
                                </div> <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb11" value="11. SENGGAMA TERPUTUS">
                                    <label class="form-check-label" for="kb11">
                                        11. Senggama Terputus
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kb" id="kb12" value="12. METODE / ALAT LAINNYA">
                                    <label class="form-check-label" for="kb12">
                                        12. Metode /alat lainnya
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Wanita Usia 10-49 Dan Status Kawin =2 Jenis Alat / Metode KB Yang Digunakan--}}

{{-- Radio Button Selama Sebulan Terakhir Apakah Merokok ?--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="rokok">Selama Sebulan Terakhir Apakah Merokok ?<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rokok" value="1. YA" id="rokok">
                                    <label class="form-check-label" for="rokok">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rokok" id="rokok2" value="2. TIDAK">
                                    <label class="form-check-label" for="rokok2">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Selama Sebulan Terakhir Apakah Merokok ?--}}

{{-- Radio Button Pendidikan--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="pendidikan">Pendidikan<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pendidikan" value="1. YA" id="pendidikan">
                                    <label class="form-check-label" for="pendidikan">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pendidikan" id="pendidikan1" value="2. TIDAK">
                                    <label class="form-check-label" for="pendidikan1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Pendidikan--}}

{{-- Radio Button Padat Karya--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="pkarya">Padat Karya<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pkarya" value="1. YA" id="pkarya">
                                    <label class="form-check-label" for="pkarya">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pkarya" id="pkarya1" value="2. TIDAK">
                                    <label class="form-check-label" for="pkarya1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Padat Karya--}}

{{-- Radio Button Pelatihan--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="pelatihan">Pelatihan<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pelatihan" value="1. YA" id="pelatihan">
                                    <label class="form-check-label" for="pelatihan">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pelatihan" id="pelatihan1" value="2. TIDAK">
                                    <label class="form-check-label" for="pelatihan1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Pelatihan--}}

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="catatan">Keterampilan Yang Dimiliki</label>
                                    <textarea class="form-control" name="keterampilan" id="catatan" value="{{ old('keterampilan') }}" ></textarea>
                                </div>
                            </div>
                        </div>

{{-- Radio Button Ibu Melkakukan Persalinan Di Fasilitas Kesehatan--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="persalinan">Ibu Melkakukan Persalinan Di Fasilitas Kesehatan<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="persalinan" value="1. YA" id="persalinan">
                                    <label class="form-check-label" for="persalinan">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="persalinan" id="persalinan1" value="2. TIDAK">
                                    <label class="form-check-label" for="persalinan1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Ibu Melkakukan Persalinan Di Fasilitas Kesehatan--}}

{{-- Radio Button Bayi Mendapat Imunisasi Lengkap--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="imunisasi">Bayi Mendapat Imunisasi Lengkap<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="imunisasi" value="1. YA" id="imunisasi">
                                    <label class="form-check-label" for="imunisasi">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="imunisasi" id="imunisasi1" value="2. TIDAK">
                                    <label class="form-check-label" for="imunisasi1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Bayi Mendapat Imunisasi Lengkap--}}

{{-- Radio Button Bayi Mendapat Persalinan Air Susu Ibu(ASI)--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="asi">Bayi Mendapat Persalinan Air Susu Ibu (ASI)<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="asi" value="1. YA" id="asi">
                                    <label class="form-check-label" for="asi">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="asi" id="asi2" value="2. TIDAK">
                                    <label class="form-check-label" for="asi2">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Bayi Mendapat Persalinan Air Susu Ibu(ASI)--}}

{{-- Radio Button Penderita TB Baru Mendapat Pengobatan Sesuai Standar--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="tbparu">Penderita TB Paru Mendapat Pengobatan Sesuai Standar<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tbparu" value="1. YA" id="tbparu">
                                    <label class="form-check-label" for="tbparu">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tbparu" id="tbparu1" value="2. TIDAK">
                                    <label class="form-check-label" for="tbparu1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Penderita TB Baru Mendapat Pengobatan Sesuai Standar--}}

{{-- Radio Button Penderita Hipertensi Mendapatan Pengobatan Secara Teratur--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="hipertensi">Penderita Hipertensi Mendapatan Pengobatan Secara Teratur<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hipertensi" value="1. YA" id="hipertensi">
                                    <label class="form-check-label" for="hipertensi">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hipertensi" id="hipertensi1" value="2. TIDAK">
                                    <label class="form-check-label" for="hipertensi1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Penderita Hipertensi Mendapatan Pengobatan Secara Teratur--}}

{{-- Radio Button Penderita Gangguan Jiwa Mendapat Pengobatan Dan Tidak Di Terlantarkan--}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="gangguanjiwa">Penderita Gangguan Jiwa Mendapat Pengobatan Dan Tidak Di Terlantarkan<span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gangguanjiwa" value="1. YA" id="gangguanjiwa">
                                    <label class="form-check-label" for="gangguanjiwa">
                                        1. Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gangguanjiwa" id="gangguanjiwa1" value="2. TIDAK">
                                    <label class="form-check-label" for="gangguanjiwa1">
                                        2. Tidak
                                    </label>
                                </div>
                            </fieldset>
                        </div>
{{-- Radio Button Penderita Gangguan Jiwa Mendapat Pengobatan Dan Tidak Di Terlantarkan--}}


                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="catatan">Catatan </label>
                                    <textarea class="form-control" name="catatan" id="catatan" value="{{ old('catatan') }}" ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="gambar" class="form-label">File Pendukung</label>
                                <input type="file" id="gambar" name="gambar"
                                    class="image-preview-filepond" {{--multiple data-max-files="3"--}} data-max-file-size="3MB">
                            </div>
                        </div>



                        

    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-start">
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
            </div>
        </section>
    </form>
</div>

{{-- @include('sweetalert::alert') --}}
@endsection

@section('custom-script')
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script src="/assets/js/dselect.js"></script>

    <script>

// dselect(document.querySelector('#hubungankplrmhtangga'), {
//             search: true
//         });
//         dselect(document.querySelector('#channel'), {});
    </script>
@endsection

<script type="text/javascript" language="javascript">

function myFunction() {
  var x = document.getElementById("namaAnggotaKeluarga");
  x.value = x.value.toUpperCase();
}

        function handleChange1() {
            $('#div_jenis_pendidikan').slideDown();
            $('#div_pendidikan_saatini').slideDown();
            $('#div_ijazah_tertinggi').slideDown();
            $('#div_kehamilan').slideDown();
           
        }

        function handleChange2() {
            $('#div_jenis_pendidikan').slideUp();
            $('#div_pendidikan_saatini').slideUp();
            $('#div_ijazah_tertinggi').slideUp();
            $('#div_kehamilan').slideUp();

        }

        function handlepekerjaan1(){
            $('#div_bekerja').slideDown();
            $('#div_bekerja1').slideDown();
            $('#div_bekerja2').slideDown();
            $('#div_bekerja3').slideDown();
        }

        
        function handlepekerjaan2(){
            $('#div_bekerja').slideUp();
            $('#div_bekerja1').slideUp();
            $('#div_bekerja2').slideUp();
            $('#div_bekerja3').slideUp();
        }
</script>