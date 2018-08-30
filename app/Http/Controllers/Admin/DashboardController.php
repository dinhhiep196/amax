<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class DashboardController extends Controller
{
    public function index(){
        return view("admin.home");
    }
    public function showHomePage($id){
        $post = Post::findOrFail($id);
        if ($post){
            $postNumber = Post::where('type',$post->type)->where('showHomePage',true)->count();
            if ($postNumber < 3 || $post->showHomePage ){
                $post->showHomePage = !$post->showHomePage;
                $post->timestamps = false;
                $post->save();
            }else{
                return response('FULL',200);
            }
        }else{
            return response('NOT', 200);
        }
    }
}
