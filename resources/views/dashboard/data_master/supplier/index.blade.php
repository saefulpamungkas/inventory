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
                                    <h4 class="card-title">Data Supplier</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#addCreate">
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
                                            <th>No Telphone</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $supplier->nama_supplier }}</td>
                                                <td>{{ $supplier->no_telp }}</td>
                                                <td>{{ $supplier->alamat_supplier }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $supplier->id }}" class="btn btn-xs btn-warning"
                                                        data-toggle="modal"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <a href="#modalHapus{{ $supplier->id }}" class="btn btn-xs btn-danger"
                                                        id="alert_demo_7" data-toggle="modal"><i class="fa fa-trash"></i>
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
    <div class="modal fade" id="addCreate" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form method="POST" action="/dashboard/datamaster/supplier/store" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                                placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Telephone</label>
                            <input type="number" class="form-control" name="no_telp" id="no_telp"
                                placeholder="Masukan Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="alamat_supplier" id="alamat_supplier"
                                placeholder="Alamat" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                            Change</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Modal -->
    @foreach ($suppliers as $sup)
        <div class="modal fade" id="modalEdit{{ $sup->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Edit</span>
                            <span class="fw-light">
                                Supplier
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/dashboard/datamaster/supplier/update/{{ $sup->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $sup->nama_supplier }}"
                                    name="nama_supplier" id="nama_supplier" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Telephone</label>
                                <input type="number" class="form-control" value="{{ $sup->no_telp }}" name="no_telp"
                                    id="no_telp" placeholder="Masukan Angka" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" value="{{ $sup->alamat_supplier }}"
                                    name="alamat_supplier" id="alamat_supplier" placeholder="Alamat" required>
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
    @foreach ($suppliers as $hapus)
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
                    <form method="GET" action="/dashboard/datamaster/supplier/destroy/{{ $hapus->id }}"
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
