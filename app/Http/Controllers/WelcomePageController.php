<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

class WelcomePageController extends Controller
{
        public function index(Request $request)
        {
            if ($request->has('search')) {
                $search = $request->search;
                $posts = Post::where('title', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(1);
            } else {
                $posts = Post::orderBy('id', 'desc')->paginate(6);
            }
            return view('welcome', ['posts' => $posts]);
        }
    function comment(Request $request, $slug, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);
        $data = new Comment;
        $data->user_id = $request->user()->id;
        $data->post_id = $id;
        $data->comment = $request->comment;
        $data->save();
        return redirect('/dashboard')->with('success', 'Comment for post has been submitted.');
    }

    function showCategories(){
        $categories=PostCategory::orderBy('id','desc')->paginate(3);
        return view('showCategories',['categories'=>$categories]);
    }

    function postCategory(Request $request,$cat_slug,$cat_id){
        $category=PostCategory::find($cat_id);
        $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(3);
        return view('category',['posts'=>$posts,'category'=>$category]);
    }

        function detail(Request $request, $slug, $postId)
        {
            Post::find($postId)->increment('views');
            $detail = Post::find($postId);
            return view('postDetail', ['detail' => $detail]);
        }


}
