<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::get();
        $posts = Post::paginate(20);
        return view('posts.index',['posts'=>$posts]);
    }

    public function store(Request $request){
        // dd("ok");
        $this->validate($request,[
            'body'=>'required'
        ]);

        auth()->user()->posts()->create($request->only('body'));
        return back();
    }
}
