@extends('layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Barang Masuk</h4>
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
                            <a href="#">Barang Masuk</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Barang Masuk</h4>
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
                                            <th>Jumlah Masuk</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Spek Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barMasuk as $bar)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bar->barang->nama_barang }}</td>
                                                <td>{{ $bar->jumlah_barang }}</td>
                                                <td>{{ $bar->tanggal_masuk }}</td>
                                                <td>{{ $bar->barang->spek_barang }}</td>
                                                <td>
                                                    <a href="#modalDetail{{ $bar->id }}" class="btn btn-xs btn-info"
                                                        data-toggle="modal"><i class="far fa-eye"></i>
                                                        Detail</a>
                                                    {{-- <a href="#modalEdit{{ $bar->id }}" class="btn btn-xs btn-warning"
                                                        data-toggle="modal"><i class="fa fa-edit"></i>
                                                        Edit</a> --}}
                                                    <a href="#modalHapus{{ $bar->id }}" class="btn btn-xs btn-danger"
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
                        <span class="fw-light">
                            Masuk
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/dashboard/barangmasuk/store" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Supplier</label>
                            <select class="form-control" name="id_supplier" id="id_supplier" required>
                                <option selected disabled>-- Pilih Supplier --</option>
                                @foreach ($supplier as $sup)
                                    <option value="{{ $sup->id }}">{{ $sup->nama_supplier }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Barang Masuk</label>
                            <select class="form-control" name="id_barang" id="id_barang" required>
                                <option selected disabled>-- Pilih Barang --</option>
                                @foreach ($barang as $bar)
                                    <option value="{{ $bar->id }}">{{ $bar->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Masuk</label>
                            <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang"
                                placeholder="Masukan Angka" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk"
                                placeholder="" required>
                        </div>
                        <label for="">Spek Barang</label>
                        <select class="form-control" name="id_barang" id="id_barang" required>
                            <option selected disabled>-- Pilih Spek Barang --</option>
                            @foreach ($barang as $bar)
                                <option value="{{ $bar->id }}">{{ $bar->spek_barang }}</option>
                            @endforeach
                        </select>
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
    @foreach ($barMasuk as $detail)
        <div class="modal fade" id="modalDetail{{ $detail->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Detail</span>
                            <span class="fw-light">
                                Barang Masuk
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Data Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kode Barang</td>
                                        <td>:</td>
                                        <td>{{ $detail->barang->nama_barang }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Masuk</td>
                                        <td>:</td>
                                        <td>{{ $detail->jumlah_barang }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Masuk</td>
                                        <td>:</td>
                                        <td>{{ $detail->tanggal_masuk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Spek Barang</td>
                                        <td>:</td>
                                        <td>{{ $detail->barang->spek_barang }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Dari Supplier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $detail->supplier->nama_supplier }}</td>
                                    </tr>
                                    <tr>
                                        <td>No Telp</td>
                                        <td>:</td>
                                        <td>{{ $detail->supplier->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $detail->supplier->alamat_supplier }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
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
    @foreach ($barMasuk as $edit)
        <div class="modal fade" id="modalEdit{{ $edit->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Barang</span>
                            <span class="fw-light">
                                Masuk
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/dashboard/barangmasuk/update/{{ $edit->id }}"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select class="form-control" name="id_supplier" id="id_supplier" required>
                                    <option selected>-- Pilih Supplier --</option>
                                    @foreach ($supplier as $sup)
                                        <option
                                            value="{{ $sup->id }}"{{ $sup->id === $edit->id_supplier ? 'selected="selected"' : '' }}>
                                            {{ $sup->nama_supplier }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Barang Masuk</label>
                                <select class="form-control" name="id_barang" id="id_barang" required>
                                    <option selected>-- Pilih Barang --</option>
                                    @foreach ($barang as $bar)
                                        <option value="{{ $bar->id }}"
                                            {{ $bar->id === $edit->id_barang ? 'selected="selected"' : '' }}>
                                            {{ $bar->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Masuk</label>
                                <input type="number" class="form-control" value="{{ $edit->jumlah_barang }}"
                                    name="jumlah_barang" id="jumlah_barang" placeholder="Masukan Angka" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Masuk</label>
                                <input type="date" class="form-control" value="{{ $edit->tanggal_masuk }}"
                                    name="tanggal_masuk" id="tanggal_masuk" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Spek Barang</label>
                                <input type="text" class="form-control" value="{{ $edit->barang->spek_barang }}"
                                    disabled name="spek_barang" id="spek_barang" placeholder="Masukan Spek" required>
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
    @foreach ($barMasuk as $hapus)
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
                    <form method="GET" action="/dashboard/barangmasuk/destroy/{{ $hapus->id }}"
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
