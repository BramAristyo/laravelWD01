<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        $existingUser = User::where('email', $validatedData['email'])->first();
        if ($existingUser) {
            return redirect()->back()->withInput();
        }

        $user = User::create([
            'nama' => $validatedData['nama'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'pasien',
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request){
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'dokter') {
                return redirect()->route('dokter.dashboard');
            } elseif ($user->role === 'pasien') {
                return redirect()->route('pasien.dashboard');
            } else {
                return redirect()->route('');
            }
        }

        return redirect()->back()->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
