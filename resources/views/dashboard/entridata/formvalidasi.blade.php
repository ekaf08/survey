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

@foreach ($datawarga as $warga)
    <form method="post" action="{{ route('updatewarga') }}" enctype="multipart/form-data">
        @csrf
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">FORM PRELIST VALIDASI</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control" id="no_kk" name="no_kk"
                                    value="{{ ($warga->no_kk) }}" hidden required>
                            </div>
                            <div class="form-group">
                                <label for="no_kk">NOMOR KARTU KELUARGA</label>
                                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="16" class="form-control" id="no_kk" name="no_kkee"
                                    value="{{ Str::mask($warga->no_kk, '*', 3, 9) }}" readonly required>
                            </div>
                        </div>
                    </div>
                    <?php break; ?>
@endforeach

                
                    <h2 class="card-title mt-4">ANGGOTA KELUARGA</h2>
                
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-tiket" role="tabpanel"
                        aria-labelledby="nav-tiket-tab">
                        <div class="table-responsive col-md-5">
                        <table class="table" id="table-tiket">
                                <thead>
                                    <tr>
                                        
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>HUBUNGAN KELUARGA</th>
                                    </tr>
                                </thead>
                                <tbody>


                                @foreach ($datawarga as $dtw)
                               
                                <tr>
                                    
                                    <td>{{ Str::mask($dtw->nik, '*', 3, 9) }}</td>
                                    <td>{{ $dtw->nama}}</td>
                                    <td>{{ $dtw->hub_keluarga}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
                    </div>
                        </table>
                        </div>
                    </div>
                </div>
            

{{-- Radio Button --}}
<div class="card">
    <div class="card-body">
                    <div class="row">
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
                    </div>

                    <div class="row" id="div_status" style="display:none">
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
                    </div>
        
 {{--  END RADIO BUTTON--}}

 <!-- <input type="text"  class="form-control" id="hasil_prelist" name="hasil_prelist"
                                    value="{{ old('hasil_prelist') }}" readonly required> -->

 
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="catatan">Catatan </label>
                                    <textarea class="form-control" name="catatan" onkeyup="myFunction()" id="catatan" value="{{ old('catatan') }}" ></textarea>
                                </div>
                            </div>
                        </div>
			</div>  

        </div>
		 <div class="col-12 d-flex justify-content-start m-5">
			<button type="reset" class="btn btn-danger me-1 mb-1">Batal</button>
			<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
		</div>
    </div>
    

</section>
{{-- @include('sweetalert::alert') --}}
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
      var x = document.getElementById("catatan");
      x.value = x.value.toUpperCase();
    }
    
            
    
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