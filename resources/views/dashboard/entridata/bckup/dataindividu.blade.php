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
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="noKK">Nomor Kartu Keluarga</label>
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control" id="noKK" name="noKK"
                                    value="{{ old('noKK') }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="nik">NIK Anggota Keluarga<span class="required">*</span> </label>
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control"  id="nik" name="nik"
                                    value='{{ old('nik') }}' required>
                            </div>
                        </div>
                       
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="namaAnggotaKeluarga">Nama Anggota Keluarga<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="namaAnggotaKeluarga" name="namaAnggotaKeluarga"
                                    value='{{ old('namaAnggotaKeluarga') }}' required>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tempatlahir">Tempat Lahir<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                                    value='{{ old('tempatlahir') }}' required>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggallahir">Tanggal Lahir<span class="required">*</span> </label>
                                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir"
                                    value='{{ old('tanggallahir') }}' required>
                            </div>
                        </div>
{{-- Combo Box  --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="hubungankplrmhtangga">Hubungan Dengan Kepala Rumah Tangga <span class="required">*</span> </label>
                                <select class="form-select" id="hubungankplrmhtangga" name="hubungankplrmhtangga" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='1' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                       
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="hubungankplkeluarga">Hubungan Kepala Keluarga <span class="required">*</span> </label>
                                <select class="form-select" id="hubungankplkeluarga" name="hubungankplkeluarga" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='2' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
{{-- END COMBO BOX --}}


{{-- Radio Button --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniskelamin" value="Pria" id="jeniskelamin">
                                    <label class="form-check-label" for="jeniskelamin">
                                        Pria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="Wanita">
                                    <label class="form-check-label" for="jeniskelamin">
                                        Wanita
                                    </label>
                                </div>
                            </fieldset>
                        </div>



                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="usiapendataan">Usia Pendataan<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="usiapendataan" name="usiapendataan"
                                    value='{{ old('usiapendataan') }}' required>
                            </div>
                        </div>

{{-- COMBO BOX  --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="statusperkawinan">Status Perkawinan <span class="required">*</span> </label>
                                <select class="form-select" id="statusperkawinan" name="statusperkawinan" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='4' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach                                    
                                </select>
                            </fieldset>
                        </div>
{{-- END Combo Box --}}


                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="kepemilikanbukunikah">Kepemilikan Buku Nikah<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="kepemilikanbukunikah" name="kepemilikanbukunikah"
                                    value='{{ old('kepemilikanbukunikah') }}' required>
                            </div>
                        </div>     
 
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="tercantumdlmKK">Tercantum Dalam KK<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="tercantumdlmKK" name="tercantumdlmKK"
                                    value='{{ old('tercantumdlmKK') }}' required>
                            </div>
                        </div>

 {{-- COMBO BOX  --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="kepemilikanidentitas">Kepemilikan Identitas <span class="required">*</span> </label>
                                <select class="form-select" id="kepemilikanidentitas" name="kepemilikanidentitas" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='5' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
{{-- END Combo Box --}}

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="statuskehamilan">Status Kehamilan<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="statuskehamilan" name="statuskehamilan"
                                    value='{{ old('statuskehamilan') }}' required>
                            </div>
                        </div>

{{-- COMBO BOX  --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="jeniscacat">Jenis Cacat <span class="required">*</span> </label>
                                <select class="form-select" id="jeniscacat" name="jeniscacat" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='6' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="jenispenyakityangdiderita">Jenis Penyakit Yang Di Derita <span class="required">*</span> </label>
                                <select class="form-select" id="jenispenyakityangdiderita" name="jenispenyakityangdiderita" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='7' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
{{-- END Combo Box --}}

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="bekaswargabinaan">Bekas Warga Binaan Lembaga Pemasyarakatan<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="bekaswargabinaan" name="bekaswargabinaan"
                                    value='{{ old('bekaswargabinaan') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="dapatperlakuankasar">Pernah Mendapat Perlakuan Kasar Yang berakibat secara Fisik Atau Psiko<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pernahmendapatperlakuankasar" name="pernahmendapatperlakuankasar"
                                    value='{{ old('pernahmendapatperlakuankasar') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="eksploitasiseksual">Korban Eksploitasi Ekonomi Atau Seksual<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="eksploitasiseksual" name="eksploitasiseksual"
                                    value='{{ old('eksploitasiseksual') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="keberfungsiansosial">Gangguan Keberfungsian Sosial<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="keberfungsiansosial" name="keberfungsiansosial"
                                    value='{{ old('keberfungsiansosial') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="narkotika">Pernah Menyalahgunakan Narkotika, Psikotropika dan Zat Aditif Lainnya<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="narkotika" name="narkotika"
                                    value='{{ old('narkotika') }}' required>
                            </div>
                        </div>

 {{-- COMBO BOX  --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="partisipasisekolah">Partisipasi Sekolah<span class="required">*</span> </label>
                                <select class="form-select" id="partisipasisekolah" name="partisipasisekolah" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='8' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="jenjangpendidikan">Jenjang Pendidikan<span class="required">*</span> </label>
                                <select class="form-select" id="jenjangpendidikan" name="jenjangpendidikan" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='9' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
{{-- END Combo Box --}} 

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="kelastertinggi">Kelas Tertinggi<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="kelastertinggi" name="kelastertinggi"
                                    value='{{ old('kelastertinggi') }}' required>
                            </div>
                        </div>

 {{-- COMBO BOX  --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="ijazahtertinngi">Ijazah Tertinggi<span class="required">*</span> </label>
                                <select class="form-select" id="Ijazah Tertinggi" name="ijazahtertinngi" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='10' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
{{-- END Combo Box --}}

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="jurusanijazah">Jurusan Ijazah<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="jurusanijazah" name="jurusanijazah"
                                    value='{{ old('jurusanijazah') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="namasekolah">Nama Sekolah Atau Universitas<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="namasekolah" name="namasekolah"
                                    value='{{ old('namasekolah') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="bekerja">Bekerja<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="bekerja" name="bekerja"
                                    value='{{ old('bekerja') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="jamkerja">Jam Kerja<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="jamkerja" name="jamkerja"
                                    value='{{ old('jamkerja') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="pendapatan">Pendapatan Individu<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pendapatan" name="pendapatan"
                                    value='{{ old('pendapatan') }}' required>
                            </div>
                        </div>

{{-- COMBO BOX  --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="kerjaanutama">Pekerjaan Utama<span class="required">*</span> </label>
                                <select class="form-select" id="kerjaanutama" name="kerjaanutama" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='11' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="posisipekerjaan">Posisi Pekerjaan<span class="required">*</span> </label>
                                <select class="form-select" id="posisipekerjaan" name="posisipekerjaan" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='12' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="jenisPMKS">Jenis PMKS<span class="required">*</span> </label>
                                <select class="form-select" id="jenisPMKS" name="jenisPMKS" required>
                                    <option value="" selected disabled hidden>Pilih Data</option>
                                    @foreach ($subpertanyaans as $sp)
                                        @if ($sp->pertanyaan_id =='13' )
                                            <option value="{{ $sp->sub_pertanyaan }}">
                                               {{ $sp->sub_pertanyaan }}</option>
                                            @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
{{-- END Combo Box --}}

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="perbaikanrumah">Mendapatkan Program Bantuan Perbaikan Rumah<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="perbaikanrumah" name="perbaikanrumah"
                                    value='{{ old('perbaikanrumah') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="pemakananyatim">Mendapatkan Program Permakanan Yatim<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pemakananyatim" name="pemakananyatim"
                                    value='{{ old('pemakananyatim') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="pemakanandisabiltas">Mendapatkan Program Permakanan Disabilitas<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pemakanandisabiltas" name="pemakanandisabiltas"
                                    value='{{ old('pemakanandisabiltas') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="pemakananlansia">Mendapatkan Program Permakanan Lansia<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pemakananlansia" name="pemakananlansia"
                                    value='{{ old('pemakananlansia') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="pemakanansakit">Mendapatkan Program Permakanan Sakit<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pemakanansakit" name="pemakanansakit"
                                    value='{{ old('pemakanansakit') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="pemakaman">Mendapatkan Program Pemakaman<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pemakaman" name="pemakaman"
                                    value='{{ old('pemakaman') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="intervensiBPJS">Memperoleh Intervensi BPJS PBI APBD<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="intervensiBPJS" name="intervensiBPJS"
                                    value='{{ old('intervensiBPJS') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="intervensiSKM">Memperoleh Intervensi SKM<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="intervensiSKM" name="intervensiSKM"
                                    value='{{ old('intervensiSKM') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="sunatanmassal">Mengikuti Sunatan Masal<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="sunatanmassal" name="sunatanmassal"
                                    value='{{ old('sunatanmassal') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="pembebasanbiaya">Memperoleh Biaya Pembebasan Pendidikan SD/SMP<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="pembebasanbiaya" name="pembebasanbiaya"
                                    value='{{ old('pembebasanbiaya') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="bantuanseragam">Bantuan Seragam Sekolah SD/SMP<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="bantuanseragam" name="bantuanseragam"
                                    value='{{ old('bantuanseragam') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="beasiswakuliah">Memperoleh Beasiswa Perguruan Tinggi<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="beasiswakuliah" name="beasiswakuliah"
                                    value='{{ old('beasiswakuliah') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="bantuanrusun">Memperoleh Bantuan Rumah Susun<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="bantuanrusun" name="bantuanrusun"
                                    value='{{ old('bantuanrusun') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="perokok">Perokok<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="perokok" name="perokok"
                                    value='{{ old('perokok') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="AkseptorKB">Akseptor KB<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="AkseptorKB" name="AkseptorKB"
                                    value='{{ old('AkseptorKB') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="lulustidakkerja">Lulusan SMA Tidak Bekerja Lebih Dari 3 Tahun Setelah Lulus<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="lulustidakkerja" name="lulustidakkerja"
                                    value='{{ old('lulustidakkerja') }}' required>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="korbanPHK">Korban PHK Dengan Usia Di Atas 35 Tahun<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="korbanPHK" name="korbanPHK"
                                    value='{{ old('korbanPHK') }}' required>
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
@endsection

@section('custom-script')
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script src="/assets/js/dselect.js"></script>

    <script>

dselect(document.querySelector('#hubungankplrmhtangga'), {
            search: true
        });
        dselect(document.querySelector('#channel'), {});
    </script>
@endsection