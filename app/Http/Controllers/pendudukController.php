<?php

namespace App\Http\Controllers;

use App\Models\keluargaModel;
use App\Models\pendudukModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Cast\String_;

class pendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pendudukModels::get();
        $datakk = keluargaModel::get();
        $pesan = "";
        $title = 'penduduk';
        return view('admin.Kelolapenduduk.index', compact('data', 'datakk', 'pesan', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nokk = $request->nokk;
        $request->validate([
            'nik' => 'required',
            'nokk' => 'required',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenispekerjaan' => 'required',
            'golongandarah' => 'required',
            'statusperkawinan' => 'required',
            'statushubungan' => 'required',
            'kewarganegaraan' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $input = [
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'namalengkap' => $request->namalengkap,
            'notel' => $request->notel,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'jenispekerjaan' => $request->jenispekerjaan,
            'golongandarah' => $request->golongandarah,
            'statusperkawinan' => $request->statusperkawinan,
            'statushubungan' => $request->statushubungan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
        ];
        // var_dump($request->hasFile('foto'));
        // die();

        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = $foto_file->hashName();
            $foto_file->move(public_path('storage'), $foto_nama);

            $input['foto'] = $foto_nama;
        }

        try {
            pendudukModels::create($input);

            $data = pendudukModels::get();
            $datakk = keluargaModel::get();
            $pesan = "Berhasil Menambahkan Penduduk";
            $title = 'penduduk';
            return view('admin.Kelolapenduduk.index', compact('data', 'datakk', 'pesan', 'title'));
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                $data = pendudukModels::get();
                $datakk = keluargaModel::get();
                $title = 'penduduk';
                return view('admin.Kelolapenduduk.index', compact('data', 'datakk', 'title'));
            } else if ($errorCode == 1406) {
                $data = pendudukModels::get();
                $datakk = keluargaModel::get();
                $title = 'penduduk';
                return view('admin.Kelolapenduduk.index', compact('data', 'datakk', 'title'));
            }
        }
    }
    public function storeAnggota(Request $request)
    {
        $nokk = $request->nokk;
        $request->validate([
            'nik' => 'required',
            'nokk' => 'required',
            'namalengkap' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenispekerjaan' => 'required',
            'statusperkawinan' => 'required',
            'statushubungan' => 'required',
            'kewarganegaraan' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $input = [
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'namalengkap' => $request->namalengkap,
            'notel' => $request->notel,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'jenispekerjaan' => $request->jenispekerjaan,
            'golongandarah' => $request->golongandarah,
            'statusperkawinan' => $request->statusperkawinan,
            'statushubungan' => $request->statushubungan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
        ];

        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = $foto_file->hashName();
            $foto_file->move(public_path('storage'), $foto_nama);

            $input['foto'] = $foto_nama;
        }

        try {
            pendudukModels::create($input);

            $datakk = keluargaModel::where('nokk', $nokk)->first();
            $datap = pendudukModels::where('nokk', $nokk)->get();
            $pesan = "Berhasil Menambahkan Anggota baru";
            $title = 'keluarga';
            return view('admin.kelolaKeluarga.show', compact('datakk', 'datap', 'pesan', 'title'));
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                $datakk = keluargaModel::where('nokk', $nokk)->first();
                $datap = pendudukModels::where('nokk', $nokk)->get();
                $pesan = "Terdapat data NIK yang sama";
                $title = 'keluarga';
                return view('admin.kelolaKeluarga.show', compact('datakk', 'datap', 'pesan', 'title'));
            } else if ($errorCode == 1406) {
                $datakk = keluargaModel::where('nokk', $nokk)->first();
                $datap = pendudukModels::where('nokk', $nokk)->get();
                $pesan = "NIK yang anda masukan salah";
                $title = 'keluarga';
                return view('admin.kelolaKeluarga.show', compact('datakk', 'datap', 'pesan', 'title'));
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $data = pendudukModels::where('nik', $id)->first();
        $pesan = "";
        $title = 'penduduk';
        return view('admin.KelolaPenduduk.show', compact('data', 'pesan', 'title'));
    }
    public function showAnggota(String $id)
    {
        $data = pendudukModels::where('nik', $id)->first();
        $pesan = "";
        $title = 'keluarga';
        return view('admin.KelolaKeluarga.anggotaShow', compact('data', 'pesan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data = pendudukModels::where('nik', $id)->first();
        $pesan = "";
        $title = 'penduduk';
        return view('admin.KelolaPenduduk.edit', compact('data', 'pesan', 'title'));
    }
    public function editAnggota(String $id)
    {
        $data = pendudukModels::where('nik', $id)->first();
        $title = 'keluarga';
        return view('admin.KelolaKeluarga.anggotaEdit', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pendudukModels $pendudukModels)
    {
        $nokk = $request->nokk;
        $nik = $request->nik;
        $request->validate([
            'nik' => 'required',
            'nokk' => 'required',
            'namalengkap' => 'required',
            'notel' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenispekerjaan' => 'required',
            'golongandarah' => 'required',
            'statusperkawinan' => 'required',
            'statushubungan' => 'required',
            'kewarganegaraan' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $input = [
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'namalengkap' => $request->namalengkap,
            'notel' => $request->notel,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'jenispekerjaan' => $request->jenispekerjaan,
            'golongandarah' => $request->golongandarah,
            'statusperkawinan' => $request->statusperkawinan,
            'statushubungan' => $request->statushubungan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
        ];


        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = $foto_file->hashName();
            $foto_file->move(public_path('storage'), $foto_nama);

            $input['foto'] = $foto_nama;


            //hapus foto lama
            $foto_lama = $request->fotolama;
            File::delete('storage/' . $foto_lama);
        }

        try {
            pendudukModels::where('nik', $nik)->update($input);
            $data = pendudukModels::where('nik', $nik)->first();
            $pesan = "Data Telah di UPDATE";
            $title = 'penduduk';
            return view('admin.KelolaPenduduk.show', compact('data', 'pesan', 'title'));
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                $datakk = keluargaModel::where('nokk', $nokk)->first();
                $datap = pendudukModels::where('nokk', $nokk)->get();
                $title = 'penduduk';
                return view('admin.Kelolakeluarga.show', compact('datakk', 'datap', 'title'))->with('pesan', 'Terdapat data Yang sama, cek kembali NIK');
            } else if ($errorCode == 1406) {
                $datakk = keluargaModel::where('nokk', $nokk)->first();
                $datap = pendudukModels::where('nokk', $nokk)->get();
                $title = 'penduduk';
                return view('admin.Kelolakeluarga.show', compact('datakk', 'datap', 'title'))->with('pesan', 'NIK yang anda masukan salah');
            }
        }
    }

    public function simpanEditAnggota(Request $request, pendudukModels $pendudukModels)
    {
        $nokk = $request->nokk;
        $nik = $request->nik;
        $request->validate([
            'nik' => 'required',
            'nokk' => 'required',
            'namalengkap' => 'required',
            'notel' => 'required',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenispekerjaan' => 'required',
            'golongandarah' => 'required',
            'statusperkawinan' => 'required',
            'statushubungan' => 'required',
            'kewarganegaraan' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $input = [
            'nik' => $request->nik,
            'nokk' => $request->nokk,
            'namalengkap' => $request->namalengkap,
            'notel' => $request->notel,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan,
            'jenispekerjaan' => $request->jenispekerjaan,
            'golongandarah' => $request->golongandarah,
            'statusperkawinan' => $request->statusperkawinan,
            'statushubungan' => $request->statushubungan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
        ];


        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_nama = $foto_file->hashName();
            $foto_file->move(public_path('storage'), $foto_nama);

            $input['foto'] = $foto_nama;


            //hapus foto lama
            $foto_lama = $request->fotolama;
            File::delete('storage/' . $foto_lama);
        }

        pendudukModels::where('nik', $nik)->update($input);
        $data = pendudukModels::where('nik', $nik)->first();
        $pesan = "Data Berhasil di UPDATE";
        $title = 'keluarga';
        return view('admin.kelolaKeluarga.anggotaShow', compact('data', 'pesan', 'title'));

        // try {
        //     pendudukModels::where('nik', $nik)->update($input);
        //     $data = pendudukModels::where('nik', $nik)->first();
        //     $pesan = "Data Berhasil di UPDATE";
        //     return view('kelolaKeluarga.anggotaShow', compact('datakk', 'datap', 'pesan'));
        // } catch (\Illuminate\Database\QueryException $e) {
        //     $errorCode = $e->errorInfo[1];
        //     if ($errorCode == 1062) {
        //         $datakk = keluargaModel::where('nokk', $nokk)->first();
        //         $datap = pendudukModels::where('nokk', $nokk)->get();
        //         return view('Kelolakeluarga.show', compact('datakk', 'datap'))->with('pesan', 'Terdapat data Yang sama, cek kembali NIK');
        //     } else if ($errorCode == 1406) {
        //         $datakk = keluargaModel::where('nokk', $nokk)->first();
        //         $datap = pendudukModels::where('nokk', $nokk)->get();
        //         return view('Kelolakeluarga.show', compact('datakk', 'datap'))->with('pesan', 'NIK yang anda masukan salah');
        //     }
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id, String $foto)
    {
        File::delete('storage/' . $foto);

        pendudukModels::where('nik', $id)->delete();

        $pesan = "Data penduduk berhasil dihapus";
        return redirect('/kelolaPenduduk')->with('pesan', "Data PENDUDUK berhasil dihapus");
    }

    public function hapusAnggota(String $nik, String $nokk, String $foto)
    {
        pendudukModels::where('nik', $nik)->delete();

        File::delete('storage/' . $foto);

        $datakk = keluargaModel::where('nokk', $nokk)->first();
        $datap = pendudukModels::where('nokk', $nokk)->get();
        return view('admin.Kelolakeluarga.show', compact('datakk', 'datap'))->with('pesan', "Data Berhasil Dihapus");
    }
}
