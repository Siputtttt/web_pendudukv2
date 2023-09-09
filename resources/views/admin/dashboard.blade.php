@extends('admin.layout.app')

@section('content')
    <main>
        @error('role')
            <p class="text-red-600 mt-2 text-sm">{{ $message }}</p>
        @enderror
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <p class="breadcrumb-item active" style="font-size: 23px;">Selamat datang, <b>{{ Auth::user()->name }}</b></p>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="row d-flex justify-content-center">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4 m-2">
                        <div class="m-0">
                            <div class="card-body text-center">
                                <p class="mb-0">Jumlah</p>
                                <h3><i class="fa-solid fa-user-plus"></i> Penduduk</h3>
                                <h1 class="">{{ $pdd }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4 m-2">
                        <div class="m-0">
                            <div class="card-body text-center">
                                <p class="mb-0">Jumlah</p>
                                <h3><i class="fa-solid fa-id-card-clip"></i> Keluarga</h3>
                                <h1 class="">{{ $kl }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4 m-2">
                        <div class="m-0">
                            <div class="card-body text-center">
                                <p class="mb-0">Jumlah</p>
                                <h3><i class="fa-solid fa-mars"></i> Laki-Laki</h3>
                                <h1 class="text-white text-center">{{ $lk }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4 m-2">
                        <div class="m-0">
                            <div class="card-body text-center">
                                <p class="mb-0">Jumlah</p>
                                <h3><i class="fa-solid fa-venus"></i> Perempuan</h3>
                                <h1 class="text-white text-center">{{ $pr }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Success Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
