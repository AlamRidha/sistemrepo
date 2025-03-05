<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'jk',
        'no_hp',
        'username',
        'password',
    ];
}
