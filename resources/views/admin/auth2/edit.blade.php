@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            @if ($message = Session::get('pesan'))
                <div class="alert alert-success mt-5" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data User
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{ url('/updateUser' . '/' . $data->email) }}" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        <label for="Nama Barang" class="form-label fw-bold">Nama</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="disabledTextInput" class="form-control" type="text" name="name"
                                            value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-sm-2">
                                        <label for="Nama Barang" class="form-label fw-bold">Email</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="disabledTextInput" class="form-control" type="text"
                                            value="{{ $data->email }}" readonly>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-sm-2">
                                        <label for="Nama Barang" class="form-label fw-bold">Role</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="disabledTextInput" class="form-control" type="text"
                                            value="{{ $data->role }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        <label for="Nama Barang" class="form-label fw-bold">Password</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input id="disabledTextInput" class="form-control" type="text" name="password"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success me-2">Simpan</button>
                                    <a href="" type="button" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endsection
