<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'userName' => 'required',
            'comment_body' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->get('post_id');
        $comment->comment_body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request){
        $request->validate([
            'comment_body' => 'required',
        ]);
        // dd($request->parent_id);
        $reply = new Comment;
        $reply->comment_body = $request->get('comment_body');
        $reply->user()->associate(auth()->user());
        $reply->parent_id = $request->get('parent_id');
        $post = Post::find($request->get('post_id'));
        $reply->post_id = $request->get('post_id');

        $post->comments()->save($reply);
        
        return back();
    }
}
