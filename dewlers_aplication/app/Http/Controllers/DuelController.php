<?php

namespace App\Http\Controllers;

use App\internalaccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\duels;

class DuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $challengeds= DB::table('ctl_users')->where('id','!=',$user->id)->get();
        return view('Duels.createduel')->with('challengeds',$challengeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
//        $challenger=DB::table('')

        $tittle=$request->post('tittle');
        $user_challenger=$user->id;
        $user_challenged=$request->post('challendged');
        $user_witness=$request->post("witness");
        $start='2020-01-31';
        $end='2020-02-10';
        $file='this is a test file';
        $status=1;
//        $user_winner=;
        $duel_state=1;
        $pot=$request->post('pot');

        DB::table('duels')->insert(["tittle"=>$tittle,
            'ctl_user_id_challenger'=>$user_challenger,
            'ctl_user_id_challenged'=>$user_challenged,
            'ctl_user_id_witness'=>$user_witness,
            'registerDate'=>$start ,
            'modificationDate'=>$end,
            'startDate'=>$start,
            'endDate'=>$end,
            'testFile'=>$file,
            'status'=>$status,
            'duelstate'=>$duel_state,
            'pot'=>$pot]);


        return view('UserMenu.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function  status()
    {
        $id_auth=Auth::user();
        $due2=duels::with('ctlUser0','ctlUser3', 'duelstatus')->where('ctl_user_id_challenger','=',$id_auth->id)->orWhere('ctl_user_id_challenged','=',$id_auth->id)->get();;


        return view('Duels.status')->with('duels',$due2);
    }

    public function gamewinner($idduel,$idwinner,$idlosser){

//      PLAYERS IDS
        $id_winner=$idwinner;
        $id_loser=$idlosser;

//        TEST DUEL BALANCE
        $duel_id=$idduel;

        DB::table('duels')->where('id', $duel_id)->update(['ctl_user_id_winner'=>$id_winner, 'duelstate'=>4, 'status'=>0 ]);

//        POT DEL DUELO
        $duels_pot_data=duels::where('id','=',$duel_id)->first();
        $pot=$duels_pot_data->pot;

//        INTERNAL WINNER ACCOUNT BALANCE
        $data_winner_balance=internalaccounts::where('ctl_user_id',$id_winner)->first();
        $plus_balance=$data_winner_balance->balance + $pot;
//        return View('test')->with('like',$plus_balance);

//        UPDATING WINNER INTERNAL ACCOUNT
        DB::table('internalaccounts')->where('ctl_user_id',$id_winner)->update(['balance'=>$plus_balance]);


//        INTERNAL LOSER ACCOUNT BALANCE
        $data_loser_balance=internalaccounts::where('ctl_user_id',$id_loser)->first();
        $less_balance=$data_loser_balance->balance - $pot;

//          UPDATING LOSER ACCOUNT BALANCE
        DB::table('internalaccounts')->where('ctl_user_id',$id_loser)->update(['balance'=>$less_balance]);

    }

    public function acept_challenge($id){

        DB::table('duels')->where('id',$id)->update(['duelstate'=>2]);
        return redirect('/status');

    }


}
