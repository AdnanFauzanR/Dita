<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peternakan extends Model
{
    use HasFactory;

    protected $table = 'peternakan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'kecamatan', 'komoditi', 'total', 'kelahiran', 'kematian', 'pemotongan', 'ternak_masuk', 'ternak_keluar', 'populasi'];
}
