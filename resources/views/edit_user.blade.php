@extends('layouts.app')
@section('title', 'Edit Account')

@push('styles')
<style>
    body {
        background-image: url('../../assets/images/css.png');
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat;  
        background-color: #f8f8f8;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .minimalist-card {
        background-color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        padding: 24px;
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }

    .minimalist-card h1 {
        font-size: 24px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 24px;
        color: #333;
    }

    .floating-placeholder-group {
        position: relative;
        margin-bottom: 24px;
    }

    .floating-placeholder-group input {
        background: transparent;
        border: 1px solid #aaa;
        width: 100%;
        padding: 12px;
        font-size: 16px;
        color: #333;
        border-radius: 4px;
        transition: border-color 0.3s ease, padding 0.3s ease;
        outline: none;
    }

    .floating-placeholder-group label {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        padding: 0 6px;
        background-color: #ffffff;
        color: #aaa;
        font-size: 16px;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .floating-placeholder-group input:focus + label,
    .floating-placeholder-group input:not(:placeholder-shown) + label {
        top: 0;
        left: 12px;
        transform: translateY(-50%);
        font-size: 12px;
        color: #333;
    }

    .floating-placeholder-group input:focus {
        border-color: #333;
    }

    .submit-button {
        background-color: #333;
        color: white;
        padding: 12px;
        border-radius: 4px;
        width: 100%;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-button:hover {
        background-color: #555;
    }
</style>
@endpush

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="minimalist-card">
        <img src="{{ asset('assets/images/user.png') }}" alt="" class="mx-auto w-12 h-12 mb-4">
        <h1>Edit Account</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nama -->
            @error('nama')
                <p class="text-red-500 mt-1 mb-2">{{ $message }}</p>
            @enderror
            <div class="floating-placeholder-group">
                <input type="text" name="nama" id="nama" placeholder=" " value="{{ old('nama', $user->nama) }}">
                <label for="nama">Nama</label>
            </div>

            <!-- NPM -->
            @error('npm')
                <p class="text-red-500 mt-1 mb-2">{{ $message }}</p>
            @enderror
            <div class="floating-placeholder-group">
                <input type="text" name="npm" id="npm" placeholder=" " value="{{ old('npm', $user->npm) }}">
                <label for="npm">NPM</label>
            </div>

            <!-- Kelas -->
            @error('kelas_id')
                <p class="text-red-500 mt-1 mb-2">{{ $message }}</p>
            @enderror
            <div>
                <select name="kelas_id" id="kelas_id" class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                    <option value="" disabled selected>-- Pilih Kelas --</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" 
                            {{ $user->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>                
            </div>

            <div>
                <label for="foto" class="block text-gray-700 text-lg font-semibold mb-2">Foto:</label>
                <input type="file" id="foto" name="foto" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-purple-300 focus:border-transparent transition duration-300 ease-in-out">
                @if ($user->foto)
                <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" class="w-32 h-32 mt-3 object-cover rounded-lg">
                @endif
                @foreach ($errors->get('foto') as $msg )
                    <p class="text-red-500">{{ $msg }}</p>
                @endforeach
            </div>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</div>
@endsection