<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\PaymentType;
use App\Models\Transaction;
// use App\Enums\EnumPayment;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $merchants = Merchant::all();
        $payments = PaymentType::all();

        return view('checkout', compact('payments'), compact('merchants'));
    }

    public function addTransaction(Request $request)
    {
        $id = $request->id;
        $data = $request->all();

        try{
            Transaction::create($data);
        } catch (\Throwable $th){
            return Redirect('checkout');
        }
        return Redirect('checkout');
    }

}
