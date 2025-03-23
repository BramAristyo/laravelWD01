<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'dr. Bram',
                'alamat' => 'Semarang',
                'no_hp' => '081234567891',
                'email' => 'andi.dokter@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'dr. Farhan',
                'alamat' => 'Semarang',
                'no_hp' => '089876543210',
                'email' => 'siti.dokter@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Iqbal',
                'alamat' => 'Semarang',
                'no_hp' => '081234567690',
                'email' => 'budi.pasien@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pasien',
            ],
            [
                'nama' => 'Isna',
                'alamat' => 'Semarang',
                'no_hp' => '081234567790',
                'email' => 'isna.pasien@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pasien',
            ]
        ]);
    }
}
