<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index() {
    	$posts = Post::orderBy('created_at', 'desc')->get();
    	return view('post.index', ['posts' => $posts]);
    }

    public function postLikePost(Request $request) {
       $post_id = $request['postId'];
       $is_like = $request['isLike'] === 'true';
       $update = false;
       $post = Post::find($post_id);
       if (!$post) {
           return null;
       }
       $user = Auth::user();
       $like = $user->likes()->where('post_id', $post_id)->first();
       if ($like) {
           $already_like = $like->like;
           $update = true;
           if ($already_like == $is_like) {
               $like->delete();
               return null;
           }
       } else {
           $like = new Like();
       }
       $like->like = $is_like;
       $like->user_id = $user->id;
       $like->post_id = $post->id;
       if ($update) {
           $like->update();
       } else {
           $like->save();
       }
       return null;
   }
}
