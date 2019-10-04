<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10);
        return view('backend.pages.index', compact('pages'));
    }
    public function store(Request $request)
    {
        $page = new Page();
        $page->body = $request->body;
        $page->name = $request->name;
        if ($request->slug == "") {
        	$page->slug = $request->name;
        } else {
            $page->slug = $request->slug;
        }
        if($page->save()) {
            return redirect()->back()->withFlashSuccess("Страница добавлена");
        }
    }
    public function create()
    {
        return view('backend.pages.create');
    }
    public function edit(Page $page)
    {
        return view('backend.pages.edit', compact('page'));
    }
    public function update(Page $page, Request $request)
    {
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->body = $request->body;

        if ($page->save()) {
            return redirect()->back()->withFlashSuccess("Страница обновлена");
        }
    }
    public function delete(Page $page)
    {
        $page->delete();
        return redirect()->back()->withFlashSuccess("Страница удалена");
    }
}
