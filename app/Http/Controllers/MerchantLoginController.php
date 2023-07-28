<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\MerchantLogin;
use App\Models\Transaction;
// use Auth;

class MerchantLoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:web', ['except' => ['logout', 'getLogout']]);
    }

    public function getLogin()
    {
        return view('login-merchant');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login-merchant')
                ->withErrors(trans('auth.failed'));
        endif;

        $merchant = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($merchant);

        return $this->authenticated($request, $merchant);


    }

    protected function authenticated(Request $request, $merchant)
    {
        return redirect('transaction');
    }

    public function getLogout(Request $request)
    {
        Session::flush();
        Auth()->logout();
        return redirect('login-merchant');
    }


}
