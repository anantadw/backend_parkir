<section class="pt-1.5">
    <h1 class="mt-5 mb-2">Tinjauan</h1>
    <div class="flex space-x-4">
        @for($i = 0; $i < 2; $i++)
        <div class="shadow-lg pl-4 pt-3 pr-10 pb-6 rounded-lg min-w-64">
            <header class="opacity-80">{{ $titles[$i] }}</header>
            <div class="font-bold" style="font-size: 2rem;">@if ($types[$i] == 1){{ 'Rp' }}@endif{{ number_format($numbers[$i], 0, ',', '.') }}</div>
        </div>
        @endfor
    </div>
</section>