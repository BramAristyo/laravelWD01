<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PasienController extends Controller
{

    protected $userID = 3;

    public function __construct()
    {
        $this->userID = 3;
    }

    public function index()
    {
        $pasien = User::where('id', $this->userID)->first();
        $namaPasien = $pasien->nama;
        $totalPeriksa =  Periksa::where('id_pasien', $this->userID)->count();
        return view('pasien.dashboard', compact('namaPasien', 'totalPeriksa'));
    }

    public function showPeriksa()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('pasien.periksa', compact('dokters'));
    }

    public function periksa(Request $request)
{

    $request->validate([
        'id_dokter' => 'required',
        'tgl_periksa' => 'required|date',
    ]);

    $periksa = Periksa::create([
        'id_pasien' => $this->userID,
        'id_dokter' => $request->id_dokter,
        'tgl_periksa' => $request->tgl_periksa,
    ]);

    return redirect()->route('pasien.periksa');
}


    public function riwayat()
    {
        $riwayats = Periksa::where('id_pasien', $this->userID)->get();
        return view('pasien.riwayat', compact('riwayats'));
    }
}
