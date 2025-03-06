<?php

namespace Database\Seeders;

use App\Models\Skripsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Skripsi::create([
            'Judul' => 'Skripsi 1',
            'Penulis' => 'Penulis 1',
            'Prodi' => 'Prodi 1',
            'tahun_terbit' => '2023',
            'Abstrak' => 'Abstrak Skripsi 1',
            'File' => 'uploads/1678886400_skripsi1.pdf',
        ]);
    }
}
