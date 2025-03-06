<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;
    protected $table = 'skripsis';
    protected $primaryKey = 'id_skripsi';
    protected $fillable = [
        'Judul',
        'Penulis',
        'Prodi',
        'tahun_terbit',
        'Abstrak',
        'File',
    ];
}
