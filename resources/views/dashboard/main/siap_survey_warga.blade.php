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

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Survei Data Terpadu Masyarakat Surabaya</h1>
            </div>
            <div class="card-body">
                <nav>
                    {{-- <div class="nav nav-tabs" id="nav-tabs" role="tablist">
                        <a href="#" class="nav-item nav-link active" id="nav-hal1-tab" data-toggle="tab" role="tab" aria-controls="nav-hal1" aria-selected="true">Hal. 1</a>
                        <a href="#" class="nav-item nav-link" id="nav-hal2-tab" data-toggle="tab" role="tab" aria-controls="nav-hal2" aria-selected="true">Hal. 2</a>
                        <a href="#" class="nav-item nav-link" id="nav-hal3-tab" data-toggle="tab" role="tab" aria-controls="nav-3" aria-selected="true">Hal. 3</a>
                        <a href="#" class="nav-item nav-link" id="nav-hal4-tab" data-toggle="tab" role="tab" aria-controls="nav-hal4" aria-selected="true">Hal. 4</a>
                        <a href="#" class="nav-item nav-link" id="nav-hal5-tab" data-toggle="tab" role="tab" aria-controls="nav-hal5" aria-selected="true">Hal. 5 </a>
                        
                    </div> --}}
                </nav>
                
                
           
                {{-- <button class="btn btn-success mt-4"><i class="bi bi-clipboard-plus"></i> Tambah Data</button> --}}
                <div class="row mt-4">
                    
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-tiket" role="tabpanel"
                            aria-labelledby="nav-tiket-tab">
                            <div class="table-responsive">
                            <table class="table" id="table-tiket">
                                <thead>
                                    <tr class="text-center">
                                        <th>NO KARTU KELUARGA</th>
                                        <th>NAMA</th>
                                        <th>HUBUNGAN KELUARGA</th>
                                        <th>ALAMAT</th>
                                        <th>KELURAHAN</th>
                                        <th>ST. KELUARGA</th>
                                        <th>ST. EKONOMI</th>
                                        <th>PRELIST</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datasurvei as $dtw)
                                    <tr>
                                        <td>{{ $dtw->no_kk }}</td>
                                        <td>{{ $dtw->nama}}</td>
                                        <td>{{ $dtw->hub_keluarga}}</td>
                                        <td>{{ $dtw->alamat}}</td>
                                        <td>{{ $dtw->kelurahan}}</td>
                                        <td>{{ $dtw->status_keluarga}}</td>
                                        <td>{{ $dtw->status_ekonomi}}</td>
                                        <td>{{ $dtw->hasil_prelist}}</td>
                                       
                                        <td>
                                            <a href="/main/tampil/{{ $dtw->nik }}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
                                            {{-- <span class="badge bg-primary">Edit</span> --}}
                                            <!-- <span class="badge bg-warning"><i class="bi bi-bullseye"></i></span> -->
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