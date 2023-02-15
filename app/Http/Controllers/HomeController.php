<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postObj = new Post;
        $post = Post::find(1);
        
        $post->sortby = (isset($_GET['sortby'])) ? $_GET['sortby'] : 'created_at';
        $post->sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'desc';
        $post->commentsPerPage = $postObj->getCommentsPerPage();

        // $post->comments = Comment::orderBy('created_at', 'desc')->get();

        // dd(compact('post'));
       
        return view('home', compact('post'));
    }
}
