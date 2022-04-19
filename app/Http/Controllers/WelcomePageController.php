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
                $posts = Post::where('title', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(3);
            } else {
                $posts = Post::orderBy('id', 'desc')->paginate(3);
            }
            return view('welcome', ['posts' => $posts]);
        }

        function detail(Request $request, $slug, $postId)
        {
            Post::find($postId)->increment('views');
            $detail = Post::find($postId);
            return view('postDetail', ['detail' => $detail]);
        }

        /**todo
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */

        function saveUserPost(){
        $cats=PostCategory::all();
        return view('user-post',['cats'=>$cats]);
        }

    function saveUserData(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required',
        ]);

        // Post Thumbnail
        if ($request->hasFile('thumbnail')) {
            $image1 = $request->file('thumbnail');
            $reThumbImage = time() . '.' . $image1->getClientOriginalExtension();
            $dest1 = public_path('/images/thumbnails');
            $image1->move($dest1, $reThumbImage);
        } else {
            $reThumbImage = '';
        }

        // Post Full Image
        if ($request->hasFile('image')) {
            $image2 = $request->file('image');
            $reFullImage = time() . '.' . $image2->getClientOriginalExtension();
            $dest2 = public_path('/images/fullImage');
            $image2->move($dest2, $reFullImage);
        } else {
            $reFullImage = 'na';
        }

        $post = new Post;
        $post->user_id = $request->user()->id;
        $post->cat_id = $request->category;
        $post->title = $request->title;
        $post->thumbnail = $reThumbImage;
        $post->image = $reFullImage;
        $post->content = $request->detail;
        $post->tags = $request->tags;
        $post->status = 1;
        $post->save();

        return redirect('user-post')->with('success', 'Your post has been added');

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
            return redirect('/dashboard')->with('success', 'Comment has been added.');
        }

        function showCategories(){
            $categories=PostCategory::orderBy('id','desc')->paginate(3);
            return view('showCategories',['categories'=>$categories]);
        }

        function postCategory(Request $request,$cat_slug,$cat_id){
            $category=PostCategory::find($cat_id);
            $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(1);
            return view('category',['posts'=>$posts,'category'=>$category]);
        }
}
