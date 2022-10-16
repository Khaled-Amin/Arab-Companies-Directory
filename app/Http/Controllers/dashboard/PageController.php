<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $showallpages = Page::all();
        return view('dash-board.pages.allpages' , compact('showallpages'));
    }


    public function create()
    {
        return view('dash-board.pages.createpage');
    }


    public function store(Request $request)
    {
        $request->validate([
            'page_name'     => 'required',
            'href'          => 'required|unique:pages,href',
            'page_content'  =>  'required'
        ]);

        $createPages = Page::create([
            'page_name'     => $request->input('page_name'),
            'href'          => $request->input('href'),
            'page_content'  => $request->input('page_content')
        ]);

        return redirect()->route('pages.main')
            ->with('success' , 'Successfuly added data');
    }


    // public function show(Page $page , $id)
    // {
    //     $page = Page::find($id);
    //     return view('pages.detailpages' , compact('page'));
    // }


    public function edit(Page $page , $id)
    {
        $page = Page::find($id);
        return view('dash-board.pages.editpages' , compact('page'));
    }


    public function update(Request $request, Page $page , $id)
    {
        $page = Page::find($id);
        $request->validate([
            'page_name'     => 'required',
            'href'          => 'required|unique:pages,href',
            'page_content'  =>  'required'
        ]);

        $page->page_name = $request-> page_name;
        $page->href = $request-> href;
        $page->page_content = $request-> page_content;
        $page->update();

        return redirect()->route('pages.main')
            ->with('success' , 'Successfuly Updated Data');

    }


    public function destroy(Page $page , $id)
    {
        $page = Page::find($id);
        $page->delete($id);
        return redirect()->route('pages.main')
            ->with('success' , 'Successfuly Deleted Data');

    }
}
