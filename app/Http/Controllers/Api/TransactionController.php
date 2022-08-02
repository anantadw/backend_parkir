<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($parker_id, $vehicle_id)
    {
        return response()->json([
            'status' => true,
            'data' => Transaction::where(['parker_id' => $parker_id, 'vehicle_id' => $vehicle_id, 'status' => 'in'])->latest()->get(['id', 'license_plate'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'parker_id' => 'required',
            'vehicle_id' => 'required',
            'license_plate' => 'required',
        ]);

        $check_transaction = Transaction::where(['license_plate' => $request->license_plate, 'status' => 'in', 'vehicle_id' => $request->vehicle_id])->first();
        if ($check_transaction) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Plat nomor sudah terdaftar.'
            ], 422);
        }

        $transaction = new Transaction();
        $transaction->parker_id = $request->parker_id;
        $transaction->vehicle_id = $request->vehicle_id;
        $transaction->license_plate = $request->license_plate;
        $transaction->in_time = Carbon::now();
        $transaction->status = 'in';
        if ($transaction->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil. Data disimpan.'
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal. Data tidak disimpan.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return response()->json([
            'status' => true,
            'id' => $transaction->id,
            'location' => $transaction->parker->street->name,
            'vehicle_name' => $transaction->vehicle->name,
            'vehicle_price' => $transaction->vehicle->price,
            'license_plate' => $transaction->license_plate,
            'in_time' => $transaction->in_time->timestamp,
            'out_time' => Carbon::now()->timestamp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'total_price' => 'required'
        ]);

        $transaction->out_time = Carbon::now();
        $transaction->total_price = $request->total_price;
        $transaction->status = 'out';
        if ($transaction->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Success. Data updated.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed. Data not updated.'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
