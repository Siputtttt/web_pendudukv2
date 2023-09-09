<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendudukModels extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    protected $fillable = [
        'nik',
        'nokk',
        'namalengkap',
        'notel',
        'jeniskelamin',
        'tempatlahir',
        'tanggallahir',
        'agama',
        'pendidikan',
        'jenispekerjaan',
        'golongandarah',
        'statusperkawinan',
        'statushubungan',
        'kewarganegaraan',
        'ayah',
        'ibu',
        'foto'
    ];
}
