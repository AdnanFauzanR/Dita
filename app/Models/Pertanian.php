<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanian extends Model
{
    use HasFactory;

    protected $table = 'pertanian';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'kecamatan', 'bidang', 'komoditi', 'luas_lahan', 'produksi', 'produktivitas'];
}
