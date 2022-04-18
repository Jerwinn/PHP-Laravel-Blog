<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

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
    function comment(Request $request, $slug, $id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();
        return redirect('/dashboard')->with('success','Comment for post has been submitted.');
    }
}
