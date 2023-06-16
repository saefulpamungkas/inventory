@extends('layouts.main')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Barang Keluar</h4>
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
                            <a href="#">Barang Keluar</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Barang Keluar</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#modalCreate">
                                        <i class="fas fa-print"></i>
                                        Export
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
                                            <th>Nama Pemesan</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Spek Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barKeluar as $bar)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bar->nama_pemesan }}</td>
                                                <td>{{ $bar->barang->nama_barang }}</td>
                                                <td>{{ $bar->jumlah_barang }}</td>
                                                <td>{{ $bar->tanggal_keluar }}</td>
                                                <td>{{ $bar->barang->spek_barang }}</td>
                                                <td>
                                                    <a href="#modalDetail{{ $bar->id }}" class="btn btn-xs btn-info"
                                                        data-toggle="modal"><i class="far fa-eye"></i>
                                                        Detail</a>

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
    @foreach ($barKeluar as $detail)
        <div class="modal fade" id="modalDetail{{ $detail->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Detail</span>
                            <span class="fw-light">
                                Barang Keluar
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
                                        <td>Jumlah Keluar</td>
                                        <td>:</td>
                                        <td>{{ $detail->jumlah_barang }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Keluar</td>
                                        <td>:</td>
                                        <td>{{ $detail->tanggal_keluar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Spek Barang</td>
                                        <td>:</td>
                                        <td>{{ $detail->barang->spek_barang }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Dari Pemesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $detail->nama_pemesan }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>
                                Close</button>
                        </div>
                </div>

                </form>
            </div>
        </div>
    @endforeach
@endsection
