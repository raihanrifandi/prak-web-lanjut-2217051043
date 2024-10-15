<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'npm' => 'required|string|max:255|unique:user,npm',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'npm.required' => 'NPM wajib diisi.',
            'npm.unique' => 'NPM ini sudah terdaftar. Silahkan gunakan NPM lain.',
            'kelas_id.required' => 'Kelas wajib dipilih.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
        ]);

        // Cek jika ada file yang diupload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->move(public_path('assets/upload/img'), $fotoName);
        } else {
            $fotoPath = null; // Jika tidak ada foto yang diupload
        }

        // Simpan data user ke database
        $this->userModel->create([
            'nama' => $validatedData['nama'],
            'npm' => $validatedData['npm'],
            'kelas_id' => $validatedData['kelas_id'],
            'foto' => $fotoPath ? $fotoName : null, // Simpan nama file jika ada
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }
}
