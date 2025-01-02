<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jurusan_id' => ['required', 'exists:jurusans,id'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nomor_telepon'=> ['required', 'string', 'max:255'],
            'tanggal_lahir'=> ['required', 'date'],
            'jenis_kelamin'=> ['required', 'in:laki - laki,perempuan'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'alamat'=> ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'jurusan_id' => $request->jurusan_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_telepon' => $request->nomor_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
        ]);

        event(new Registered($user));

        $pendaftaran = \App\Models\Pendaftaran::create([
            'user_id' => $user->id,
            'jurusan_id' => $request->jurusan_id,
            'tanggal_pendaftaran' => now(),
            'status_pendaftaran' => 'dalam proses',
        ]);

        Auth::login($user);
        $user['token'] = $request->user()->createToken('auth')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'sign up success',
            'data' =>[
                $user,
                $pendaftaran  
            ]
        ]);
    }
}
