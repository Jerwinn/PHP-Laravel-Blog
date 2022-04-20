<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

/**
 * This class is used as a controller for the users main page where posts are shown.
 *
 */

class WelcomePageController extends Controller
{
    /**
     * This method returns the view of the main page where posts are shown.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
        public function index(Request $request)
        {
            //allow for users to search
            if ($request->has('search')) {
                $search = $request->search;
                $posts = Post::where('title', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(3);
            } else {
                $posts = Post::orderBy('id', 'desc')->paginate(3);
            }
            return view('welcome', ['posts' => $posts]);
        }

    /**
     * This method returns the view of the post that has been clicked.
     * @param Request $request
     * @param $slug
     * @param $postId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
        function detail(Request $request, $slug, $postId)
        {
            Post::find($postId)->increment('views');
            $detail = Post::find($postId);
            return view('postDetail', ['detail' => $detail]);
        }

        /**
         * This method returns the view when the user has created a new post.
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */

        function saveUserPost(){
        $cats=PostCategory::all();
        return view('user-post',['cats'=>$cats]);
        }

    /**
     * This is the method for the post forms where users fill to create a post.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function saveUserData(Request $request)
    {
        //form validation
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'detail' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image1 = $request->file('thumbnail');
            $reThumbImage = time() . '.' . $image1->getClientOriginalExtension();
            $dest1 = public_path('/images/thumbnails');
            $image1->move($dest1, $reThumbImage);
        } else {
            $reThumbImage = '';
        }

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

    /**
     * This method is used so that users can comment on the post.
     * @param Request $request the comment
     * @param $slug
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Show all the different post within the category that the user chose.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
        function showCategories(){
            $categories=PostCategory::orderBy('id','desc')->paginate(3);
            return view('showCategories',['categories'=>$categories]);
        }

    /**
     * Show all the different categories that are present in the site.
     * @param Request $request
     * @param $cat_slug
     * @param $cat_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
        function postCategory(Request $request,$cat_slug,$cat_id){
            $category=PostCategory::find($cat_id);
            $posts=Post::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(1);
            return view('category',['posts'=>$posts,'category'=>$category]);
        }
}
