<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 30; $i++) {
            DB::table('mahasiswa')->insert([
                'nim' => $faker->unique()->numerify('10########'),
                'nama' => $faker->name,
                'prodi' => $faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Manajemen Informatika']),
                'jk' => $faker->randomElement(['L', 'P']),
                'no_hp' => $faker->phoneNumber,
                'username' => $faker->unique()->userName,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
