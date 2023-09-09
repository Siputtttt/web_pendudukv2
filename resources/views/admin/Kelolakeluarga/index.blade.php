@extends('admin.layout.app')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <!-- Modal -->
            <div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('kelolaKeluarga.store') }}">
                                @csrf
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="Nama Barang" class="form-label fw-bold">No
                                                KK</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="nokk"
                                                value="" placeholder="No KK" maxlength="16" required></div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Kepala Keluarga</label>
                                        </div>
                                        <div class="col-sm-8"><input class="form-control" type="text"
                                                name="kepalakeluarga" placeholder="Nama Kepala Keluarga"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">RT/RW</label></div>
                                        <div class="col-sm-4 mb-1">
                                            <select class="form-select" aria-label="Default select example" name="rt"  required>
                                                <option value="" selected>Pilih RT</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-select" aria-label="Default select example" name="rw" required>
                                                <option value="" selected>Pilih RW</option>
                                                <option value="07">07</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Alamat</label></div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="alamat"
                                                placeholder="Masukan Alamat" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Desa/Kelurahan</label></div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="desa"
                                                placeholder="Desa / Kelurahan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Kecamatan</label></div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="kecamatan"
                                                placeholder="Kecamatan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Kabupaten</label></div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="kabupaten"
                                                placeholder="Kabupaten" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Provinsi</label></div>
                                        <div class="col-sm-8"><input class="form-control" type="text" name="provinsi"
                                                placeholder="Provinsi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-danger me-2">Simpan</button>
                                    <a type="button" data-bs-dismiss="modal" aria-label="Close"
                                        class="btn btn-success">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('pesan'))
                <div class="alert alert-success mt-5" data-bs-toggle="alert">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
                    {{ $message }}
                </div>
            @endif
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="card mt-4">
                <div class="card-header text-light" style="background: rgb(152, 156, 160)">
                    <i class="fa-solid fa-database"></i>
                    Data Kartu Keluarga
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#tambahdata"><i class="fa-solid fa-id-card-clip"></i> Tambah Kartu KK</button>
                    <table id="example" class="table" width="100%">
                        <thead class="table-success">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No KK</th>
                                <th class="text-center">Nama Kepala Keluarga</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Anggota KK</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $item)
                                {{-- @if (Auth::user()->role == 'admin' or
                                        Auth::user()->role == 'RW' ||
                                            (Auth::user()->role == 'RT01' && $item->rt == '01') ||
                                            (Auth::user()->role == 'RT02' && $item->rt == '02') ||
                                            (Auth::user()->role == 'RT03' && $item->rt == '03') ||
                                            (Auth::user()->role == 'RT04' && $item->rt == '04')) --}}
                                    <tr>
                                        <th scope="row text-center">{{ $i++ }}</th>
                                        <td class="text-center">{{ $item->nokk }}</td>
                                        <td class="text-center">{{ $item->kepalakeluarga }}</td>
                                        <td class="text-center">{{ $item->alamat }} RT {{ $item->rt }}/RW
                                            {{ $item->rw }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('kelolaKeluarga.show', $item->nokk) }}"
                                                class="btn btn-secondary">
                                                <i class="fa-solid fa-eye"></i> Lihat
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('kelolaKeluarga.destroy', $item->nokk) }}"
                                                method="POST">
                                                <a href="{{ route('kelolaKeluarga.edit', $item->nokk) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a>
                                                @csrf
                                                @method('DELETE')

                                                {{-- @can('admin') --}}
                                                    <button onclick="return confirm('Yakin  Data Akan Dihapus?')"
                                                        type="submit" class="btn btn-danger" id="hapus">
                                                        <i class="fa-solid fa-trash"></i> Hapus
                                                    </button>
                                                {{-- @endcan --}}
                                            </form>
                                        </td>
                                    </tr>
                                {{-- @endif --}}
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

        <!-- Or for RTL support -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true
                });
            });
        </script>
    </main>
@endsection
