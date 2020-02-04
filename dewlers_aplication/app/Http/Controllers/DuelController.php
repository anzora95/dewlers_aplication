<?php

namespace App\Http\Controllers;

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
//        $due=DB::table('duels')->where('ctl_user_id_challenger','=',$id_auth->id)->orWhere('ctl_user_id_challenger','=',$id_auth->id)->orWhere('ctl_user_id_witness','=',$id_auth->id)->get();
        $due2=duels::with('ctlUser0')->where('ctl_user_id_challenger','=',$id_auth->id)->orWhere('ctl_user_id_challenger','=',$id_auth->id)->orWhere('ctl_user_id_witness','=',$id_auth->id)->get();;
//        $tittle=$due->tittle;
//        $challenger=$due->ctl_user_id_challenger;
//        $challenged=$due->ctl_user_id_challenged;
//        $witness=$due->ctl_user_id_witness; //enviados para el view
//        $regis=$due->registerDate;
//        $duel_stat= $due->duelstate;


        return view('Duels.status')->with('duels',$due2);
//        ->with('challenger',$challenger)-with('challenged',$challenged)->with('witness',$witness)->with('regis',$regis)->with('state',$duel_stat)
    }
}
