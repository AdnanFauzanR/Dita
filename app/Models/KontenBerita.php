<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenBerita extends Model
{
    use HasFactory;

    protected $table = 'konten_berita';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'user_id', 'judul', 'sektor', 'kecamatan','gambar', 'isi'];
}
