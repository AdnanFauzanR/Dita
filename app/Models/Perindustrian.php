<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perindustrian extends Model
{
    use HasFactory;

    protected $table = 'perindustrian';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'kecamatan', 'komoditi', 'potensi_kandungan'];
}
