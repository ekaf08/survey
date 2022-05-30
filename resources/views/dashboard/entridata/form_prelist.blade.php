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


    <form method="post" action="/entridata/svDataWarga" enctype="multipart/form-data">
        @csrf
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Form Prelist Validasi</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="noKK">Nomor Kartu Keluarga</label>
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control" id="noKK" name="noKK"
                                    value="{{ old('noKK') }}"  required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nik">NIK Anggota Keluarga<span class="required">*</span> </label>
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control"  id="nik" name="nik"
                                    value="{{ old('nik') }}"   required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="namaAnggotaKeluarga">Nama Anggota Keluarga<span class="required">*</span> </label>
                                <input type="text" class="form-control" id="upper" onkeyup="myFunction()" name="upper"
                                    value="{{ old('namaAnggotaKeluarga')}}"  required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="alamat">Alamat<span class="required">*</span> </label>
                                <input type="text" class="form-control" onkeyup="myFunction()" id="upper2" name="alamat"
                                    value="{{ old('alamat') }}"  required>
                            </div>
                        </div>
                    </div>


{{-- Radio Button --}}
                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="status_keluarga">Status Keluarga : <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_keluarga" onchange="handlestatus();" value="ADA" id="status_keluarga">
                                    <label class="form-check-label" for="status_keluarga">
                                        1. Ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_keluarga" onchange="handlestatus2();" id="2" value="TIDAK ADA KARENA PINDAH">
                                    <label class="form-check-label" for="2">
                                        2. Tidak Ada Karena Pindah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_keluarga" id="3" onchange="handlestatus2();" value="TIDAK ADA KARENA MENINGGAL SEMUA">
                                    <label class="form-check-label" for="3">
                                        3. Tidak Ada Karena Meninggal Semua
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_keluarga" id="4" onchange="handlestatus2();" value="TIDAK DITEMUKAN ATAU TIDAK DIKENAL">
                                    <label class="form-check-label" for="4">
                                        4. Tidak Ditemukan Atau Tidak Dikenal
                                    </label>
                                </div>  
                            </fieldset>
                        </div>

                        <div class="col-md-10">
                            <fieldset class="form-group">
                                <label for="status_ekonomi">Status Ekonomi <span class="required">*</span> </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_ekonomi" value="SANGAT MISKIN" id="status_ekonomi">
                                    <label class="form-check-label" for="status_ekonomi">
                                        1. Sangat Miskin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_ekonomi" id="status_ekonomi1" value="MISKIN">
                                    <label class="form-check-label" for="status_ekonomi1">
                                        2. Miskin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_ekonomi" id="status_ekonomi2" value="MAMPU">
                                    <label class="form-check-label" for="status_ekonomi2">
                                        3. Mampu
                                    </label>
                                </div>

                            </fieldset>
                        </div>                 

{{--  END RADIO BUTTON--}}

 
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="catatan">Catatan </label>
                                    <textarea class="form-control" name="catatan" onkeyup="myFunction()" id="upper1" value="{{ old('catatan') }}" ></textarea>
                                </div>
                            </div>
                        </div>

            {{-- </div>  --}}
        </div>
    </div>
    <div class="col-12 d-flex justify-content-start">
        <button type="reset" class="btn btn-danger me-1 mb-1">Reset</button>
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

<script type="text/javascript" language="javascript">

    function myFunction() {
      var x = document.getElementById("upper");
      x.value = x.value.toUpperCase();
      var y = document.getElementById("upper1");
      y.value = y.value.toUpperCase();
      var k = document.getElementById("upper2");
      k.value = k.value.toUpperCase();
    }
    
            handlestatus2
    
            function handlestatus(){
                $('#div_status').slideDown();
                $('#div_bekerja1').slideDown();
                $('#div_bekerja2').slideDown();
                $('#div_bekerja3').slideDown();
            }
    
            
            function handlestatus2(){
                $('#div_status').slideUp();
                $('#div_bekerja1').slideUp();
                $('#div_bekerja2').slideUp();
                $('#div_bekerja3').slideUp();
            }
    </script>
