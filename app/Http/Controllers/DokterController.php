<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DokterController extends Controller
{
    protected $userIDDokter = 1;

    public function __construct()
    {
        $this->userID = 1;
    }

    public function showObat()
    {
        $obats = Obat::all();

        return view('dokter.obat', compact('obats'));
    }

    public function storeObat(Request $request){

            $validatedData = $request->validate([
                'nama_obat' => 'required|string|max:255',
                'kemasan' => 'required|string|max:255',
                'harga' => ['required'],
            ]);

            Obat::create([
                'nama_obat' => $validatedData['nama_obat'],
                'kemasan' => $validatedData['kemasan'],
                'harga' => $validatedData['harga'],
            ]);

            return redirect()->route('dokter.obat');
    }

        public function updateObat(Request $request, $id){

            $validatedData = $request->validate([
                'nama_obat' => 'required|string|max:255',
                'kemasan' => 'required|string|max:255',
                'harga' => ['required'],
            ]);

            $obat = Obat::findOrFail($id);

            $obat->update([
                'nama_obat' => $validatedData['nama_obat'],
                'kemasan' => $validatedData['kemasan'],
                'harga' => $validatedData['harga'],
            ]);

            return redirect()->route('dokter.obat');

        }

        public function destroyObat($id){

            $obat = Obat::findOrFail($id);
            $obat->delete();

            return redirect()->route('dokter.obat');
        }

        public function editObat($id)
        {
            $obat = Obat::findOrFail($id);
            return view('dokter.obatEdit', compact('obat'));
        }
}
