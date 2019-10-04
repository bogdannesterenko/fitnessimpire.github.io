<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('backend.comments.index', compact('comments'));
    }
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->author_name = $request->author_name;
        $comment->approved = $request->approved;
        $comment->body = $request->body;

        if($comment->save()) {
            return redirect()->back()->withFlashSuccess("Комментарий добавлен");
        }
    }
    public function create(Comment $comment)
    {
    	$posts = Posts::pluck('title','id');
        return view('backend.comments.create',compact('posts'));
    }
    public function edit(Comment $comment)
    {
    	$posts = Posts::pluck('title','id');
        return view('backend.comments.edit', compact('posts','comment'));
    }
    public function update(Comment $comment, Request $request)
    {
        $comment->post_id = $request->post_id;
        $comment->author_name = $request->author_name;
        $comment->approved = $request->approved;
        $comment->body = $request->body;

        if ($comment->save()) {
            return redirect()->back()->withFlashSuccess("Комментарий обновлен");
        }
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->withFlashSuccess("Комментарий удален");
    }
}
