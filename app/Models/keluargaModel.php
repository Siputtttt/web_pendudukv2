<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class keluargaModel extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    protected $fillable = ['nokk', 'kepalakeluarga', 'alamat', 'rt', 'rw', 'desa', 'kecamatan', 'kabupaten', 'provinsi'];
    public $primaryKey = "nokk";
}
