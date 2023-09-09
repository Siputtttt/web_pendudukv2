@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid pt-5 px-4">
            @if ($pesan != '')
                <div class="alert alert-success" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $pesan }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Penduduk
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group mb-1 visually-hidden">
                            <div class="row">
                                <div class="col-sm-2"><label for="Nama Barang" class="form-label fw-bold">No KK</label>
                                </div>
                                <div class="col-sm-4"><input id="disabledTextInput" class="form-control" type="text"
                                        name="nokk" value="{{ $data->nokk }}" readonly></div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">NIK</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->nik }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Nama Lengkap</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->namalengkap }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">No. Telp</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->notel }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Status Hubungan</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->statushubungan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Jenis Kelamin</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->jeniskelamin }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Tempat Tanggal Lahir</label></div>
                                <div class="col-sm-2"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->tempatlahir }}" readonly>
                                </div>
                                <div class="col-sm-2"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->tanggallahir }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Agama</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->agama }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Pendidikan</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->pendidikan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Pekerjaan</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->jenispekerjaan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Golongan Darah</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->golongandarah }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Kewarganegaraan</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $data->kewarganegaraan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                @php
                                    if ($data->foto == '') {
                                        $sc = '/storage/nofoto.jpeg';
                                    } else {
                                        $sc = '/storage/' . $data->foto;
                                    }
                                @endphp
                                <div class="col-sm-2"><label class="form-label fw-bold">Foto</label></div>
                                <div class="col-sm-4"><img src="{{ url('/') . $sc }}" width="100%" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <a class="btn btn-success ms-1"
                                href="{{ url('/kelolaKeluarga/editAnggota' . '/' . $data->nik) }}"><i
                                    class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a href="{{ route('kelolaKeluarga.show', $data->nokk) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-angles-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('pesan'))
                <div class="alert alert-success" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif

        </div>
    </main>
@endsection
