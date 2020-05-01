<?php

namespace App\Http\Controllers;

use App\double_or_nothing;
use App\duels;
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



    public function index_tables(){

        $id_auth=Auth::user();
        $due2=duels::with('ctlUser0','ctlUser3', 'duelstatus')->where('ctl_user_id_challenger','=',$id_auth->id)->orWhere('ctl_user_id_challenged','=',$id_auth->id)->orWhere('ctl_user_id_witness','=',$id_auth->id)->get();
//        $don_status=double_or_nothing::where('loser_id', '=', $id_auth)->get();

        return view('UserMenu.index')->with('duels',$due2);


        //detalles para el front
//-------------------------------------------------------------*------------------------------------------------------------*------------------------------------
        //Currents DEWLS
        //if duelstatus != finish codigo 4  y ctl_user_witness != usuariologueado
//-------------------------------------------------------------*------------------------------------------------------------*------------------------------------
        //Historial

        // Win
        //if duelstatus == finish codigo 4  y  ctl_user_winner == usuariologueado

        //Lost
        //if duelstatus == finish codigo 4  y  ctl_user_winner != usuariologueado

        //Witness
        //if duelstatus == finish codigo 4  y ctl_user_witness == usuariologueado
//-------------------------------------------------------------*------------------------------------------------------------*------------------------------------

        //WITNESS

        //if duelstatus != finish codigo 4  y ctl_user_witness == usuariologueado


    }


}
