<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a the index page of the backend for admins.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data=Post::all();
        return view('backend.post.index',['Data'=> $data,
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $cats=PostCategory::all();
        return view('backend.post.addPost',['cats'=>$cats]);
    }

    /**
     * Store a newly created post in the database. these include the post title, category, details and the image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title'=>'required',
            'category'=>'required',
            'post_content'=>'required',
        ]);


        if($request->hasFile('post_thumbnail')){
            $image1=$request->file('post_thumbnail');
            $reThumbnailImage=time().'.'.$image1->getClientOriginalExtension();
            $dest=public_path('/images/thumbnails');
            $image1->move($dest,$reThumbnailImage);
        }else{
            $reThumbnailImage='NA';
        }

        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest=public_path('/images/fullImage');
            $image2->move($dest,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=1;
        $post->cat_id=$request->category;
        $post->title=$request->post_title;
        $post->thumbnail=$reThumbnailImage;
        $post->image=$reFullImage;
        $post->content=$request->post_content;
        $post->tags=$request->post_tags;
        $post->save();

        return redirect('admin/post/create')->with('success','A new post has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the view for editing existing posts.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats=PostCategory::all();
        $data=Post::find($id);
        return view('backend.post.updatePost',['cats'=>$cats,'data'=>$data]);
    }

    /**
     * Update the specified post from the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title'=>'required',
            'category'=>'required',
            'post_content'=>'required',
        ]);

        if($request->hasFile('post_thumbnail')){
            $image1=$request->file('post_thumbnail');
            $reThumbnailImage=time().'.'.$image1->getClientOriginalExtension();
            $dest=public_path('/images/thumbnails');
            $image1->move($dest,$reThumbnailImage);
        }else{
            $reThumbnailImage = $request->post_image;
        }

        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest=public_path('/images/fullImage');
            $image2->move($dest,$reFullImage);
        }else{
            $reFullImage= $request->post_image;
        }

        $post = Post::find($id);
        $post->cat_id=$request->category;
        $post->title=$request->post_title;
        $post->thumbnail=$reThumbnailImage;
        $post->image=$reFullImage;
        $post->content=$request->post_content;
        $post->tags=$request->post_tags;
        $post->save();

        return redirect('admin/post/'.$id.'/edit')->with('success','The post has now been updated');
    }

    /**
     * Remove the specified post from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect('admin/post');
    }
}
