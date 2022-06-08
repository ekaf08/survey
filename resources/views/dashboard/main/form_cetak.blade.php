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

    <div class="card">
      <div class="card-body">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>




                    {{-- PDF PDFPDFPDFPDFPDFPDFPDFPDFPDFPDFPDFPDF--}}
                    <style>
                        @media print{
                        @page {
                        overflow: auto;
                        height: 100%;
                        width:330mm;
                        height:210mm;
                        margin-top: 1cm;
                        margin-bottom: 1cm;
                        margin-left: 1cm;
                        margin-right: 1cm;
                        
                                }
                        }

                        .umum, .umum tr td{
                            vertical-align:top;
                            font-family:Arial, Helvetica, sans-serif;
                            text-align:justify;
                            font-size:11pt;
                            line-height:20px;
                        }

                        .jdl{
                            text-align:center;
                            font-family:Arial, Helvetica, sans-serif;
                            font-size:14pt;
                            font-weight: 600;
                        }
                        
                        table tr td {
                            border: 1px solid black;
                        }

                        .ttd, .ttd tr td{
                            vertical-align:top;
                            font-family:Arial, Helvetica, sans-serif;
                            text-align:center;
                            font-size:12pt;
                            line-height:18px;
                        }
                        
                        .border-none {
                            border: none;
                        }
                    </style>

                    <body>
                    <!-- JUDUL -->
                    <table width="100%" align="center" border="0" class="jdl" style="border: none;">
                        <tr>
                            <td width="90%" style="border: none;">
                                <img src="/assets/images/logo/logo-sby.svg" alt="" style="width: 80px;">
                            </td width="10%" style="border: none;">
                            <td style="border: none;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border: none;">
                                PEMERINTAH KOTA SURABAYA
                            </td style="border: none;">
                            <td style="border: none;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border: none;">
                                REMBUG KAMPUNG DATA TERPADU MASYARAKAT SURABAYA 2022
                            </td>
                            <td style="border: none;">
                                DTMS2022.RK
                            </td>
                        </tr>
                    </table>
                    <br>
           {{-- @php
            $i=1   
           @endphp --}}
            @foreach ($cetak as $ctk)
            {{-- <form method="get" action="{{ route('show_form_cetak') }}" enctype="multipart/form-data"> --}}
                    <table width="100%" align="center" border="0" class="umum" cellpadding="2" cellspacing="0" style="border-collapse: collapse;">
                        <tr>
                            <td colspan="6" style="text-align: center; background-color: grey;">
                                <strong>BLOK I. IDENTITAS WILAYAH</strong> 
                            </td>
                        </tr>
                        <tr>
                            <td width="3%">
                                {{-- {{ $i++ }} --}}
                                No
                            </td>
                            <td width="23.5%">
                                Kecamatan
                            </td>
                            <td width="23.5%">
                                {{ $ctk->kecamatan }}
                            </td>
                            <td width="3%">
                                4.
                            </td>
                            <td width="23.5%">
                                RT
                            </td>
                            <td width="23.5%">
                                {{ $ctk->no_rt }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2.
                            </td>
                            <td>
                                Kelurahan
                            </td>
                            <td>
                                {{ $ctk->kelurahan }}
                            </td>
                            <td>
                                5.
                            </td>
                            <td>
                                Jumlah Keluarga dalam prelist awal
                            </td>
                            <td>
                                ...
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3.
                            </td>
                            <td>
                                RW
                            </td>
                            <td>
                                {{ $ctk->no_rw }}
                            </td>
                            <td>
                                6.
                            </td>
                            <td>
                                Jumlah Keluarga dalam prelist akhir
                            </td>
                            <td>
                                ...
                            </td>
                        </tr>
                    </table>
                    <br>

                    <table width="100%" align="center" border="0" class="umum" cellpadding="2" cellspacing="0" style="border-collapse: collapse;">
                        <tr>
                            <td colspan="9" style="text-align: center; background-color: grey;">
                                <strong>BLOK II. DAFTAR KELUARGA</strong> 
                            </td>
                        </tr>
                        <tr>
                            <td width="3%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                No.
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                Nama Kepala<br>
                                Keluarga (KK)
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                Nomor Kartu Keluarga<br>
                                
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                Nama Anggota<br>
                                
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                Alamat Lengkap<br>
                                
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                Apakah keluarga<br> 
                                masih ada?
                                
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                Identifikasi 
                                Tingkat 
                                Kesejahteraan 
                                berdasarkan 
                                Rembug 
                                Kampung:
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                No Urut KK
                            </td>
                            <td width="12%" style="text-align: center; vertical-align: middle; font-weight: 600;">
                                Catatan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                25.
                            </td>
                            <td>
                                {{ $ctk->nama }}
                            </td>
                            <td>
                                {{ $ctk->no_kk }}
                            </td>
                            
                           {{-- @foreach ($cetak as $ctk1) --}}
                           <td>
                            Nama Keluarga Lain<br>
                            Nama Keluarga Lain<br>
                            Nama Keluarga Lain
                        </td>
                           {{-- @endforeach --}}
                           
                            
                           
                            <td>
                                {{ $ctk->alamat }}
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <strong>{{ $ctk->status_keluarga }}</strong> 
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <strong>{{ $ctk->status_ekonomi }}</strong>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                012
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $ctk->catatan }}
                            </td>
                        </tr>
                    </table>
                    <br>


@endforeach
                    <table width="100%" align="center" border="0" class="umum" cellpadding="2" cellspacing="0" style="border-collapse: collapse;">
                        <tr>
                            <td class="border-none" width="5%">&nbsp;</td>
                            <td class="border-none">RW</td>
                            <td class="border-none" width="3%" style="text-align: center;">:</td>
                            <td class="border-none" width="30%">...</td>
                            <td class="border-none" width="15%">&nbsp;</td>
                            <td class="border-none">RT</td>
                            <td class="border-none" width="3%" style="text-align: center;">:</td>
                            <td class="border-none" width="30%">...</td>
                            <td class="border-none" width="5%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="border-none">&nbsp;</td>
                            <td class="border-none">Nama</td>
                            <td class="border-none" style="text-align: center;">:</td>
                            <td class="border-none">...</td>
                            <td class="border-none">&nbsp;</td>
                            <td class="border-none">Nama</td>
                            <td class="border-none" style="text-align: center;">:</td>
                            <td class="border-none">...</td>
                            <td class="border-none">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="border-none">&nbsp;</td>
                            <td class="border-none">Jabatan</td>
                            <td class="border-none" style="text-align: center;">:</td>
                            <td class="border-none">...</td>
                            <td class="border-none">&nbsp;</td>
                            <td class="border-none">Jabatan</td>
                            <td class="border-none" style="text-align: center;">:</td>
                            <td class="border-none">...</td>
                            <td class="border-none">&nbsp;</td>
                        </tr>
                    </table>


                    </body>
                    </html>
      </div></div>
                </div>
                <div class="col-12 d-flex justify-content-start">
                    {{-- <button type="reset" class="btn btn-danger me-1 mb-1">Reset</button> --}}
                    <a href="/entridata/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
                    {{-- <button type="submit" class="btn btn-primary me-1 mb-1">Cetak</button> --}}
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
            