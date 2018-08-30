<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SlideController extends Controller
{
    public function index(){
        $slideExist = DB::table('slides')->count();
        if ($slideExist < 3){
            for( $i = 0; $i < 3 - $slideExist; $i++){
                DB::table('slides')->insert(['link'=>'']);
            }
        }

        $slides = DB::table('slides')->get();
        return view('admin.slide.slide', ['slides' => $slides]);
    }
    public function update(Request $request ,$id){
        DB::table('slides')->where('id',$id)->update(['link'=> $request->link]);
        return redirect()->route('slide.index');
    }

}
