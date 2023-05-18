<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenKomoditi extends Model
{
    use HasFactory;

    protected $table = 'konten_komoditi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'user_id', 'judul', 'sektor', 'gambar', 'isi'];
}
