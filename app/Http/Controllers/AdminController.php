<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use DataTables;

use App\Models\Merchant;

use App\Models\Admin;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin');
    }

    public function getDashboard()
    {
        return view('welcome');
    }

    public function getMerchants(Request $request)
    {
        if ($request->ajax()) {
            return datatables()->of(Merchant::select('*'))
                ->editColumn('created_at', function ($request){
                    return date('d M Y H:i:s', strtotime($request->created_at) );
                })
                ->addIndexColumn()
                ->addColumn('action','merchant-action')
                ->rawColumns(['action'])
                ->make(true);
        }

        $lasts = Admin::all();
        return view('admin',compact('lasts'));
    }

    public function store(Request $request)
    {

        $id = $request->id;
        $merchant   =   Merchant::create(
                    [
                     'id' => $id,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'username' => $request->username,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                    'last_updated_by' => $request->last_updated_by
                    ]);

        return Response()->json($merchant);

    }

    public function update(Request $request)
    {

        $id = $request->id;
        $merchant   =   Merchant::find($id)->update(
                    [
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'username' => $request->username,
                    'created_at' => $request->created_at,
                    'last_updated_by' => $request->last_updated_by
                    ]);

        return Response()->json($merchant);

    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $merchant  = Merchant::where($where)->first();
        return Response()->json($merchant);
    }

    public function destroy(Request $request)
    {
        $merchant = Merchant::where('id',$request->id)->delete();
        return Response()->json($merchant);
    }

}
