<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="flex items-center justify-center min-h-screen">
<div>
    <img src="{{ asset('assets/images/light.png') }}" alt="Light Effect" class="light-effect">
    <div class="glass w-80 h-128 p-6 rounded-xl shadow-lg flex flex-col items-center">
        <div class="w-32 h-32 rounded-full bg-gray-300 mb-6 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('assets/images/profile.jpg') }}" alt="Profile Image" class="w-full h-full object-cover">
        </div>
        <br>

         <!-- Spotify listening card -->
         <div class="spotify-card w-full">
            <img src="{{ asset('assets/images/fein.jpg') }}" alt="Song Cover" class="w-12 h-12">
            <div class="spotify-song-info">
                <div class="song">FE!N (feat. Playboi Carti)</div>
                <div class="artist">Travis Scott, Playboi Carti</div>
            </div>
        </div>
        <br>
        <div class="w-full space-y-4">
            <div class="glass bg-gray-200 bg-opacity-5 text-center py-2 font-bold rounded-md">
                <span class="gradient-text">{{ $nama }}</span>
            </div>
            <div class="glass bg-gray-200 bg-opacity-5 text-center py-2 font-bold rounded-md">
                <span class="gradient-text">{{ $npm }}</span>
            </div>
            <div class="glass bg-gray-200 bg-opacity-5 text-center py-2 font-bold rounded-md">
                <span class="gradient-text">{{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
