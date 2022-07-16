<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CommentController
 */
class CommentController extends Controller
{
    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function store(Request $request, $id)
    {
        if (Auth::check()) {
            $request->validate([
                'body' => 'required'
            ]);

            $comment = new Comment();

            $comment->user_id = Auth::id();
            $comment->post_id = $id;
            $comment->body = $request->body;

            $comment->save();

            return redirect('posts/'.$id);
        } else {

            return redirect('/');
        }
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        if (Auth::id() == $comment->user_id) {

            return view('comments.edit', [
                'comment' => $comment
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
        $comment = Comment::find($id);

        if (Auth::id() == $comment->user_id) {

            $request->validate([
                'body' => 'required'
            ]);

            $post = $comment->post_id;

            $comment->user_id = Auth::id();
            $comment->post_id = $post;
            $comment->body = $request->body;

            $comment->save();

            return redirect('posts/'.$post);

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
        $comment = Comment::find($id);
        $post = $comment->post_id;

        $comment->delete();

        return redirect('posts/'.$post);
    }
}
