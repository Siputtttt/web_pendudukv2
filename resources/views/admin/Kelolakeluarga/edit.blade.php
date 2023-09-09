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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mb-4 mt-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Data Keluarga
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{ url('/kelolaKeluarga' . '/' . $keluargaModel->nokk) }}" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label for="Nama Barang" class="form-label fw-bold">No KK</label>
                                    </div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="nokk"
                                            value="{{ $keluargaModel->nokk }}" readonly></div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Kepala Keluarga</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                            value="{{ $keluargaModel->kepalakeluarga }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">RT/RW</label></div>
                                    <div class="col-sm-2"><input class="form-control" type="number" name="rt"
                                            value="{{ $keluargaModel->rt }}">
                                    </div>
                                    <div class="col-sm-2"><input class="form-control" type="number" name="rw"
                                            value="{{ $keluargaModel->rw }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Alamat</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="alamat"
                                            value="{{ $keluargaModel->alamat }}">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-4"><label class="form-label">Kode POS</label></div>
                                    <div class="col-sm-8"><input class="form-control" type="text" name="kodepos"
                                            value="{{ $keluargaModel->kodepos }}" readonly>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Desa/Kabupaten</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="desa"
                                            value="{{ $keluargaModel->desa }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Kecamatan</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="kecamatan"
                                            value="{{ $keluargaModel->kecamatan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Kabupaten</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="kabupaten"
                                            value="{{ $keluargaModel->kabupaten }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Provinsi</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="provinsi"
                                            value="{{ $keluargaModel->provinsi }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-danger me-2">Simpan</button>
                                <a href="{{ url('/kelolaKeluarga') }}"  class="btn btn-success">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true
                });
            });
        </script>
    </main>
@endsection
