<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\duels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post_Controller extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function don_reduel($id_duel)
    {

        $user = Auth::user();

        $don_duel=duels::where('id','=',$id_duel)->first();
        $challengeds= DB::table('ctl_users')->where('id','!=',$user->id)->get();

        $title_reduel= $don_duel->tittle;
        $description_reduel = $don_duel->Desciption;
        $amount_reduel= ($don_duel->pot) *2;
        $challenged_reduel= $don_duel->ctl_user_id_challenged;
        $witness_reduel=$don_duel->ctl_user_id_witness;

        DB::table('double_or_nothing')->where('duel_id','=',$id_duel)->update(['status'=>0]);


        return View('Duels.reduel')->with('title',$title_reduel)->with('description',$description_reduel)->with('amount',$amount_reduel)->with('challenged',$challenged_reduel)->with('witness',$witness_reduel)->with('challengeds',$challengeds)->with('duel',$id_duel);

    }

    public function posts()
    {
        $posts = Post::all();
        return view('Duels.duels_review',compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('Duels.show',compact('post'));
    }

    public function postPost(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $post = Post::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);
        return redirect()->route("posts");
    }
}




