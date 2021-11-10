@extends('layouts.master')

@section('content')
<div class="font-bold text-3xl">Data Transaksi</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-9">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 border">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                No
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Nama Juru Parkir
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Kendaraan
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Nomor Plat
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Hari/Tanggal
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Waktu Masuk
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Waktu Keluar
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Total Harga
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 text-center">
              @foreach ($transactions as $transaction)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $loop->iteration }}
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
                        {{ $transaction->created_at->locale('id')->isoFormat('ddd, DD-MM-YYYY') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $transaction->in_time->format('H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ ($transaction->out_time == null) ? '--' : $transaction->out_time->format('H:i')}}
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
      </div>
    </div>
  </div>
</div>

@endsection

@push('script')

@endpush