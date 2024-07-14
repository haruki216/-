<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    public function index(Post $post){
        return view("chat.post")->with(["posts"=>$post->getByLimit()]);
    }
    
    public function create(){
        return view("chat.create");
    }
    
    public function show(Post $post){
         return view("chat.show")->with(["post"=>$post]);
        
    }
    
    public function store(Request $request, Post $post)
{
    $post->cotent = $request->input('cotent');
    
    $post->save();
    return redirect('/post/posts/' . $post->id);
}
}
