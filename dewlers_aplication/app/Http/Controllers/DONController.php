<?php

namespace App\Http\Controllers;

use App\duelstatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DONController extends Controller
{
    public function save_don(Request $request)    {
        $user=Auth::user();
//        $challenger=DB::table('')


        $id_duel=$request->post('duel');

        $user_challenger=$user->id;
        $new_pot= DB::table('duels')->where('id',$id_duel)->first();
        $pot=($new_pot->pot) *2;


        DB::table('duels')->where('id', $id_duel)->update(['pot'=>$pot, 'duelstate'=>5, 'status'=>1]);

        return view('');


    }

    public function acept_don($duel_id){

        DB::table('duels')->where('id', $duel_id)->update(['status'=>1, 'duelstate'=> 3]);
        return view('UserMenu.index');
    }
}
