<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class countryCountroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
public function showCountries(){
   $Countries= countries::get();
    return view('dash-board.country',compact('Countries'));
}
public function AddCountry(){
    return view('dash-board.AddCountry'); 
}
public function actionAddCountry(Request $request)
{
    $request->validate([
        'country_name'  => 'required',
        'href'          => 'required|unique:countries,href',
        
        'keywords'         => 'required'
    ]
 
    );
if($request->FirstCountry==1)
{
    countries::select('FirstCountry')->update(['FirstCountry'=>0]);
}
else {
    $request->FirstCountry=0;
}

if($request->flag)
        {
                                       
                             $time=time();
             
                         $image = Image::make($request->file('flag')->getRealPath())->encode('webp', 100)->save(public_path('flags/'  .  $time . '.webp'));
          $newImageName = time(). '.' . $request->flag->extension();  
        }
else {
    $time=NULL;
}

    $datacountry = countries::create([
        'country_name'      => $request->input('country_name'),
        'href'              => $request->input('href'),
         'keywords'             => $request->input('keywords'),
           'title'=>$request->input('title'),
        'FirstCountry'=>$request->FirstCountry,
           'flag'=>  $time.".webp",
            'descrip'=>$request->Description,
   
    ]);


    return  redirect()->route('showCountries')
        ->with('success', 'Successfuly Added Country');
}
public function editCountry($id)
{
    $Country = countries::find($id);
    return view('dash-board.editCountry' , compact('Country'));
}
public function updateCountry(Request $request,$id)
{

    if($request->FirstCountry==1)
{
    countries::select('FirstCountry')->where('id','!=',$request->id)->update(['FirstCountry'=>0]);
}

 $flag=countries::select('flag')->where('id',$request->id)->first();

 if($flag->flag && $request->flag)

        {
                                       
                             $time=time().'.webp';
             
                         $image = Image::make($request->file('flag')->getRealPath())->encode('webp', 100)->save(public_path('flags/'  .$time ));
          $newImageName = time(). '.' . $request->flag->extension();  
        }
else if($flag->flag && $request->flag==NULL){
    $time=$flag->flag;
}
else if($flag->flag==NULL &&  $request->flag==NULL)
{ 
    $time=NULL;
    
}
        $request->validate([
            'country_name'     => 'required',
            'href'          => 'required|unique:countries,href,'.$id,
            'keywords'       => 'required',
        ]);
        if(!$request->FirstCountry)
        {
            $request->FirstCountry=0;
        }
        $country=countries::find($id)->update([
            'country_name'      => $request->input('country_name'),
            'href'              => $request->input('href'),
            'title'=>$request->input('title'),
            'keywords'             => $request->input('keywords'),
            'FirstCountry'=>$request->FirstCountry,
                 'flag'=>  $time,
            'descrip'=>$request->Description,
        ]);
      
          

        return redirect()->route('showCountries')
            ->with('success' , 'Successfully updated Data');
    }

    public function destroy($id)
    {
        $categories = countries::find($id);
        $categories->delete();
        return redirect()->route('showCountries')
            -> with('success' , 'Successfuly deleted data');
    }
   
}
