<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;

use App\Models\Merchant;

use Illuminate\Support\Facades\DB;

// use Carbon\Carbon;

class TransactionController extends Controller
{
    //
    public function getTransaction(Request $request)
    {
        $transactions = DB::table('transactions')->where('merchant_id','=',auth()->user()->id)->get();
        $merchants = DB::table('merchants')->where('id','=',auth()->user()->id)->get();
        $balance = DB::table('transactions')->where('merchant_id','=',auth()->user()->id)->sum('transactions.amount');
        return view('transaction', compact('transactions','balance','merchants'));
    }

    public function getAllTransaction(Request $request)
    {
        $transactions = Transaction::all();
        return view('adminTransaction', compact('transactions'));
    }

}
