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
    public function index()
    {
        // return response()->json([
        //     'data' => Transaction::all()
        // ]);
    }

    /**
     * Display a listing of the resource, vehicle = car and status = in.
     *
     * @return \Illuminate\Http\Response
     */
    public function cars()
    {
        return response()->json([
            'data' => Transaction::where(['vehicle_id' => 1, 'status' => 'in'])->get()
        ]);
    }

    /**
     * Display a listing of the resource, vehicle = motorcycle and status = in.
     *
     * @return \Illuminate\Http\Response
     */
    public function motorcycles()
    {
        return response()->json([
            'data' => Transaction::where(['vehicle_id' => 2, 'status' => 'in'])->get()
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
            'device_id' => 'required',
            'vehicle_id' => 'required',
            'license_plate' => 'required',
        ]);

        $transaction = new Transaction();
        $transaction->device_id = $request->device_id;
        $transaction->vehicle_id = $request->vehicle_id;
        $transaction->license_plate = $request->license_plate;
        $transaction->in_time = Carbon::now();
        $transaction->status = 'in';
        if ($transaction->save()) {
            return response()->json([
                'status' => true,
                'message' => 'berhasil disimpan'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'gagal disimpan'
            ]);
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
            'data' => $transaction
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
                'message' => 'berhasil diubah'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'gagal diubah'
            ]);
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
