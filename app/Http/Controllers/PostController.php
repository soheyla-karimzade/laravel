<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    //


    public function index(Request $request){
        $token = $request->user()->createToken('posts')->plainTextToken;

        return view('post.index',['token'=>$token]);
    }


}
