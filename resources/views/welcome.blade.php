<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-200">
    <div class="w-full max-w-md mx-auto flex flex-col bg-white shadow-lg p-6 rounded-lg gap-4">
        <div class="flex flex-col justify-center items-center gap-2">
            <h1 class="text-xl font-semibold text-gray-800">Aplikasi Manajemen Laporan PKL</h1>
            <img src="{{ asset('logo-stembayo.png') }}" alt="Logo" class="w-32 h-32">
        </div>
      <div class="flex flex-col gap-1 items-center justify-center">
        <h1 class="text-2xl font-semibold text-gray-800">Selamat datang</h1>
        <p class="text-gray-500 text-sm">Silahkan login menggunakan tombol di bawah ini</p>
      </div>

      <div class="grid md:grid-cols-2 gap-3">
        <a href="{{ route('login') }}" class="bg-blue-500 px-4 py-2 rounded text-white hover:bg-blue-600 transition duration-200 text-center">Login</a>
        <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-200 text-center">Register</a>
      </div>

      {{-- ini footer --}}
      <footer class="text-center text-gray-400 text-xs mt-6">
        <p>© 2025 Your Company. All rights reserved.</p>
      </footer>
    </div>
</body>
</html>
