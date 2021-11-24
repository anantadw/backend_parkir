@extends('layouts.master')

@section('content')
<div class="font-bold text-3xl">Data Juru Parkir</div>

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
                Nomor Anggota
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Nomor KTP
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Alamat
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Terakhir Login
              </th>
              <th scope="col" class="px-6 py-3 text-xs font-bold text-base text-gray-700 uppercase">
                Imei Device
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 text-center">
              @foreach ($parkers as $parker)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $parker->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $parker->member_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $parker->ktp_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $parker->address }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $parker->log->time->locale('id')->Format('d-M-Y H:m:s') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $parker->log->device->imei }}
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