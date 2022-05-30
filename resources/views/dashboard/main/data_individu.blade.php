@extends('layouts.dashboard')
@section('custom-stylesheet')
    <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
@endsection

@section('main-content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last"></div>
                <div class="col-12 col-md-6 order-md-1 order-first">
                    
                </div>
            </div>
        </div>
    </div>


    <h2>Data List Rumah Tangga</h2>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4><a href="/entridata/form-data-individu" class="btn btn-primary text-white"><i class="bi bi-journal-plus" style="margin-top: 5px"> Tambah Anggota Rumah Tangga</i></a></h4>
            {{-- </div> --}}
                

            {{-- <div class="card-body">     --}}
                <div class="row mt-4">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-tiket" role="tabpanel"
                            aria-labelledby="nav-tiket-tab">
                            <div class="table-responsive">
                            <table class="table" id="table-tiket">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Tanggal Entri</th>
                                        <th>Hub Kepala RT</th>
                                        <th>Status Pengisian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    <tr>
                                        <td>1. </td>
                                        <td>{{ $dt->id }}</td>
                                        <td>{{ $dt->nama_kepala_keluarga }}</td>
                                        <td>{{ $dt->alamat }}</td>
                                        <td>{{ $dt->kelurahan }}</td>
                                        <td>{{ $dt->tanggal_pencacah }} </td>
                                        <td>{{ 'Hub Kepala RT' }} </td>
                                        <td>{{ '' }} </td>
                                        
                                        <td>
                                            <a href="#" ><i class="bi bi-pencil-square"></i></a>
                                            <a href="#"><i class="bi bi-trash"></i></a>
                                        </td>
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
                </div>
            </div>
        </div>
    </section>
</div>
@endsection