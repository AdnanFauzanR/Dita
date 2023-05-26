<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $tableName = 'kecamatan';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kecamatan'];
}
