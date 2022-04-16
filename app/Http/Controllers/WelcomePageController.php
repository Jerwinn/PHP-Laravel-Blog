<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomePageController extends Controller
{
    public function index(){
        $posts=Post::orderBy('id','desc')->paginate(1);
        return view('welcome',['posts'=>$posts]);
    }
}
