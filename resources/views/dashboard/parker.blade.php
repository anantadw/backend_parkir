@extends('layouts.master')

@section('content')
<div class="font-bold text-3xl">parkers</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-9">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nomor Device
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama Juru Parkir
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Kendaraan
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nomor Plat
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Waktu Masuk
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Waktu Keluar
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Biaya
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($transactions as $transaction)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $transaction->device->imei }}
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
                        {{ $transaction->in_time }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $transaction->out_time }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 inline-flex text-xs leading-5 font-semibold rounded-full {{ ($transaction->status == 'in') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ($transaction->status == 'in') ? 'Masuk' : 'Keluar' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $transaction->total_price }}
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