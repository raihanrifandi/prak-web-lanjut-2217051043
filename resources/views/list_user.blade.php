@extends('layouts.app')
@section('title', 'List User')
@push('styles')
<style>
.btn-success {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-success:hover {
    background-color: #218838;
}

/* Container */
.mb-3.mt-2.m-3 {
    margin: 20px 15px;
}

/* Styling tabel */
.table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f8f9fa;
    font-weight: bold;
    color: #333;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Divider styling */
.table-group-divider {
    border-top: 2px solid #e9ecef;
}
</style>
@endpush

@section ('content')
<div class="mb-3 mt-2 m-3">
    <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">NPM</th>
            <th scope="col">Kelas</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php
      foreach ($users as $user) {
      ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama'] ?></td>
            <td><?= $user['npm'] ?></td>
            <td><?= $user['nama_kelas'] ?></td>
            <td>
                <a href="{{ route('user.show', $user['id']) }}" class="inline-block text-blue-500 hover:text-blue-700 transition">
                    <i class="fas fa-eye"></i>
                </a>
            
                <a href="{{ route('user.edit', $user['id']) }}" class="text-green-500 hover:text-green-700 mx-3 transition">
                    <i class="fas fa-edit"></i>
                </a>
            
                <form action="{{ route('user.destroy', $user['id']) }}" method="POST" id="deleteForm-{{ $user['id'] }}" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="text-red-500 hover:text-red-700 deleteButton transition">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
            
        </tr>
        <?php
      }
      ?>
    </tbody>
</table>
@endsection