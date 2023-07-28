<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
// use Auth;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    // use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validasi = [
            'username'  => 'required',
            'password'   => 'required'
            ];

        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::guard('admin')->attempt(['username' =>  $username, 'password' => $password])){
            return redirect('merchant');
        }
        else {
            return response()->json(['error' => 'username atau Password Tidak Sesuai'], 200);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect('admin');
    }


}
