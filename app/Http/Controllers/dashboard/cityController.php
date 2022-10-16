<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\countries;
use App\Models\city;
use App\Models\mainClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class cityController extends Controller
{
 
    //  for secure
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities= city::all();
       
        return view('dash-board.city' , compact(['cities']));
    }


    public function createCity(){
       $countries=countries::select('country_name')->get();
        return view('dash-board.createCity',compact('countries'));
    }

// |image|mimes:png,jpg,jpeg,svg,gif|max:2048|dimensions:min_width=256,min_height=300,max_width=720,max_height=920', /* required|image|mimes:png,jpg,jpeg,svg,gif|max:2048 */
    public function storeCity(Request $request)
    {

        $request->validate([
            'name_city'     => 'required',
            
           
        ]);



 $mydata=city::create([
            'name_city'  => $request->input('name_city'),
            'name_country'       => $request->input('name_country'),
           

        ]);

        return redirect()->route('city')
        ->with('success', 'added data');
    }





    public function editCity($id)
    {
         $countries=countries::select('country_name')->get();
        $city = city::find($id);
        return view('dash-board.editCity' , compact('city','countries'));
    }


    public function updateCity(Request $request,$id,city $city)
    {
        $city = city::find($id);
     


            $city->name_city = $request->name_city;
            $city->name_country      = $request->name_country;
         
         
            $city->update();

       return redirect()->route('city')
            ->with('success' , 'Successfully updated Data');
    }


    public function deleteCity($id)
    {
        $city = city::find($id);
       
            $city->delete();
            return  redirect()->route('city')
                ->with('success' , 'Successfully Deleted Data');
        

    }
}
