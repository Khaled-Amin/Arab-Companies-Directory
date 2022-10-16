<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Company;
use App\Models\subClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\mainClass;
class subClassController extends Controller
{
 
    //  for secure
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $getAllSubClass= subClass::all();
       
        return view('dash-board.subClass' , compact(['getAllSubClass']));
    }


    public function createSubClass(){
        $namesMainClass=mainClass::select('name_mainClass')->get();
        return view('dash-board.createSubClass',compact('namesMainClass'));
    }

// |image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:min_width=256,min_height=300,max_width=720,max_height=920', /* required|image|mimes:png,jpg,jpeg,svg,gif|max:2048 */
    public function storeSubClass(Request $request)
    {

        $request->validate([
            'name_subClass'     => 'required',
            'href_subClass'          => 'required|unique:subclasses,href_subClass',
            'keywords_subClass'       => 'required',
            'name_mainClass'       => 'required',
        ]);

      
        $subClass=subClass::create([
            'name_subClass'  => $request->input('name_subClass'),
            'href_subClass'       => $request->input('href_subClass'),
           
            'keywords_subClass'    => $request->input('keywords_subClass'),
            'name_mainClass'       =>$request->input('name_mainClass')
            
        ]);

        return redirect()->route('SubClass')
        ->with('success', 'added data');
    }





    public function editSubClass($id)
    {
        $namesMainClass=mainClass::select('name_mainClass')->get();
        $subClasses = subClass::find($id);
        return view('dash-board.editSubClass' , compact('subClasses','namesMainClass'));
    }


    public function updateSubClass(Request $request,$id)
    {
        $subClass = subClass::find($id);
        $request->validate([
            'name_subClass'     => 'required',
            'href_subClass'          => 'required|unique:subclasses,href_subClass,'.$id,
            'keywords_subClass'       => 'required',
           
            'name_mainClass'         => 'required'
        ]);

     


            $subClass->name_subClass = $request->name_subClass;
            $subClass->href_subClass      = $request->href_subClass;
            $subClass->keywords_subClass   = $request->keywords_subClass;
            $subClass->name_mainClass     = $request->name_mainClass;
            $subClass->update();

        return redirect()->route('SubClass')
            ->with('success' , 'Successfully updated Data');
    }


    public function deleteSubClass($id)
    {
        $subClass = subClass::find($id);
        $subClass->delete();
        return  redirect()->route('SubClass')
            ->with('success' , 'Successfully Deleted Data');
    }
}

