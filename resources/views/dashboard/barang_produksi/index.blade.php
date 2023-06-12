@extends('layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Barang Produksi</h4>
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
                            <a href="#">Barang Produksi</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Barang Produksi</h4>
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
                                            <th>Nama Barang</th>
                                            <th>Stock</th>
                                            <th>Spek</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produksi as $pro)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pro->nama_barang }}</td>
                                                <td>{{ $pro->jumlah_produksi }}</td>
                                                <td>{{ $pro->spek }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $pro->id }}" class="btn btn-xs btn-warning"
                                                        data-toggle="modal"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <a href="#modalHapus{{ $pro->id }}" class="btn btn-xs btn-danger"
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
                            Barang</span>
                        <span class="fw-light">Produksi
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/dashboard/produksi/store" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                placeholder="Masukan Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="number" class="form-control" name="jumlah_produksi" id="jumlah_produksi"
                                placeholder="Masukan Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="">Spek</label>
                            <input type="text" class="form-control" name="spek" id="spek" placeholder=""
                                required>
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
    @foreach ($produksi as $edit)
        <div class="modal fade" id="modalEdit{{ $edit->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Edit</span>
                            <span class="fw-light">
                                Barang Produksi
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/dashboard/produksi/update/{{ $edit->id }}"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" class="form-control" value="{{ $edit->nama_barang }}"
                                    name="nama_barang" id="nama_barang" placeholder="Masukan Barang" required>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" class="form-control" value="{{ $edit->jumlah_produksi }}"
                                    name="jumlah_produksi" id="jumlah_produksi" placeholder="Masukan Angka" required>
                            </div>
                            <div class="form-group">
                                <label for="">Spek Barang</label>
                                <input type="text" class="form-control" value="{{ $edit->spek }}" name="spek"
                                    id="spek" placeholder="Masukan Spek" required>
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
    @foreach ($produksi as $hapus)
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
                    <form method="GET" action="/dashboard/produksi/destroy/{{ $hapus->id }}"
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
