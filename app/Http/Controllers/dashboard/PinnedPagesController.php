<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\PinnedPages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\sitting;
use Image;
class PinnedPagesController extends Controller
{


 
    //  for secure
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexPage()
    {
        $getAllPinnedPage = PinnedPages::all();
        $DataSittings=sitting::where("id",1)->first();
        return view('dash-board.AllpinnedPage' , compact(['getAllPinnedPage','DataSittings']));
    }


    public function create(){
        $DataSittings=sitting::where("id",1)->first();
        return view('dash-board.create',compact('DataSittings'));
    }

// |image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:min_width=256,min_height=300,max_width=720,max_height=920', /* required|image|mimes:png,jpg,jpeg,svg,gif|max:2048 */
    public function store(Request $request)
    {

        $request->validate([
            'page_name'     => 'required',
            'href'          => 'required|unique:pinned_pages,href,'.$request->id,
            'keyword'       => 'required',
            'content'       => 'required',
           
        ]);

        if($request->hasFile('photoForPindPage')){
            
                              $time=time();
             
                         $image = Image::make($request->file('photoForPindPage')->getRealPath())->encode('webp', 100)->resize(150, 150)->save(public_path('uploading/'  .  $time . '.webp'));
            
         
        }
if(empty($request->photoForPindPage))
{
    $time=NULL;
}
if($time !=NULL)
{
        $mydata=PinnedPages::create([
            'page_name'  => $request->input('page_name'),
            'href'       => $request->input('href'),
            'slug'       => Str::slug($request->page_name),
            'keyword'    => $request->input('keyword'),
            'content'    => $request->input('content') ,
            'photoForPindPage'      => $time . '.webp'
        ]);

     
    }
    else {
                $mydata=PinnedPages::create([
            'page_name'  => $request->input('page_name'),
            'href'       => $request->input('href'),
            'slug'       => Str::slug($request->page_name),
            'keyword'    => $request->input('keyword'),
            'content'    => $request->input('content') ,
      
        ]);

    }
       return redirect()->route('main_pagess')
        ->with('success', 'added data');
}

    


    public function edit(PinnedPages $pinnedPages , $id)
    {
        $findId = PinnedPages::find($id);
        return view('dash-board.editPage' , compact('findId'));
    }


    public function update(Request $request, PinnedPages $pinnedPages ,$id)
    {
        $findId = PinnedPages::find($id);
        $request->validate([
            'page_name'     => 'required',
            'href'          => 'required|unique:pinned_pages,href,'.$id,
            'keyword'       => 'required',
            'content'       => 'required',
            
        ]);
        
if($request->photoForPindPage=="")
{
     $findId->page_name = $request->page_name;
            $findId->href      = $request->href;
            $findId->keyword   = $request->keyword;
            $findId->content   = $request->content;
          
            $findId->update();
}
else {
        $pathImg = str_replace('\\' , '/' ,public_path('uploading/')).$findId->photoForPindPage;
        if(File::exists($pathImg)){
            File::delete($pathImg);
        }
        
         $time=time();
             
                         $image = Image::make($request->file('photoForPindPage')->getRealPath())->encode('webp', 100)->resize(150, 150)->save(public_path('uploading/'  .  $time . '.webp'));



            $findId->page_name = $request->page_name;
            $findId->href      = $request->href;
            $findId->keyword   = $request->keyword;
            $findId->content   = $request->content;
            $findId->photoForPindPage     = $time.'.webp';
            $findId->update();
}
        return redirect()->route('main_pagess')
            ->with('success' , 'Successfully updated Data');
    }


    public function destroy(PinnedPages $pinnedPages , $id)
    {
        $findId = PinnedPages::find($id);
        $destination =  str_replace('\\' , '/' ,public_path('uploading/')).$findId->photoForPindPage;
        if(File::exists($destination)){
            File::delete($destination);
    }
            $findId->delete();
            return  redirect()->route('main_pagess')
                ->with('success' , 'Successfully Deleted Data');
        
        $findId->delete();
        return  redirect()->route('main_pagess')
            ->with('success' , 'Successfully Deleted Data');
    }
}
