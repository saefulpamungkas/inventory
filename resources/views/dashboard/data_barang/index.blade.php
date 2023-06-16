@extends('layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Barang</h4>
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
                            <a href="#">Data</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Barang</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Stok Barang</h4>
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
                                            <th>Kode</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Spek</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangs as $barang)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $barang->kode_barang }}</td>
                                                <td>{{ $barang->nama_barang }}</td>
                                                <td>{{ $barang->harga }}</td>
                                                <td>{{ $barang->jumlah_barang }}</td>
                                                <td>{{ $barang->spek_barang }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $barang->id }}" class="btn btn-xs btn-warning"
                                                        data-toggle="modal"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <a href="#modalHapus{{ $barang->id }}" class="btn btn-xs btn-danger"
                                                        data-toggle="modal"><i class="fa fa-trash"></i>
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
                            Tambah</span>
                        <span class="fw-light">
                            Barang
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/dashboard/barang/store" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang" id="kode_barang"
                                placeholder="Masukan Kode" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                placeholder="Masukan Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga"
                                placeholder="Masukan Harga" required>
                        </div>
                        <div class="form-group">
                            <label for="">Stok Barang</label>
                            <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang"
                                placeholder="Masukan Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="">Spek Barang</label>
                            <input type="text" class="form-control" name="spek_barang" id="spek_barang"
                                placeholder="Masukan Spek" required>
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
    @foreach ($barangs as $edit)
        <div class="modal fade" id="modalEdit{{ $edit->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Edit</span>
                            <span class="fw-light">
                                Barang
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/dashboard/barang/update/{{ $edit->id }}"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode Barang</label>
                                <input type="text" value="{{ $edit->kode_barang }}" class="form-control"
                                    name="kode_barang" id="kode_barang" placeholder="Masukan Barang" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" value="{{ $edit->nama_barang }}" class="form-control"
                                    name="nama_barang" id="nama_barang" placeholder="Masukan Barang" required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" value="{{ $edit->harga }}" class="form-control" name="harga"
                                    id="harga" placeholder="Masukan Harga" required>
                            </div>
                            <div class="form-group">
                                <label for="">Stok Barang</label>
                                <input type="number" value="{{ $edit->jumlah_barang }}" class="form-control"
                                    name="jumlah_barang" id="jumlah_barang" placeholder="Masukan Angka" required>
                            </div>
                            <div class="form-group">
                                <label for="">Spek Barang</label>
                                <input type="text" value="{{ $edit->spek_barang }}" class="form-control"
                                    name="spek_barang" id="spek_barang" placeholder="Masukan Angka" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                Change</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fa fa-undo"></i>
                                Close</button>
                        </div>
                </div>

                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal -->
    @foreach ($barangs as $hapus)
        <div class="modal fade" id="modalHapus{{ $hapus->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Hapus</span>
                            <span class="fw-light">
                                Barang
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="GET" action="/dashboard/barang/destroy/{{ $hapus->id }}"
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
