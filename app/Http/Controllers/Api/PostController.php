<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function all(){
        return PostResource::collection(Post::orderby('id','DESC')->paginate(10)) ;
    }

    public function store(Request $request){
//        return $request->all();

        Post::create([
            'name'=>$request->name,
            'body'=>$request->body,
            'user_id'=>Auth::id(),
            ]);
        return PostResource::collection(Post::orderby('id','DESC')->paginate(10)) ;


    }

    public function update(Request $request)
    {
//        Post::where('id', $request->id)
//            ->update([ 'name'=>$request->name,
//                'body'=>$request->body,]);



       $post = Post::find($request->id);
       $this->authorize('update', $post);
        $post->name=$request->name;
        $post->body=$request->body;

       if($post->save())
           return PostResource::collection(Post::orderby('id','DESC')->paginate(10)) ;
       return new Response(false,401);


        return $request->all();
    }

    public function delete(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        return PostResource::collection(Post::orderby('id','DESC')->paginate(10)) ;

    }
}
