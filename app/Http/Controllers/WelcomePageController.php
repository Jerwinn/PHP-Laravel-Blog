<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomePageController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $search=$request->search;
            $posts=Post::where('title','like','%'.$search.'%')->orderBy('id','desc')->paginate(1);
        }else{
            $posts=Post::orderBy('id','desc')->paginate(1);
        }
        return view('welcome',['posts'=>$posts]);
    }

    function detail(Request $request, $slug, $postId){
        $detail = Post::find($postId);
        return view('postDetail',['detail'=>$detail]);
    }
}
