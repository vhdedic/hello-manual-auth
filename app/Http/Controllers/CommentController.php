<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = new Comment();

        $comment->user_id = Auth::id();
        $comment->post_id = $id;
        $comment->body = $request->body;

        $comment->save();
        
        return redirect('posts/'.$id);
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = Comment::find($id);
        $post = Comment::find(1)->where('id', $id)->first();

        $comment->user_id = Auth::id();
        $comment->post_id = $post->post_id;
        $comment->body = $request->body;

        $comment->save();
        
        return redirect('posts/'.$comment->post_id);
    }
}
