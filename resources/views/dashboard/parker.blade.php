@extends('layouts.master')

@section('content')
<span class="font-bold text-3xl">Data Juru Parkir</span>
<x-tinjauan title1="sedang aktif" number1="250" title2="tukang parkir terdaftar" number2="1.500" title3="titik penyebaran" number3="25" />

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-9">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="divide-y divide-gray-200 border min-w-full">
          <thead class="bg-gray-50 font-bold text-base text-gray-700 uppercase">
            <tr class="">
              <th scope="col" class="py-3 px-2">
                No
              </th>
              <th scope="col" class="py-3 px-2">
                Nomor anggota
              </th>
              <th scope="col" class="py-3 px-2">
                Nama Juru Parkir
              </th>
              <th scope="col" class="py-3 px-2">
                Terakhir Login
              </th>
              <th scope="col" class="py-3 px-2">
                Nama Jalan
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200 ">
            @foreach ($parkers as $parker)
            <tr class="hover:bg-gray-100 text-center">
              <td class="py-4 whitespace-nowrap">
                {{ $parkers->firstItem() + $loop->index }}
              </td>
              <td class="py-4 whitespace-nowrap">
                {{ $parker->member_number }}
              </td>
              <td class="py-4 whitespace-nowrap">
                {{ $parker->name }}
              </td>
              @if($parker->log)
              <td class="py-4 whitespace-nowrap">
                {{ $parker->log->time->translatedFormat('d F Y, H:i') }}
              </td>
              <td class="py-4 whitespace-nowrap">
                {{ $parker->street->name }}
              </td>
              @else
              <td></td>
              <td></td>
              @endif
              <td class="py-4 whitespace-nowrap">
                <a href="{{ route('home') }}" class="text-sm underline text-hijau-tua hover:text-hijau transition">
                  details
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $parkers->links() }}
      </div>
    </div>
  </div>
</div>

@endsection

@push('script')

@endpush