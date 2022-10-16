<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sites;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\App;

class SitesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $showSites = Sites::all();
        return view('dash-board.sites.allDataSites' , compact('showSites'));
    }
    public function create()
    {
        $mycat = Category::select('id','category_name')->where('parent_id' , 0)->get();
        // $mycat = Category::all();
        return view('dash-board.sites.createSites' , ["mycat" => $mycat]);
    }
    public function supCate(Request $request){
        $parent_id = $request->cat_id;
        // dd($parent_id);
        $supcategories = Category::where('id' , $parent_id)
                                ->with('supcategories')
                                ->get();
        return response()->json(['supcategories' => $supcategories]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'site_name'     => 'required',
            'href'          => 'required|unique:sites,href',
            'title'         => 'required',
            'countries'     => 'required',
            'keyword'       => 'required',
            'tags'          => 'required',
            'facebook'      => 'required',
            'twitter'       => 'required',
            'instagram'     => 'required',
            'snapchat'      => 'required',
            'youtube'       => 'required',
            'telegram'      => 'required',
            'android'       => 'required',
            'ios'           => 'required'
        ]);
        $mydataSites = Sites::create([
            'site_name'     =>$request->input('site_name'),
            'href'          =>$request->input('href'),
            'title'         =>$request->input('title'),
            'countries'     =>$request->input('countries'),
            'keyword'       =>$request->input('keyword'),
            'tags'          =>$request->input('tags'),
            'facebook'      =>$request->input('facebook'),
            'twitter'       =>$request->input('twitter'),
            'instagram'     =>$request->input('instagram'),
            'snapchat'      =>$request->input('snapchat'),
            'youtube'       =>$request->input('youtube'),
            'telegram'      =>$request->input('telegram'),
            'android'       =>$request->input('android'),
            'ios'           =>$request->input('ios'),
            'category_id'   =>$request->category ? $request->category : 0
        ]);
        return redirect()->route('sites.main')
            ->with('success' , 'Successfuly added data');
    }
    // public function show($id)
    // {
    //     $sites = Sites::find($id);
    //     return view('dash-board.sites.showdetailsSites' , compact('sites'));
    // }
    public function edit(Sites $sites,$id)
    {
        $obj = new Sites();
        $sites = $obj->find($id);
        $categories = Category::where('parent_id',0)->get();

        return view('dash-board.sites.editSites' , compact('sites' , 'categories'));
    }
    public function update(Request $request, $id)
    {
        $sites = Sites::find($id);
        // dd($sites);
        $request->validate([
            'site_name'     => 'required',
            'href'          => 'required|unique:sites,href',
            'title'         => 'required',
            'countries'     => 'required',
            'keyword'       => 'required',
            'tags'          => 'required',
            'facebook'      => 'required',
            'twitter'       => 'required',
            'instagram'     => 'required',
            'snapchat'      => 'required',
            'youtube'       => 'required',
            'telegram'      => 'required',
            'android'       => 'required',
            'ios'           => 'required'
        ]);
            $sites->site_name = $request->site_name;
            $sites->href      = $request->href;
            $sites->title     = $request->title;
            $sites->countries = $request->countries;
            $sites->keyword   = $request->keyword;
            $sites->tags      = $request->tags;
            $sites->facebook  = $request->facebook;
            $sites->twitter   = $request->twitter;
            $sites->instagram = $request->instagram;
            $sites->snapchat  = $request->snapchat;
            $sites->youtube   = $request->youtube;
            $sites->telegram  = $request->telegram;
            $sites->android   = $request->android;
            $sites->ios       = $request->ios;
            $sites->update();
        return redirect()->route('sites.main')
            ->with('success' , 'Successfuly updated data');

    }
    public function destroy(Sites $sites, $id)
    {
        $sites = Sites::find($id);
        $sites->delete();

        return redirect()->route('sites.main')
            ->with('success' , 'Successfuly deleted data');
    }
}
