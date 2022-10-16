<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Company;
use App\Models\mainClass;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\File;

class MainClassController extends Controller
{
 
    //  for secure
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $getAllMainClass= mainClass::all();
       
        return view('dash-board.mainClass' , compact(['getAllMainClass']));
    }


    public function createMainClass(){
        
        return view('dash-board.createMainClass');
    }

// |image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:min_width=256,min_height=300,max_width=720,max_height=920', /* required|image|mimes:png,jpg,jpeg,svg,gif|max:2048 */
    public function storeMainClass(Request $request)
    {

        $request->validate([
            'name_mainClass'     => 'required',
            'href_mainClass'          => 'required|unique:mainclasses,href_mainClass',
            'keywords_mainClass'       => 'required',
            
        ]);


        if($request->hasFile('photo_mainClass')){
            $classifiedImg=$request->file('photo_mainClass');
          
            $time=time().'.webp';
                $filename = $request->photo_mainClass->getClientOriginalExtension();
                $image = Image::make($classifiedImg)->encode('webp', 100)->resize(100, 60)->save(public_path('mainClassPhotos/'  .  $time ));

            
        }
else {
    $time=NULL;
}

        $mydata=mainClass::create([
            'name_mainClass'  => $request->input('name_mainClass'),
            'href_mainClass'       => $request->input('href_mainClass'),
           
            'keywords_mainClass'    => $request->input('keywords_mainClass'),
           
            'photo_mainClass'      => $time,
        ]);
    
  
      
    
        return redirect()->route('MainClass')
        ->with('success', 'added data');
    }





    public function editMainClass($id)
    {
        $mainClasses = mainClass::find($id);
        return view('dash-board.editMainClass' , compact('mainClasses'));
    }


    public function updateMainClass(Request $request,$id)
    {
        $mainClass = mainClass::find($id);
        
        
         $photo_mainClass=mainClass::select('photo_mainClass')->where('id',$request->id)->first();
         
          if($photo_mainClass->photo_mainClass && $request->photo_mainClass)
          {
                    $time=time().'.webp';
             
                         $image = Image::make($request->file('photo_mainClass')->getRealPath())->encode('webp', 100)->resize(100, 60)->save(public_path('mainClassPhotos/'  .$time ));
          $newImageName = time(). '.' . $request->photo_mainClass->extension();  
          }
          
          else if($photo_mainClass->photo_mainClass  && $request->photo_mainClass==NULL){
    $time=$photo_mainClass->photo_mainClass;
}
  else if($photo_mainClass->photo_mainClass ==NULL &&  $request->photo_mainClass==NULL)
{ 
    $time=NULL;
    
}     

        $request->validate([
            'name_mainClass'     => 'required',
            'href_mainClass'          => 'required|unique:mainclasses,href_mainClass,'.$id,
            'keywords_mainClass'       => 'required',
           
          
        ]);

   

            $mainClass->name_mainClass = $request->name_mainClass;
            $mainClass->href_mainClass      = $request->href_mainClass;
            $mainClass->keywords_mainClass   = $request->keywords_mainClass;
            $mainClass->photo_mainClass     = $time;
            $mainClass->update();

       return redirect()->route('MainClass')
            ->with('success' , 'Successfully updated Data');
    }


    public function deleteMainClass($id)
    {
        $mainClass = mainClass::find($id);
        $destination =  str_replace('\\' , '/' ,public_path('mainClassPhotos/')).$mainClass->photo_mainClass;
        if(File::exists($destination)){
            File::delete($destination);
            $mainClass->delete();
            return  redirect()->route('MainClass')
                ->with('success' , 'Successfully Deleted Data');
        }
        $mainClass->delete();
        return  redirect()->route('MainClass')
            ->with('success' , 'Successfully Deleted Data');
    }
}

