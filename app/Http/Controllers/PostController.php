<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        return redirect('/');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        return redirect('posts/'.$post->id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        return redirect('/');
    }

}
