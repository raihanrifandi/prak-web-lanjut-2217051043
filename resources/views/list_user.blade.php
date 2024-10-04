@extends('layouts.app')
@section('title', 'List User')

@section('content')
<div class="mt-6 mb-4 mx-4">
    <a href="{{ route('user.create') }}" class="bg-green-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out shadow-md">
        Tambah User
    </a>
</div>
<div class="overflow-x-auto mx-4">
    <table class="min-w-full border border-gray-200 shadow-lg rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-200">
                <th scope="col" class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">NPM</th>
                <th scope="col" class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Kelas</th>
                <th scope="col" class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50 transition duration-150">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user['id'] }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user['nama'] }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user['npm'] }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $user['nama_kelas'] }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                    <!-- Placeholder icons -->
                    <span class="text-blue-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828zM5 12.999H4a1 1 0 00-1 1v3.5a.5.5 0 00.5.5h3.5a1 1 0 001-1v-1H6a1 1 0 01-1-1v-.999z" />
                        </svg>
                    </span>
                    <span class="text-red-600 cursor-pointer ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.707 4H13.293a1 1 0 01.96.737l1.708 6.828A4 4 0 0112 16.827V18h-4v-1.173a4 4 0 01-3.961-4.262l1.708-6.828A1 1 0 016.707 4zm4.586 12a2 2 0 002-2H9.121a2 2 0 002 2z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
