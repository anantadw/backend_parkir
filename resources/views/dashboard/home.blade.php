@extends('layouts.master')

@section('content')
<div class="font-bold text-3xl">Data Transaksi</div>
<x-tinjauan title1="penghasilan hari ini" number1="1.500.000" title2="penghasilan bulan ini" number2="112.500.000" title3="transaksi dilakukan" number3="25.000" />

<form action="{{ route('dashboard') }}" method="GET" class="flex align-middle my-10">
  <div class="mr-10">
    <label for="year" class="block mb-2 text-lg font-bold text-gray-900 dark:text-gray-400">Pilih Tahun</label>
    <select onchange="this.form.submit()" id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="2022">2022</option>
    </select>
  </div>
  <div class="mr-10">
    <label for="month" class="block mb-2 text-lg font-bold text-gray-900 dark:text-gray-400">Pilih Bulan</label>
    <select onchange="this.form.submit()" id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="1">Januari</option>
      <option value="2">Februari</option>
      <option value="3">Maret</option>
      <option value="4">April</option>
      <option value="5">Mei</option>
      <option value="6">Juni</option>
      <option value="7">Juli</option>
      <option value="8">Agustus</option>
      <option value="9">September</option>
      <option value="10">Oktober</option>
      <option value="11">November</option>
      <option value="12">Desember</option>
    </select>
  </div>
  <a href="{{ route('export') }}" class="bg-hijau px-5 py-2 rounded-full text-white hover:bg-hijau-tua">Cetak Excel</a>
</form>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-9">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 border">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-4 py-3 text-gray-700">
                No
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Juru Parkir
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Kendaraan
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Plat Nomor
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Waktu Masuk
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Waktu Keluar
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Lama Waktu
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-gray-700">
                Total Harga
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 text-center">
            @foreach ($transactions as $transaction)
            <tr class="hover:bg-gray-100">
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $transactions->firstItem() + $loop->index }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $transaction->parker->name }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $transaction->vehicle->name }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $transaction->license_plate }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $transaction->in_time->translatedFormat('d F Y, H:i') }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ ($transaction->out_time == null) ? '--' : $transaction->out_time->translatedFormat('d F Y, H:i')}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ ($transaction->out_time == null) ? '--' : $transaction->out_time->diffInMinutes($transaction->in_time) . " menit"}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-3 inline-flex text-xs leading-5 font-semibold rounded-full {{ ($transaction->status == 'in') ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                  {{ ($transaction->status == 'in') ? 'Masuk' : 'Keluar' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ ($transaction->total_price == null) ? '--' : 'Rp' . number_format($transaction->total_price, 0, ',', '.') }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $transactions->links() }}
      </div>
    </div>
  </div>
</div>
@endsection