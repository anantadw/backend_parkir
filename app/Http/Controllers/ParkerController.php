<?php

namespace App\Http\Controllers;

use App\Models\Parker;
use Illuminate\Http\Request;

class ParkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkers = Parker::all();
        // dd($logs);
        // $transactions = Transaction::all();
        return view('dashboard.parker', [
            'parkers' => $parkers
        ]);
    }
}
