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

        // Buat user kosong jika tidak ada
        $user = new UserModel();

        $data = [
            'kelas' => $kelas,
            'user' => $user,
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
            $fotoPath = $foto->storeAs('uploads', $fotoName);
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

        return redirect()->to('/')->with('success', 'User berhasil ditambahkan');
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

    public function edit ($id)
    {
        $user = UserModel::findorFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user','kelas','title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->storeAs('uploads', $fotoName); // Pindahkan file
            $user->foto = $fotoName; // Simpan nama file ke database
        }

        $user->save();

        return redirect()->to('/')->with('success', 'User berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete(); // Memanggil fungsi delete
    
        return redirect()->route('user.list')->with('success', 'User has been deleted successfully');
    }
    
}
