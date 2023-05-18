<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perikanan extends Model
{
    use HasFactory;

    protected $table = 'perikanan';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['user_id', 'kecamatan', 'komoditi', 'volume', 'nilai_produksi'];
}
