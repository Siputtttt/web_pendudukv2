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
            <!-- Modal -->
            <div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('/tambahAnggota') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Nama Barang"
                                                class="form-label fw-bold">NIK</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="nik" maxlength="16" placeholder="Masukan No KK" required>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="hidden" name="nokk"
                                                value="{{ $datakk->nokk }}" placeholder="Masukan No KK"></div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Nama
                                                Lengkap</label></div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="namalengkap"
                                                placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">No
                                                Telp</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="notel"
                                                placeholder="Notel">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Jenis
                                                Kelamin</label></div>
                                        <div class="col-sm-4">
                                            <select class="form-select" aria-label="Default select example"
                                                name="jeniskelamin" required>
                                                <option value="" selected>Pilih Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Tempat
                                                Lahir</label></div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="tempatlahir"
                                                placeholder="Tempat Lahir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Tanggal
                                                Lahir</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="date" name="tanggallahir" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Agama</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example" name="agama" required>
                                                <option value="" selected>Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Pendidikan</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text"
                                                name="pendidikan" placeholder="Pendidikan Terakhir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Jenis
                                                Pekerjaan</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text"
                                                name="jenispekerjaan" placeholder="Jenis Pekerjaan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label  fw-bold">Golongan
                                                Darah</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text"
                                                name="golongandarah" placeholder="Masukan Golongan Darah">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label  fw-bold">Status
                                                Perkawinan</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example"
                                                name="statusperkawinan" required>
                                                <option value="" selected>Pilih Status</option>
                                                <option value="Kawin Tercatat">Kawin Tercatat</option>
                                                <option value="Kawin Tidak Tercatat">Kawin Tidak Tercatat
                                                </option>
                                                <option value="Belum Kawin">Belum Kawin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Status
                                                Hubungan</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example"
                                                name="statushubungan" required>
                                                <option value="" selected>Pilih Status</option>
                                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                <option value="Istri">Istri</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Saudara">Saudara</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="form-label fw-bold">Kewarganegaraan</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example"
                                                name="kewarganegaraan" required>
                                                <option value="" selected>Pilih Status</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Nama
                                                Ayah</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="ayah"
                                                placeholder="Masukan Nama Ayah" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Nama
                                                Ibu</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="ibu"
                                                placeholder="Masukan Nama Ibu" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4"><label class="form-label fw-bold">Foto</label></div>
                                    <div class="col-sm-8"><img src="" id="output" width="100%">
                                        <input type="file" class="form-control mt-2" name="foto" id="foto"
                                            accept=".jpg, .jpeg, .png"
                                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-danger me-2">Simpan</button>
                                    <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                        class="btn btn-success">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Keluarga
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label for="Nama Barang" class="form-label fw-bold">No KK</label>
                                </div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $datakk->nokk }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Kepala Keluarga</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kepalakeluarga"
                                        value="{{ $datakk->kepalakeluarga }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="form-label fw-bold">RT/RW</label>
                                </div>
                                <div class="col-sm-4 row">
                                    <div class="col-sm"> <input class="form-control" type="number" name="rt"
                                            value="{{ $datakk->rt }}" readonly></div>
                                    <div class="col-sm"> <input class="form-control" type="number" name="rt"
                                            value="{{ $datakk->rw }}" readonly></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Alamat</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="alamat"
                                        value="{{ $datakk->alamat }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Desa/Kabupaten</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="desa"
                                        value="{{ $datakk->desa }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Kecamatan</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kecamatan"
                                        value="{{ $datakk->kecamatan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Kabupaten</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="kabupaten"
                                        value="{{ $datakk->kabupaten }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="row">
                                <div class="col-sm-2"><label class="form-label fw-bold">Provinsi</label></div>
                                <div class="col-sm-4"><input class="form-control" type="text" name="provinsi"
                                        value="{{ $datakk->provinsi }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#tambahdata"><i class="fa-regular fa-square-plus"></i> Tambah anggota
                                keluarga</button>
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
            <div class="container">
                <div class="table-responsive">
                    <table id="example" class="table" width="100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No. Telp</th>
                                <th class="text-center">Hubungan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($datap as $item)
                                @php
                                    if ($item->foto == null) {
                                        $foto = 'kosong';
                                    } else {
                                        $foto = $item->foto;
                                    }
                                @endphp
                                <tr>
                                    <td scope="text-center"><?= $i++ ?></th>
                                    <td class="text-center">{{ $item->nik }}</td>
                                    <td class="text-center">{{ $item->namalengkap }}</td>
                                    <td class="text-center">{{ $item->notel }} </td>
                                    <td class="text-center">{{ $item->statushubungan }}</td>
                                    <td class="text-center">
                                        <a type="button" class="btn btn-primary"
                                            href="{{ url('/kelolaKeluarga/lihatAnggota' . '/' . $item->nik) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a type="button" class="btn btn-danger"
                                            href="{{ url('/kelolaKeluarga/hapusAnggota' . '/' . $item->nik . '/' . $item->nokk . '/' . $foto) }}"
                                            onclick="return confirm('yakin bang dihapus?')">
                                            <i class="bi bi-trash3"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
        <script></script>
    </main>
@endsection
