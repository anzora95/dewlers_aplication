<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Shows App Index
    public function index()
    {
        return view('UserMenu.index');
    }
}
