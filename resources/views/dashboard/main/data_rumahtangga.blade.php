@extends('layouts.dashboard')
@section('custom-stylesheet')
    <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
@endsection
@section('main-content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last"></div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Rumah Tangga</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <a href="/entridata/form-data-rumahtangga">+ Tambah Data Survey Rumah Tangga</a>
                    <div class="row mt-4">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-open" role="tabpanel" aria-labelledby="nav-open-tab">
                                <div class='table-responsive'>
                                    <table class="table" id="table-open">
                                        <thead>
                                            <tr>
                                               <!--  <th>No</th> -->
                                                <th>Nama Kepala Rumah Tangga</th>
                                                <th>Alamat</th>
                                                <th>Nama Pencacah</th>
                                                <th>Tanggal Entri</th>
                                                <!-- <th>Nama Pencacah</th>
                                                <th>Tanggal Entri</th>
                                                <th>User Entri</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rumahtanggas as $p)
                                                <tr>

                                                    <!-- <td>{{ $p->id }}</td> -->
                                                    <td>{{ $p->nama_kepala_keluarga   }}</td>
                                                    <!-- <td>{{ Str::mask($p->nama_kepala_keluarga, '*', 4, 8)   }}</td> -->

                                                    <td>{{ $p->alamat }}</td>
                                                    <td>{{ $p->nama_pencacah }}</td>
                                                    <td>{{ $p->created_at }}</td>
                                                    <td>
                                                        <a href="/main/list-data-individu">Edit</a>&nbsp;
                                                        <a href="#">Hapus</a>
                                                    </td>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </section>

    <!-- <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="#">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-muted font-semibold"> </h5>
                                            <h1 class="font-extrabold mb-0"></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="stats-icon ">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <h6 class="font-light">deskripsi'</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
        </div>
    </section> -->

<script>
    $(document).ready(function(){
        $nik.inputmask('stringtohide', '*', -15, 3);
    });
</script>

@endsection

@section('custom-script')

@endsection
