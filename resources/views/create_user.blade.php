<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="minimalist-card">
        <img src="{{ asset('assets/images/user.png') }}" alt="" class="mx-auto w-12 h-12 mb-4">
        <h1>Create an Account</h1>
        <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="floating-placeholder-group">
                <input type="text" name="nama" id="nama" placeholder=" " required>
                <label for="nama">Nama</label>
            </div>
            <div class="floating-placeholder-group">
                <input type="text" name="npm" id="npm" placeholder=" " required>
                <label for="npm">NPM</label>
            </div>
            <div class="floating-placeholder-group">
                <input type="text" name="kelas" id="kelas" placeholder=" " required>
                <label for="kelas">Kelas</label>
            </div>
            <br><br>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

</body>
</html>
