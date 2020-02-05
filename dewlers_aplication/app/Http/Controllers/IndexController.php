<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //Shows App Index
    public function index()
    {
        $id = Auth::user();

        $actualamount = DB::table('internalaccounts')->where('id','=',$id->id)->first();

        return view('UserMenu.index')->with('actualamount',$actualamount->balance);
    }
}
