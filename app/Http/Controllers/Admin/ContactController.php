<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ContactController extends Controller
{
    const PAGENAME = "Liên hệ";
    const ROUTENAME = "contacts";
    const TYPE = "lien-he";
    const ICON = "fa-info-circle";
    public function index(){
        $post = Post::where("type",self::TYPE)->first();
        if(!$post){
            return view("admin.post.add",["pageName" => self::PAGENAME, "routeName" => self::ROUTENAME, "icon" => self::ICON]);
        }else{
            return view("admin.post.edit",["post"=>$post, "pageName" => self::PAGENAME, "routeName" => self::ROUTENAME, "icon" => self::ICON]);
        }
    }
    public function create(){
        return view('admin.404');
    }

    public function store(Request $request){
        $time = new DateTime();
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($post->title)."-".$time->getTimestamp();
        $post->content = $request->content1;
        $post->thumbnailImage = $request->thumbnailImage;
        $post->type = self::TYPE;
        $post->typeName = self::PAGENAME;
        $post->username = Auth::user()->name;
        $post->seoTitle = $request->seoTitle;
        $post->metaKeywords = $request->metaKeywords;
        $post->metaDescription = $request->metaDescription;
        $post->save();
        return redirect()->route(self::ROUTENAME.'.index');
    }
    public function update(Request $request,$id){
        $post = Post::where('type',self::TYPE)->findOrFail($id);
        $time = new DateTime();
        $post->title = $request->title;
        $post->slug = str_slug($post->title)."-".$time->getTimestamp();
        $post->content = $request->content1;
        $post->thumbnailImage = $request->thumbnailImage;
        $post->type = self::TYPE;
        $post->username = Auth::user()->name;
        $post->seoTitle = $request->seoTitle;
        $post->metaKeywords = $request->metaKeywords;
        $post->metaDescription = $request->metaDescription;
        $post->save();
        return redirect()->route(self::ROUTENAME.'.index');
    }
    public function show(){
        return view('admin.404');
    }
}
