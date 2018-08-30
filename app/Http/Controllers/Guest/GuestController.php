<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function postDetail($slug){
        $post = Post::where('slug', $slug)->first();
        if (!$post){
            return abort(404);
        }
        return view('guest.post.detail',['post'=> $post]);
    }

    public function postIntro(){
        $post = Post::where('type','gioi-thieu')->first();
        if (!$post){
            return abort(404);
        }
        return view('guest.post.detail',['post'=> $post]);
    }
    public function postContact(){
        $post = Post::where('type','lien-he')->first();
        if (!$post){
            return abort(404);
        }
        return view('guest.post.detail',['post'=> $post]);
    }

    public function listPost($type){
        $posts = Post::where('type', $type)->orderBy('updated_at','desc')->paginate(4);
        if ($posts->count() == 0){
            return abort(404);
        }else{
            $typeName = $posts->first()->typeName;
        }
        return view('guest.post.list', ['posts' => $posts, 'typeName' => $typeName]);
    }


}
