@extends('layouts.main')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">{{ $title }}</h4>
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
                            <a href="#">User</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data User</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#modalCreate">
                                        <i class="fa fa-plus"></i>
                                        Tambah Data
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    {{-- <td>
                                                        <a href="#modalEdit{{ $user->id }}" data-toggle="modal"
                                                            class="btn btn-xs btn-warning"><i class="fa fa-edit"></i>
                                                            Edit</a>
                                                        <a href="#modalHapus{{ $user->id }}" data-toggle="modal"
                                                            class="btn btn-xs btn-danger" id="alert_demo_7"><i
                                                                class="fa fa-trash"></i>
                                                            Hapus</a>
                                                    </td> --}}
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
                            User
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/dashboard/datamaster/user/store" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama User</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Nama User" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="example@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="role" required>
                                <option value="" hidden>-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="owner">Owner</option>
                            </select>
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
    @foreach ($users as $edit)
        <div class="modal fade" id="modalEdit{{ $edit->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Edit</span>
                            <span class="fw-light">
                                User
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/dashboard/datamaster/user/update/{{ $edit->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $edit->name }}" name="name"
                                    id="name" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama User</label>
                                <input type="text" value="{{ $edit->username }}" class="form-control" name="namaUser"
                                    id="namaUser" placeholder="Nama User" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="{{ $edit->email }}" class="form-control" name="email"
                                    id="email" placeholder="example@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="form-control" name="role" required>
                                    <option value="{{ $edit->id }}"
                                        {{ $edit->role === $edit->id ? 'selected' : '' }}>{{ $edit->role }}</option>
                                    <option value="{{ $edit->role }}">{{ $edit->role !== $edit->id ? 'admin' : '' }}
                                    </option>
                                    {{-- @if ($edit->role === $edit->id)
                                        <option value="{{ $edit->id }}" selected>{{ $edit->role }}</option>
                                    @elseif ($edit->role != $edit->id)
                                        <option value="{{ $edit->id }}">{{ $edit->role }}</option>
                                    @else
                                        <option value="{{ $edit->id }}">{{ $edit->role }}</option>
                                    @endif --}}
                                </select>
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
    @foreach ($users as $hapus)
        <div class="modal fade" id="modalHapus{{ $hapus->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Hapus</span>
                            <span class="fw-light">
                                User
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="GET" action="/dashboard/datamaster/user/destroy/{{ $hapus->id }}"
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
