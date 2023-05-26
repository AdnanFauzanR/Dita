<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditi extends Model
{
    use HasFactory;

    protected $table = 'komoditi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'user_id', 'sektor' ,'nama', 'bidang', 'kecamatan'];
}
