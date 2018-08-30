<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ProjectController extends Controller
{
    const PAGENAME = "Dự án";
    const ROUTENAME = "project";
    const TYPE = "du-an";
    const ICON = "fa-book";
    public function index(){
        $posts = DB::table('posts')->where("type",self::TYPE)->whereNull("deleted_at")->orderBy('updated_at','DESC')->get();
        return view("admin.post.list",["posts"=>$posts, "pageName" => self::PAGENAME, "routeName" => self::ROUTENAME, "icon" => self::ICON]);
    }
    public function create(){
        return view('admin.post.add',["pageName" => self::PAGENAME, "routeName" => self::ROUTENAME, "icon" => self::ICON]);
    }

    public function store(Request $request){
        $time = new DateTime();
        $post = new Post();
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
    public function edit($id){
        $post = Post::where('type',self::TYPE)->findOrFail($id);
        return view('admin.post.edit', ["post" => $post, "pageName" => self::PAGENAME, "routeName" => self::ROUTENAME, "icon" => self::ICON]);
    }
    public function update(Request $request,$id){
        $post = Post::where('type',self::TYPE)->findOrFail($id);
        $time = new DateTime();
        $post->title = $request->title;
//        $post->slug = str_slug($post->title)."-".$time->getTimestamp();
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
    public function show(){
        return view('admin.404');
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
}
