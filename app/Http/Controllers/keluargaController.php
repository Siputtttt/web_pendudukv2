<?php

namespace App\Http\Controllers;

use App\Models\keluargaModel;
use App\Models\pendudukModels;
use Illuminate\Http\Request;

class keluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = keluargaModel::get();
        $title = 'keluarga';
        return view('admin.Kelolakeluarga.index', compact('data', 'title'));
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
        $validator = $request->validate([
            'nokk' => 'required',
            'kepalakeluarga' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        $input = $request->all();
        // $input = [
        //     'nokk' => $request->nokk,
        //     'kepalakeluarga' => $request->kepalakeluarga,
        //     'rt' => $request->rt,
        //     'rw' => $request->rw,
        //     'desa' => $request->desa,
        //     'kabupaten' => $request->kabupaten,
        //     'provinsi' => $request->provinsi,
        // ];

        // var_dump($input);
        // die();

        try {
            keluargaModel::create($input);
            return redirect('/kelolaKeluarga')->with('pesan', "No KK Berhasil Di Tambah");
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                session()->flash('pesan', 'Terdapat data yang sama');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $datakk = keluargaModel::where('nokk', $id)->first();
        $datap = pendudukModels::where('nokk', $id)->get();
        $pesan = "";
        $title = 'keluarga';
        return view('admin.Kelolakeluarga.show', compact('datakk', 'datap', 'pesan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $keluargaModel = keluargaModel::where('nokk', $id)->first();
        $title = 'keluarga';
        return view('admin.Kelolakeluarga.edit', compact('keluargaModel', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keluargaModel $keluargaModel)
    {
        $request->validate([
            'nokk' => 'required',
            'kepalakeluarga' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        $data  = [
            'kepalakeluarga' => $request->kepalakeluarga,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa' => $request->desa,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
        ];

        $syarat = [
            'nokk' => $request->nokk,
        ];

        $title = 'keluarga';

        keluargaModel::where('nokk', $syarat)->update($data);
        return redirect('/kelolaKeluarga', compact('title'))->with('pesan', 'Data KK Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            keluargaModel::where('nokk', $id)->delete();
            return redirect('/kelolaKeluarga')->with('pesan', 'Data Keluarga Berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return redirect('/kelolaKeluarga')->with('pesan', 'Hapus Data Anggota terlebih dahulu');
            }
        }
    }
}
