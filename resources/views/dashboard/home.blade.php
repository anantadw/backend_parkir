@extends('layouts.master')

@section('content')
<div class="font-bold text-3xl">Data Transaksi</div>
<x-tinjauan title1="penghasilan hari ini" number1="1.500.000" title2="penghasilan bulan ini" number2="112.500.000" title3="transaksi dilakukan" number3="25.000" />

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
                {{ $transaction->device->log->parker->name }}
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

@push('script')

@endpush