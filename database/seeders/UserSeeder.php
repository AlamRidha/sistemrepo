<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        User::create([
            'name' => 'Administrator',
            'level' => 1,
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Mahasiswa',
            'level' => 2,
            'email' => 'andi@gmail.com',
            'username' => 'andi',
            'password' => bcrypt('12345678'),
        ])->assignRole('mahasiswa');

        for ($i = 0; $i < 20; $i++) {
            $name = $faker->name;
            $username = strtolower(str_replace(' ', '', $name)) . $i;
            $email = strtolower(str_replace(' ', '', $name)) . $i . '@gmail.com';

            User::create([
                'name' => $name,
                'level' => 2,
                'email' => $email,
                'username' => $username,
                'password' => bcrypt('password123'),
            ])->assignRole('mahasiswa');
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ])->assignRole('admin');

        // // \App\Models\User::factory()->create([
        // //     'name' => 'User',
        // //     'email' => 'testuser@gmail.com',
        // //     'password' => bcrypt('p$ssw#rd'),
        // // ])->assignRole('user');

        // \App\Models\User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'tes@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ])->assignRole('mahasiswa');
    }
}
