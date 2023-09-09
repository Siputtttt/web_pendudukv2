<?php

namespace App\Http\Controllers;

use App\Models\keluargaModel;
use App\Models\pendudukModels;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $penduduk = pendudukModels::get();
        $data = pendudukModels::all()->sortBy('jeniskelamin');
        $data2 = keluargaModel::get();
        $lk = 0;
        $pr = 0;

        $kl = 0;
        $pdd = 0;
        foreach ($data as $item) {
            if ($item->jeniskelamin == "Laki-Laki") {
                $lk++;
            } elseif ($item->jeniskelamin == "Perempuan") {
                $pr++;
            }
        }
        foreach ($data2 as $item) {
            $kl++;
        }
        foreach ($penduduk as $item) {
            $pdd++;
        }

        $title = 'dashboard';
        return view('admin.dashboard', compact('lk', 'pr', 'kl', 'pdd', 'title'))->with('data', $data);
    }
}
