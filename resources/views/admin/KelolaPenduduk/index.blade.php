@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <!-- Modal -->
            <div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('kelolaPenduduk.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Nama Barang" class="form-label fw-bold">No
                                                KK</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-select" id="basic-usage" name="nokk"
                                                data-placeholder="Choose one thing" required>
                                                <option value="" selected>Pilih No KK</option>
                                                @foreach ($datakk as $datak)
                                                    <option value="{{ $datak->nokk }}">{{ $datak->nokk }} --
                                                        {{ $datak->kepalakeluarga }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Nama Barang"
                                                class="form-label fw-bold">NIK</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text" maxlength="16"
                                                name="nik" placeholder="Masukan NIK" required>
                                        </div>
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
                                                placeholder="Notel" required>
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
                                        <div class="col-sm-8"><input class="form-control" type="date" name="tanggallahir"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Agama</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example" name="agama"
                                                required>
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
                                                name="golongandarah" placeholder="Masukan Golongan Darah" required>
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

            @if ($pesan != '')
                <div class="alert alert-success mt-4" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $pesan }}
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

            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <i class="fa-solid fa-database"></i>
                    Data Penduduk
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#tambahdata"><i class="fa-regular fa-square-plus"></i> Tambah data
                        Penduduk</button>
                    <div class="table-responsive">
                        <table id="example" class="table" width="100%">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tempat Lahir</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Agama</th>
                                    <th class="text-center">Keluarga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $item)
                                    @php
                                        if ($item->foto == null) {
                                            $foto = 'kosong';
                                        } else {
                                            $foto = $item->foto;
                                        }
                                    @endphp
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td class="text-center">{{ $item->nik }}</td>
                                        <td class="text-center">{{ $item->namalengkap }}</td>
                                        <td class="text-center">{{ $item->jeniskelamin }}</td>
                                        <td class="text-center">{{ $item->tempatlahir }}</td>
                                        <td class="text-center">{{ $item->tanggallahir }}</td>
                                        <td class="text-center">{{ $item->agama }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('kelolaKeluarga.show', $item->nokk) }}"
                                                class="btn btn-secondary"><i class="fa-solid fa-search"></i>
                                                Keanggotaan</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('kelolaPenduduk.show', $item->nik) }}"
                                                class="btn btn-primary"><i class="fa-solid fa-eye"></i>
                                                Lihat</a>
                                            <a href="{{ route('kelolaPenduduk.edit', $item->nik) }}"
                                                class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>
                                                Edit</a>
                                            {{-- @can('admin') --}}
                                                <a href="hapusPenduduk/{{ $item->nik }}/{{ $foto }}"
                                                    onclick="return confirm('Yakin  Data Akan Dihapus?')"
                                                    class="btn btn-danger" type="button"><i class="fa-solid fa-trash"></i>
                                                    Hapus</a>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            // $('#basic-usage').select2({
            //     theme: "bootstrap-5",
            //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            //     placeholder: $(this).data('placeholder'),
            // });
            // $("#select2Input").select2({ dropdownParent: "#modal-container" });
            $('#basic-usage').select2({
                dropdownParent: "#tambahdata",
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
            });
        </script>
    </main>
@endsection
