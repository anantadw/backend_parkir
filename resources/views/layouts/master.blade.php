<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Dashboard</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>  
    <div class="flex">
        {{-- sidebar --}}
        <div class="w-80 bg-gray-300 h-screen sticky top-0">
            <div class="p-4 text-hijau-tua text-2xl font-bold text-center">E-Parkir</div>
            <a href="{{ route('home') }}">
                <div class="text-xl w-full p-4 {{ (Route::is('home') ? 'bg-hijau text-cream' : 'text-black') }} hover:bg-hijau font-semibold">Data Transaksi</div>
            </a>
            <a href="{{ route('parker') }}">
                <div class="text-xl w-full p-4 {{ (Route::is('parker') ? 'bg-hijau text-cream' : 'text-black') }} hover:bg-hijau font-semibold">Data Juru Parkir</div>
            </a>
        </div>

        <div class="w-screen">
            {{-- navbar --}}
            <div class="h-16 bg-hijau-tua flex justify-center items-center px-8 text-cream sticky top-0 w-full">
                <div class="text-white text-2xl font-semibold">
                    Dinas Perhubungan Kota Bandung
                </div>
                {{-- <div class="space-x-12 self-center"> 
                    <a href="#">home</a>
                    <a href="#">home</a>
                    <a href="#">home</a>
                </div> --}}
            </div>

            {{-- content --}}
            <div class="p-10">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('script')
</body>
</html>