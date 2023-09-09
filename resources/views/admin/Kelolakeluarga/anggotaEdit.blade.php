@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid pt-5 px-4">
            @if ($message = Session::get('pesan'))
                <div class="alert alert-success" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Penduduk
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{ url('/kelolaKeluarga/simpanEditAnggota' . '/' . $data->nik) }}" method="post"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2 visually-hidden">
                                <div class="row">
                                    <div class="col-sm-2"><label for="Nama Barang" class="form-label fw-bold">No KK</label>
                                    </div>
                                    <div class="col-sm-4"><input id="disabledTextInput" class="form-control" type="text"
                                            name="nokk" value="{{ $data->nokk }}"></div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">NIK</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="nik"
                                            value="{{ $data->nik }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Nama Lengkap</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="namalengkap"
                                            value="{{ $data->namalengkap }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">No. Telp</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="notel"
                                            value="{{ $data->notel }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Status Hubungan</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="statushubungan"
                                            value="{{ $data->statushubungan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Jenis Kelamin</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="jeniskelamin"
                                            value="{{ $data->notel }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Tempat Tanggal Lahir</label>
                                    </div>
                                    <div class="col-sm-2 mb-2"><input class="form-control" type="text" name="tempatlahir"
                                            value="{{ $data->tempatlahir }}">
                                    </div>
                                    <div class="col-sm-2 mb-2"><input class="form-control" type="date"
                                            name="tanggallahir" value="{{ $data->tanggallahir }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Agama</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="agama"
                                            value="{{ $data->agama }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Pendidikan</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="pendidikan"
                                            value="{{ $data->pendidikan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Pekerjaan</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text"
                                            name="jenispekerjaan" value="{{ $data->jenispekerjaan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Status Perkawinan</label>
                                    </div>
                                    <div class="col-sm-4"><input class="form-control" type="text"
                                            name="statusperkawinan" value="{{ $data->statusperkawinan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Golongan Darah</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text"
                                            name="golongandarah" value="{{ $data->golongandarah }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Nama Ayah</label>
                                    </div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="ayah"
                                            placeholder="Masukan Nama Ayah" value="{{ $data->ayah }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Nama Ibu</label>
                                    </div>
                                    <div class="col-sm-4"><input class="form-control" type="text" name="ibu"
                                            placeholder="Masukan Nama Ibu" value="{{ $data->ibu }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-sm-2"><label class="form-label fw-bold">Kewarganegaraan</label></div>
                                    <div class="col-sm-4"><input class="form-control" type="text"
                                            name="kewarganegaraan" value="{{ $data->kewarganegaraan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    @php
                                        if ($data->foto == '') {
                                            $sc = '/storage/nofoto.jpeg';
                                        } else {
                                            $sc = '/storage/' . $data->foto;
                                        }
                                    @endphp
                                    <div class="col-sm-2"><label class="form-label fw-bold">Foto</label></div>
                                    <div class="col-sm-4">
                                        <img src="{{ url('/') . $sc }}" width="100%" id="fotoku" />
                                    </div>
                                    <div class="mb-2 gambar">
                                        <input type="file" class="form-control" name="foto" id="foto"
                                            accept=".jpg, .jpeg, .png">
                                        <input type="hidden" name="fotolama" id="fotolama"
                                            value="{{ $data->foto }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <a href="{{ url('/kelolaKeluarga/lihatAnggota' . '/' . $data->nik) }}"
                                    class="btn btn-primary"><i class="fa-solid fa-angles-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#tambahdata"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    <script type="text/javascript">
        $(".gambar").on("change", function() {
            var fileInput = document.getElementById('foto');
            var filePath = fileInput.value;
            var fileName = $(this).val().split("\\").pop();
            var xx = $(this).val();

            //------------preview foto-----------
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#fotoku').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        });
    </script>
@endsection
