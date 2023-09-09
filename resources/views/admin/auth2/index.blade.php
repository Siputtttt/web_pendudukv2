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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Nama</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <x-text-input id="name" class="form-control" type="text" name="name"
                                                :value="old('name')" required autofocus autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Email</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <x-text-input id="email" class="form-control" type="email" name="email"
                                                :value="old('email')" required autofocus autocomplete="username"
                                                aria-describedby="emailHelp" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Role</label></div>
                                        <div class="col-sm-4 mb-1">
                                            <select class="form-select" aria-label="Default select example" name="role"
                                                id="role" required>
                                                <option value="" selected>Pilih Role</option>
                                                <option value="admin">Administrator</option>
                                                <option value="RW">RW</option>
                                                <option value="RT01">RT 01</option>
                                                <option value="RT02">RT 02</option>
                                                <option value="RT03">RT 03</option>
                                                <option value="RT04">RT 04</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Password</label></div>
                                        <div class="col-sm-8">
                                            <x-text-input id="password" class="form-control" type="password"
                                                name="password" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="form-label fw-bold">Confirm Password</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <x-text-input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
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
            <div class="card mt-4">
                <div class="card-header text-light" style="background: rgb(152, 156, 160)">
                    <i class="fas fa-table me-1"></i>
                    Data Kartu Keluarga
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#tambahdata"><i class="bi bi-file-earmark-plus"></i> Tambah data</button>
                    <table id="example" class="table-success" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $item)
                                @if ($item->role != 'root')
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->email }}</td>
                                        <td class="text-center">{{ $item->role }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/editUser' . '/' . $item->email) }}"
                                                class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>
                                                Edit</a>
                                            <a href="{{ url('/hapusUser' . '/' . $item->email) }}"
                                                onclick="return confirm('Yakin  Data Akan Dihapus?')" type="submit"
                                                class="btn btn-danger" id="hapus"><i class="fa-solid fa-trash"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
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
@endsection
