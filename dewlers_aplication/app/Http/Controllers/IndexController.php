<?php

namespace App\Http\Controllers;

use App\ctl_users;
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
        $due2=duels::with('ctlUser0','ctlUser3', 'duelstatus')->where([['ctl_user_id_challenger','=',$id_auth->id],['duelstate','!=',6]])->orWhere([['ctl_user_id_challenged','=',$id_auth->id],['duelstate','!=',6]])->get(); //->orWhere([['ctl_user_id_witness','=',$id_auth->id],['duelstate','!=',6]])
//       $challengeds= DB::table('ctl_users')->where('id','!=',$id_auth->id)->get();


        //detalles para el front
//-------------------------------------------------------------*------------------------------------------------------------*------------------------------------
        //Currents DEWLS
        //if duelstatus != finish codigo 4  y ctl_user_witness != usuariologueado
//-------------------------------------------------------------*------------------------------------------------------------*------------------------------------
        //Historial

        // Win
        //if duelstatus == finish codigo 6  y  ctl_user_winner == usuariologueado
        $record_winner=duels::with('ctlUser0','ctlUser3', 'duelstatus')->where( [['ctl_user_id_winner','=',$id_auth->id],['duelstate','=',6]])->get();

        //Lost
        //if duelstatus == finish codigo 6  y  ctl_user_winner != usuariologueado y ctl_user_witness != usuario logeado
        $record_loser=duels::with('ctlUser0','ctlUser3', 'duelstatus')->where([['ctl_user_id_winner','!=',$id_auth->id],['duelstate','=',6],['ctl_user_id_witness','!=',$id_auth->id]])->orWhere([['ctl_user_id_winner','!=',$id_auth->id],['duelstate','=',6],['ctl_user_id_witness','!=',null]])->get();

        //Witness
        //if duelstatus == finish codigo 6  y ctl_user_witness == usuariologueado
        $record_witness=duels::with('ctlUser0','ctlUser3', 'duelstatus')->where([['ctl_user_id_witness','=',$id_auth->id],['duelstate','=',6]])->get();

//-------------------------------------------------------------*------------------------------------------------------------*------------------------------------

        //Witness
        //if duelstatus == finish codigo 6  y ctl_user_witness == usuariologueado
        $dash_witness=duels::with('ctlUser0','ctlUser3', 'duelstatus')->where([['ctl_user_id_witness','=',$id_auth->id],['duelstate','!=',6]])->get();

        //WITNESS

        //if duelstatus != finish codigo 4  y ctl_user_witness == usuariologueado

        $me_user=ctl_users::where('id',$id_auth->id)->first();

        $friends=$me_user->getFriends();

        return view('UserMenu.index')->with('duels',$due2)->with('challengeds',$friends)->with('r_winner', $record_winner)->with('r_loser',$record_loser)->with('r_witness',$record_witness)->with('dash_witness',$dash_witness);


    }


}
