<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment_name' => 'required|max:10',
            'comment_body' => 'required',
        ]);

        // if($request->name == '')

        $comment = new Comment();
        $comment->comment_name = $request->comment_name;
        $comment->comment_body = $request->comment_body;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.commentId', $post);
    }

    public function destroy(Post $post, Comment $comment) {

        $comment->delete();

        return redirect()->route('posts.edit.comment', $post);
    }
}
