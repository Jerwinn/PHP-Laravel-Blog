<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * ddd
 */
class BlogPageController extends Controller
{
    public function index(){
        return view('/layouts.blog');
    }

    public function show(){
        return view('/layouts.post');
    }
}
