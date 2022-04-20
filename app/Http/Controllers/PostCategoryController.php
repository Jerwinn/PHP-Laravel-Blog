<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data=PostCategory::all();
        return view('backend.categories.index',['data'=> $data,
            'title'=>'Categories',
            'meta_description' => 'This is the meta description for the categories']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.addCategory');
    }

    /**
     * Store a newly created resource into the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('category_image')){
            $image=$request->file('category_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/images');
            $image->move($dest,$reImage);
        }else{
            $reImage='No Picture';
        }

        $category=new PostCategory;
        $category->title=$request->title;
        $category->description=$request->description;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/categories/create')->with('success','Category has been added.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=PostCategory::find($id);
        return view('backend.categories.updateCategory',['data'=>$data]);

    }

    /**
     * Update the specified resource in the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('category_image')){
            $image=$request->file('category_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/images');
            $image->move($dest,$reImage);
        }else{
            $reImage=$request->category_image;
        }

        $category=PostCategory::find($id);
        $category->title=$request->title;
        $category->description=$request->description;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/categories/'.$id.'/edit')->with('success','Data has been added');
    }

    /**
     * Remove the specified resource from the database.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        PostCategory::where('id',$id)->delete();
        return redirect('admin/categories');
    }
}
