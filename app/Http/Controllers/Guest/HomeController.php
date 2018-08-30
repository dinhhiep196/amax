<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $slides = DB::table('slides')->get();
        return view('guest.home',['slides'=> $slides]);
    }
}
