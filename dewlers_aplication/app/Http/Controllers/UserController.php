<?php

namespace App\Http\Controllers;

use App\ctl_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\internalaccounts;
use App\duels;
class UserController extends Controller
{
    //
    public function tmanager()
    {
        //
        $id = Auth::user();
        $balance =  internalaccounts::with('ctlUser')->where('id','=',$id->id)->first();
        return view('UserMenu.transactionmanager')->with('balance',$balance);
    }
    public function addcoins(Request $request){
        $id = Auth::user();
        $amount = $request->input('option');
        $ownAmount = $request->input('ownAmount');
        $amount = $request->input('amount');
        $actualamount = DB::table('internalaccounts')->where('id','=',$id->id)->first();
        //            Si el valor del OwnAmount esta vacion obtenemos el de los radiobutton
        if(empty( $ownAmount)){
            $newAmount = $actualamount->balance + (float)$amount;
        }
        else{
            $newAmount = $actualamount->balance + (float)$ownAmount;
        }

        error_log('Some message here.');
        DB::table('internalaccounts')
            ->where('id','=',$id->id)
            ->update(['balance'=>$newAmount]);

        return redirect('/transactionmanager');
    }

    public  function witness(){

        $id=Auth::user();

        $duels=duels::with('ctlUser0','ctlUser1')->where('ctl_user_id_witness','=',$id->id)->get();
        $don_status  =  DB::table('double_or_nothing')->where('loser_id',$id);  //se enviara para comparar si el don debe repetirse o no

        return view('UserMenu.witness')->with('duels',$duels)->with('don_status',$don_status); // se enviara para evitar que el witness pueda ver este duelo se ocupara si es necesario.
    }

}
