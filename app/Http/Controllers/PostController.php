<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * PostController
 */
class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        if (Auth::check()) {

            $request->validate([
                'title' => 'required',
                'body' => 'required'
            ]);

            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->body = $request->body;

            $post->save();
        }

        return redirect('/');
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (Auth::id() == $post->user_id) {

            return view('posts.edit', [
                'post' => $post
            ]);

        } else {

            return redirect('/');
        }
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (Auth::id() == $post->user_id) {

            $request->validate([
                'title' => 'required',
                'body' => 'required'
            ]);

            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->body = $request->body;

            $post->save();
            return redirect('posts/'.$post->id);
        } else {

            return redirect('/');
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (Auth::id() == $post->user_id) {

            $post->delete();
        }

        return redirect('/');
    }
}
