<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::paginate(10);
        return view('backend.posts.index', compact('posts'));
    }
    public function store(Request $request )
    {
        $post = new Posts();
        $post->title = $request->title;
        $post->type = $request->type;
        $post->body = $request->body;
        $post->created_at = date('Y-m-d H:i:s');
        $post->updated_at = date('Y-m-d H:i:s');
        $post->user_id = auth()->user()->id;
        if ($request->file('file')) {
            $image = $request->file('file');
            if (substr($image->getMimeType(), 0, 5) != 'image') {
                return redirect()->back()->withFlashErrors(trans('alerts.backend.mime_type'));
            }
            $imageName = md5(time()).$image->getClientOriginalName();
            $path = '/uploads/';
            if(!File::exists(public_path().$path)) {
                File::makeDirectory(public_path().$path, $mode = 0777, true, true);
            }
            $image->move(public_path().$path,$imageName);
            $post->thumb_url = $path.$imageName;
        }

        if($post->save()) {
            return redirect()->route('admin.posts.index')->withFlashSuccess("Пост добавлен");
        }
    }
    public function create(Posts $post)
    {
        return view('backend.posts.create', compact('post'));
    }
    public function edit(Posts $post)
    {
        return view('backend.posts.edit', compact('post'));
    }
    public function update(Posts $post, Request $request)
    {
        $post->title = $request->title;
        $post->type = $request->type;
        $post->body = $request->body;
        $post->updated_at = date('Y-m-d H:i:s');
       
        if ($request->file('file')) {
            File::delete(public_path().$post->thumb_url);

            $image = $request->file('file');
            if (substr($image->getMimeType(), 0, 5) != 'image') {
                return redirect()->back()->withFlashErrors(trans('alerts.backend.mime_type'));
            }
            $imageName = md5(time()).$image->getClientOriginalName();
            $path = '/uploads/';
            if(!File::exists(public_path().$path)) {
                File::makeDirectory(public_path().$path, $mode = 0777, true, true);
            }
            $image->move(public_path().$path,$imageName);
            $post->thumb_url = $path.$imageName;
        }

        if ($post->save()) {
            return redirect()->back()->withFlashSuccess("Пост обновлен");
        }
    }
    public function delete(Posts $post)
    {
        File::delete(public_path().$post->thumb_url);
        $post->delete();

        return redirect()->route('admin.posts.index')->withFlashSuccess("Пост удален");
    }
}
