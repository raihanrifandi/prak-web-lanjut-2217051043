<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;


class UserController extends Controller
{
    // public function profile($nama ="", $kelas="", $npm="")
    // {
    //     $data = [
    //         'nama' => $nama,
    //         'kelas' => $kelas,
    //         'npm' => $npm,
    //     ];
    //     return view('profile', $data);
    // }

    public function create(){
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'npm' => 'required|string|max:255|unique:user,npm',
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'npm.required' => 'NPM wajib diisi.',
            'npm.unique' => 'NPM ini sudah terdaftar. Silahkan Gunakan NPM lain.',
            'kelas_id.required' => 'Kelas wajib dipilih.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
        ]);

           $user = UserModel::create($validatedData);
           
           $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);

    }
}
