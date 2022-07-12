@extends('layouts.master')

@section('content')
<div class="font-bold text-3xl">Laporan pendapatan parkir</div>
<div class="">Bulan {{$time->format('F')}} {{$time->format('Y')}}</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-9">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-gray-700">
                                Nama Juru Parkir
                            </th>
                            <th scope="col" class="px-6 py-3 text-gray-700">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3 text-gray-700">
                                Plat Nomor
                            </th>
                            <th scope="col" class="px-6 py-3 text-gray-700">
                                Rupiah
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @foreach ($transactions as $transaction)
                        <tr class="hover:bg-gray-100 text-center">
                            <td class="py-4 whitespace-nowrap">
                                {{ $transaction->parker->name }}
                            </td>
                            <td class="py-4 whitespace-nowrap">
                                {{ $transaction->parker->street->name }}
                            </td>
                            <td class="py-4 whitespace-nowrap">
                                {{ $transaction->license_plate }}
                            </td>
                            <td class="py-4 whitespace-nowrap">
                                {{ $transaction->total_price }}
                            </td>
                        </tr>
                        @endforeach
                        <tr class="bg-gray-300">
                            <td></td>
                            <td></td>
                            <td class="font-bold">Grand Total</td>
                            <td>{{$total}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush