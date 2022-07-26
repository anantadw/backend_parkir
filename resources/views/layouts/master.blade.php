<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Dashboard</title>
</head>

<body>
    <div class="grid grid-cols-12">
        {{-- sidebar --}}
        <aside class="col-span-2 bg-hijau-tua text-cream h-screen px-8 py-12 relative">
            <header class="text-2xl font-bold">
                E-Parkir
                <div class="text-sm font-light leading-tight">Dinas Perhubungan Kota Bandung</div>
                <hr class="-mx-3 mt-12">
            </header>
            <section class="space-y-6 pt-6">
                <a href="{{ route('dashboard') }}" class="{{ (Route::is('dashboard') ? 'border-l-2 -ml-8 pl-8' : 'opacity-50') }} hover:opacity-100 flex space-x-4 py-0.5">
                    <div class="h-6 w-6 grid justify-items-center">
                        @include('icons.dollar')
                    </div>
                    <span>Transaksi</span>
                </a>
                <a href="{{ route('parker') }}" class="{{ (Route::is('parker') ? 'border-l-2 -ml-8 pl-8' : 'opacity-80') }} hover:opacity-100 flex space-x-4 py-0.5">
                    <div class="h-6 w-6 grid justify-items-center">
                        @include('icons.people')
                    </div>
                    <span>Petugas</span>
                </a>
                <a href="{{ route('report') }}" class="{{ (Route::is('report') ? 'border-l-2 -ml-8 pl-8' : 'opacity-80') }} hover:opacity-100 flex space-x-4 py-0.5">
                    <div class="h-6 w-6 grid justify-items-center">
                        @include('icons.note')
                    </div>
                    <span>Laporan</span>
                </a>
            </section>
            <div class="text-center absolute bottom-12 w-full left-0">
                <span id="clock"></span>
                <div id="date" class="font-light mt-1"></div>
            </div>
        </aside>

        <div class="col-span-10 overflow-y-auto h-screen bg-gray-50">
            {{-- content --}}
            <div class="p-10">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('script')
    <script>
        var span = document.getElementById('clock');
        var datetext = document.getElementById('date');

        function time() {
            var d = new Date();
            var m = d.getMinutes();
            var h = d.getHours();
            var day = d.toLocaleDateString("id", {
                weekday: "long"
            });
            var date = d.getDate();
            var month = d.toLocaleString("id", {
                month: "short"
            });
            var year = d.getFullYear();
            span.textContent =
                ("0" + h).substr(-2) + "." + ("0" + m).substr(-2);
            datetext.innerText = day + ", " + date + " " + month + " " + year;
        }
        time();
        setInterval(time, 60000);
    </script>
</body>

</html>