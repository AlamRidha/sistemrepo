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
            'visi' => 'Menjadi Perguruan Tinggi Unggulan Dalam Bidang Ekonomi Yang Menghasilkan Lulusan Berorientasi Wirausaha Didukung Oleh Penguasaan Teknologi Informasi Pada Tahun 2036.',
            'misi' => '1. Menyelenggarakan pendidikan berkelanjutan untuk menumbuhkan pola pikir dan karakter wirausaha serta penguasaan teknologi informasi.
                        2. Melakukan penelitian yang fokus pada penyelesaian permasalahan kewirausahaan dan ekonomi masyarakat.
                        3. Menyelenggarakan pengabdian kepada masyarakat sebagai bentuk pelayanan berkesinambungan.
                        4. Meningkatkan kualitas tata kelola perguruan tinggi untuk mencapai good governance.
                        5. Meningkatkan hubungan kemitraan untuk pengembangan keilmuan dan peningkatan peluang wirausaha.',
            'sejarah' => 'Institut Teknologi dan Bisnis (ITB) Master, sebelumnya dikenal sebagai Sekolah Tinggi Ilmu Ekonomi (STIE) Prakarti Mulya, merupakan perguruan tinggi swasta yang didirikan berdasarkan Keputusan Menteri Pendidikan Nasional Republik Indonesia Nomor 114/D/O/2006, tanggal 6 Juli 2006. Pada tahun 2020, STIE Prakarti Mulya mengalami transformasi menjadi Institut Teknologi dan Bisnis Master sesuai dengan Keputusan Menteri Pendidikan dan Kebudayaan Nomor 1211/M/2020. Perubahan ini mencerminkan komitmen institusi untuk mengembangkan pendidikan yang lebih komprehensif, mencakup bidang teknologi dan bisnis, guna memenuhi kebutuhan dunia kerja yang terus berkembang. Sejak transformasi tersebut, ITB Master telah menambah program studi baru, termasuk Sistem Informasi, untuk memberikan lebih banyak pilihan kepada calon mahasiswa.',
            'kontak' => 6222222
        ]);
    }
}
