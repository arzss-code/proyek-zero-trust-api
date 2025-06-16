<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Zero Trust')</title>

    {{-- Memanggil CSS yang sudah di-compile oleh Vite --}}
    @vite('resources/css/app.css')
</head>
<body class="h-full font-sans antialiased">

    {{-- Konten utama dari setiap halaman akan dimuat di sini --}}
    @yield('content')

</body>
</html>
