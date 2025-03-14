<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCampus extends Model
{
    use HasFactory;

    protected $table = 'profilecampus';

    protected $fillable = [
        'visi',
        'misi',
        'sejarah',
        'kontak'
    ];
}
