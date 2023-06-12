@extends('layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Master</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Tables</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Datatables</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Produsen</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#modalCreate">
                                        <i class="fa fa-plus"></i>
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Seluler</th>
                                            <th>No Hp WA</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produsens as $produsen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $produsen->nama_produsen }}</td>
                                                <td>{{ $produsen->no_seluler }}</td>
                                                <td>{{ $produsen->no_telp_wa }}</td>
                                                <td>{{ $produsen->alamat_produsen }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $produsen->id }}" class="btn btn-xs btn-warning"
                                                        data-toggle="modal"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <a href="#modalHapus{{ $produsen->id }}" class="btn btn-xs btn-danger"
                                                        data-toggle="modal" id="alert_demo_7"><i class="fa fa-trash"></i>
                                                        Hapus</a>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            New</span>
                        <span class="fw-light">
                            Row
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/dashboard/datamaster/produsen/store" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama_produsen" id="nama_produsen"
                                placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Seluler</label>
                            <input type="text" class="form-control" name="no_seluler" id="no_seluler"
                                placeholder="Masukan Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Hp WA</label>
                            <input type="text" class="form-control" name="no_telp_wa" id="no_telp_wa"
                                placeholder="Masukan Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="alamat_produsen" id="alamat_produsen"
                                placeholder="Alamat Lengkap" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                            Change</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                    </div>
            </div>

            </form>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($produsens as $pro)
        <div class="modal fade" id="modalEdit{{ $pro->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                New</span>
                            <span class="fw-light">
                                Row
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/dashboard/datamaster/produsen/update/{{ $pro->id }}"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $pro->nama_produsen }}"
                                    name="nama_produsen" id="nama_produsen" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Seluler</label>
                                <input type="text" class="form-control" value="{{ $pro->no_seluler }}"
                                    name="no_seluler" id="no_seluler" placeholder="Masukan Angka" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Telp WA</label>
                                <input type="text" class="form-control" value="{{ $pro->no_telp_wa }}"
                                    name="no_telp_wa" id="no_telp_wa" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" value="{{ $pro->alamat_produsen }}"
                                    name="alamat_produsen" id="alamat_produsen" placeholder="" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                Change</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fa fa-undo"></i>
                                Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @endforeach

    <!-- Modal -->
    @foreach ($produsens as $hapus)
        <div class="modal fade" id="modalHapus{{ $hapus->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Hapus</span>
                            <span class="fw-light">
                                Supplier
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="GET" action="/dashboard/datamaster/produsen/destroy/{{ $hapus->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <h4>Apkah anda ingin menghapus data ini?</h4>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                Hapus</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-undo"></i>
                                Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @endforeach
@endsection
