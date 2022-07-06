<section class="pt-1.5">
    <h1 class="opacity-50">Tinjauan</h1>
    <div class="flex space-x-4">
        @for($i = 0; $i < 3; $i++)
        <div class="shadow-lg pl-4 pt-3 pr-10 pb-6 rounded-lg min-w-64">
            <header class="opacity-50">{{ $titles[$i] }}</header>
            <div class="font-bold" style="font-size: 2rem;">{{ $numbers[$i] }}</div>
        </div>
        @endfor
    </div>
</section>