<?php

namespace App\Http\Controllers;

use App\ctl_users;
use App\Notifications\addfriend;
use App\Notifications\send_req_friend;
use App\Notifications\StatusUpdate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\internalaccounts;
use App\duels;
use Illuminate\Support\Facades\Notification;
//use Frie/

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
        $don_status =  DB::table('double_or_nothing')->where('loser_id',$id);  //se enviara para comparar si el don debe repetirse o no
        $witness_acept=0;

        return view('UserMenu.witness')->with('duels',$duels)->with('don_status',$don_status)->with('witness_acept',$witness_acept); // se enviara para evitar que el witness pueda ver este duelo se ocupara si es necesario.
    }

    //FUNCION PARA DECIDIR GANADOR SI SE ES EL CREADOR DEL DUELO
    //
    //SELECCIONAR DE LA BASE LOS DUELOS CON WITNESS VACIO Y QUE EL USUARIO LOGUEADO SEA EL CHALLENGER

    public function challenger_decides(){
        $id=Auth::user();

        $no_witness= duels::with('ctlUser0', 'ctlUser1')->where([['ctl_user_id_witness', '=', null],['ctl_user_id_challenger','=', $id->id]]);

    }

    public function witness_contract(Request $request){

        $id = Auth::user();
        $percentage = $request->input("percentage");
        $duel=$request->input("id");
        DB::table('duels')
            ->where('id','=',$duel)
            ->update(['duelstate'=>1]);

        $duels_data= DB::table('duels')->where('id','=',$duel)->first();


        //-----------------------------------CORREOS WINNER--------------------------------------------


        $email_challenger=User::where('id','=',$duels_data->ctl_user_id_challenger)->first();//WINNER
        $email_witness=User::where('id','=',$duels_data->ctl_user_id_witness)->first();//LOSS

        $arr5=[$duels_data->tittle,5,$email_challenger->name, $email_witness->name]; //DATA FOR EMAIL TEMPLATE WINNER
        Notification::route('mail', $email_challenger->email)
            ->notify(new StatusUpdate($arr5)); //EMAIL FOR WINNER


        return redirect('/dashboard');



    }

    public function witness_refuse(Request $request){

        $id = Auth::user();
        $percentage = $request->input("percentage");

        $duel=$request->input("id");

        $duels_data= DB::table('duels')->where('id','=',$duel)->first();

        DB::table('duels')
            ->where('id','=',$duel)
            ->update(['ctl_user_id_witness'=>null]);

        DB::table('duels')
            ->where('id','=',$duel)
            ->update(['duelstate'=>1]);


        //-----------------------------------CORREOS WINNER--------------------------------------------


        $email_challenger=User::where('id','=',$duels_data->ctl_user_id_challenger)->first();//WINNER
        $email_witness=User::where('id','=',$duels_data->ctl_user_id_witness)->first();//LOSS

        $arr5=[$duels_data->tittle,6,$email_challenger->name, $email_witness->name]; //DATA FOR EMAIL TEMPLATE WINNER
        Notification::route('mail', $email_challenger->email)
            ->notify(new StatusUpdate($arr5)); //EMAIL FOR WINNER

        return redirect('/dashboard');



    }

    public function myaccount(){

        $id = Auth::user();

        $ctl_log_user= ctl_users::where('id','=',$id->id)->first();

        $resquet_pending= $ctl_log_user->getFriendRequests();
        $friends=$ctl_log_user->getFriends();

        return view('UserMenu/myaccount')->with('pending_f_req',$resquet_pending)->with('friends',$friends);

    }

    public function accept_friend($id_accept){

        $user = Auth::user();
        $me_user=ctl_users::where('id',$user->id)->first();
        $sender_friend=ctl_users::where('id',$id_accept)->first();
        $frien_email=User::where('id',$id_accept)->first();

        $me_user->acceptFriendRequest($sender_friend);

        $arr5=[$me_user->username]; //DATA FOR EMAIL TEMPLATE WINNER
        Notification::route('mail', $frien_email->email)
            ->notify(new addfriend($arr5)); //EMAIL FOR WINNER

        return redirect('/myaccount');
    }

    public function refuse_friend($id_accept){

        $user = Auth::user();
        $me_user=ctl_users::where('id',$user->id)->first();
        $sender_friend=ctl_users::where('id',$id_accept)->first();

        $me_user->denyFriendRequest($sender_friend);

        return redirect('/myaccount');
    }

    public function send_friend(Request $request){

        $id_recipient=$request->input('user_id');

        $user = Auth::user();
        $me_user=ctl_users::where('id',$user->id)->first();
        $recipient=ctl_users::where('id',$id_recipient)->first();
        $frien_email=User::where('id',$id_recipient)->first();

        $me_user->befriend($recipient);

        $arr5=[$me_user->username]; //DATA FOR EMAIL TEMPLATE WINNER
        Notification::route('mail', $frien_email->email)
            ->notify(new send_req_friend($arr5)); //EMAIL FOR WINNER

        return redirect('/myaccount');
//        return view('test')->with('like',$container);/

    }

    public function search_person(Request $request){

        $name = $request->input('user');
        $user_requested= ctl_users::where('username','LIKE','%'.$name.'%')->get();

        return view('UserMenu.search')->with("selected",$user_requested);

    }

}
