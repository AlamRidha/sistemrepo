<?php

namespace Database\Seeders;

use App\Models\ProfileCampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileCampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProfileCampus::updateOrCreate([], [
            'visi_misi' => 'Menjadikan perpustakaan sebagai pusat informasi dan pembelajaran.',
            'sejarah' => 'Perpustakaan ini didirikan pada tahun 2000 untuk mendukung pendidikan.',
            'kontak' => 6222222
        ]);
    }
}
