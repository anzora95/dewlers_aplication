<?php

namespace App\Http\Controllers;

use App\internalaccounts;
use App\Reviews;
use App\category_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\duels;
use App\double_or_nothing;

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
        $start= $request->post("startdate");
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
            'registerDate'=>date("Y-m-d") ,
            'modificationDate'=>$start,
            'startDate'=>$start,
            'endDate'=>$end,
            'testFile'=>$file,
            'status'=>$status,
            'duelstate'=>$duel_state,
            'pot'=>$pot]);

//        return view('UserMenu.index'); che
        return redirect("dashboard");
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
        $don_status=DB::table('double_or_nothing')->where('loser_id',$id_auth)->get();  //se enviara para comparar si el don debe repetirse o no
        $don_status=double_or_nothing::where('loser_id', '=', $id_auth)->get();

//        foreach ($don_status as $don){
//            echo $don->status;
//        }


//        if($don_status==null){
//            $id = Auth::user();
//
//            $actualamount = DB::table('internalaccounts')->where('id','=',$id->id)->first();
//
//            return view('UserMenu.index')->with('actualamount',$actualamount->balance);
//        }else{


        return view('Duels.status')->with('duels',$due2)->with('don_status',$don_status);
//        }
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

        //division del pot
        $pot_dewlers=$pot*0.1;
        $pot_winner=$pot*0.85;
        $pot_witness=$pot*0.05;

//        INTERNAL WINNER ACCOUNT BALANCE
        $data_winner_balance=internalaccounts::where('ctl_user_id',$id_winner)->first();
        $plus_balance=$data_winner_balance->balance + $pot_winner;
//        return View('test')->with('like',$plus_balance);
//marvin 2585 jose 2471 ariel 4418.5
//        UPDATING WINNER INTERNAL ACCOUNT
        DB::table('internalaccounts')->where('ctl_user_id',$id_winner)->update(['balance'=>$plus_balance]);


//        INTERNAL LOSER ACCOUNT BALANCE
        $data_loser_balance=internalaccounts::where('ctl_user_id',$id_loser)->first();
        $less_balance=$data_loser_balance->balance - $pot;


//          UPDATING LOSER ACCOUNT BALANCE
        DB::table('internalaccounts')->where('ctl_user_id',$id_loser)->update(['balance'=>$less_balance]);

        //INTERNAL WITNESS ACCOUNT BALANCE
        $id_witness=$duels_pot_data->ctl_user_id_witness;// se obtiene el id de el witness
        $data_witness_balance=internalaccounts::where('ctl_user_id',$id_witness)->first(); //se obtiene la row donde esta la cuenta interna de el witness
        $plus_balance_witness=$data_witness_balance->balance + $pot_witness;
        DB::table('internalaccounts')->where('ctl_user_id',$id_witness)->update(['balance'=>$plus_balance_witness]);

        //create double or nothing dependiendo del perdedor
        DB::table('double_or_nothing')->insert(["duel_id"=>$duel_id,
            'status'=>1,
            'loser_id'=>$id_loser]);

        //Creation of reviews and user_category
        //Winner Review
        DB::table("Reviews")->insert(['description'=>'The witness was very good','stars'=>4,'created_at'=>date('y-m-d H:i:s'),'rol'=>'Winner','duel'=>$idduel,'user'=>$idwinner]);

        //Winner Review Count
        $winner_review_count=DB::table('Reviews')->where('user','=',$idwinner)->avg('stars');
        DB::table('category_users')->where('user',$idwinner)->update(['avg'=>$winner_review_count]);

        //Loser Review
        DB::table("Reviews")->insert(['description'=>'The witness was very bad','stars'=>2,'created_at'=>date('y-m-d H:i:s'),'rol'=>'Loser','duel'=>$idduel,'user'=>$idlosser]);
        //Loser Review Count
        $loser_review_count=DB::table('Reviews')->where('user','=',$idlosser)->avg('stars');
        DB::table('category_users')->where('user',$idlosser)->update(['avg'=>$loser_review_count]);



    }

    public function acept_challenge($id){

        DB::table('duels')->where('id',$id)->update(['duelstate'=>2]);
        return redirect('/status');

    }


}
