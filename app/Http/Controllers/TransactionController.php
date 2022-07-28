<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('year') && request('month')) {
            $transactions = Transaction::with(['parker', 'vehicle'])->whereYear('created_at', request('year'))->whereMonth('created_at', request('month'))->latest()->paginate(20)->appends(request()->query());
            $income = Transaction::whereYear('created_at', request('year'))->whereMonth('created_at', request('month'))->sum('total_price');
            $total_transaction = Transaction::whereYear('created_at', request('year'))->whereMonth('created_at', request('month'))->count();
        }

        // $transactions = Transaction::all();
        return view('dashboard.home', [
            'transactions' => $transactions,
            'income' => $income,
            'total_transaction' => $total_transaction
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
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
        //
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

    public function export()
    {
        return Excel::download(new TransactionsExport(request('year'), request('month')), 'Laporan Transaksi-' . request('month') . '-' . request('year') . '.xlsx');
    }
}
