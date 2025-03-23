<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Periksa;
use Illuminate\Database\Seeder;

class PeriksaSeeder extends Seeder
{
    public function run(): void
    {
        // sudah tidak terpakai karena code ini hanya untuk simulasi Relasi pada Pert.2
        Periksa::create([
            'id_pasien' => 3,
            'id_dokter' => 1,
            'tgl_periksa' => Carbon::now(),
            'catatan' => 'Pasien mengalami demam tinggi dan batuk.',
            'biaya_periksa' => 150000
        ]);

        Periksa::create([
            'id_pasien' => 3,
            'id_dokter' => 2,
            'tgl_periksa' => Carbon::now()->addDays(3),
            'catatan' => 'Pasien mengalami sakit kepala dan pusing.',
            'biaya_periksa' => 200000
        ]);
    }
}
