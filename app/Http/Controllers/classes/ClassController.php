<?php

namespace App\Http\Controllers\classes;

 session_start(); 
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User_company;
use App\Models\Company;
use App\Models\sitting;
use App\Models\mainClass;
use App\Models\Adds;
use App\Models\PinnedPages;
use App\Models\countries;
use App\Models\subClass;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{

   public function goToClasses($nameCountry,$className){
               if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
             $country=countries::where('href',$nameCountry)->select('country_name','title')->first();
     
      $name_mainclass=mainclass::select('name_mainclass')->where('href_mainClass',$className)->first();
       $countries=countries::get();
 

      $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
      $adds=Adds::where('id',1)->first();
      $DataSittings=sitting::where('id',1)->first();
      $mainClass= mainClass::select('keywords_mainClass')->where('name_mainClass',$name_mainclass->name_mainclass)->first();
         $typeContents= subClass::select('name_subClass','href_subClass','keywords_subClass')->where('name_mainClass',$name_mainclass->name_mainclass)->get();
    $companies=Company::select('id','logo','city','discreption','name_company','name_url','views','special')->where('name_mainClass',$name_mainclass->name_mainclass)->where('name_country',$country->country_name)->where('status',1)->paginate($DataSittings->paginate_number);

              if(!empty($username))
     {
     return view('dalilCompany.showClass',compact('companies','mainClass','DataSittings','adds','PinnedPages','username','countries','country','typeContents'))->with(['className'=>$className,'nameCountry'=>$nameCountry,'classNameArabic'=>$name_mainclass->name_mainclass]);
  }
     else{
  return view('dalilCompany.showClass',compact('companies','mainClass','DataSittings','adds','PinnedPages','countries','country','typeContents'))->with(['className'=>$className ,'nameCountry'=>$nameCountry,'classNameArabic'=>$name_mainclass->name_mainclass]);
   
     }

   }
   
   
 public function  goToSubclass($nameCountry,$className,$nameSubclass){
     
    
             if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
         $countries=countries::get();
        $country=countries::where('href',$nameCountry)->select('country_name','title')->first();
        $DataSittings=sitting::where('id',1)->first();
  $name_mainclass=mainclass::select('name_mainclass')->where('href_mainClass',$className)->first();
       $name_SubClass= subClass::select('name_subClass')->where('href_subClass',$nameSubclass)->first();
     
                $typeContents= subClass::select('name_subClass','href_subClass','keywords_subClass')->where('name_mainClass',$name_mainclass->name_mainclass)->get();
         $companies=Company::select('id','logo','city','discreption','name_company','name_url','views','special')->where('type_company',$name_SubClass->name_subClass)->where('status',1)->paginate($DataSittings->paginate_number);
 $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
      
      $adds=Adds::where('id',1)->first();
      
              if(!empty($username))
     {
return view('dalilCompany.showSubClass',compact('username','companies','adds','PinnedPages','DataSittings','typeContents','country','countries'))->with(['nameSubclass'=> $name_SubClass->name_subClass,'classNameArabic'=>$name_mainclass->name_mainclass,'className'=>$className ,'nameCountry'=>$nameCountry,'href_subclass'=>$nameSubclass]);
}
else {
   return view('dalilCompany.showSubClass',compact('companies','adds','PinnedPages','DataSittings','country','countries'))->with(['nameSubclass'=> $name_SubClass->name_subClass,'classNameArabic'=>$name_mainclass->name_mainclass,'className'=>$className ,'nameCountry'=>$nameCountry,'href_subclass'=>$nameSubclass]); 

    
}
 }
 
 
 
 
 
 
public function goToFilter($nameCountry,$className){
   $name_mainclass=mainclass::select('name_mainclass')->where('href_mainClass',$className)->first();
     $country=countries::where('href',$nameCountry)->select('country_name')->first();
      $country=countries::where('href',$nameCountry)->select('country_name','title')->first();
    $cities= company::select('city')->where('name_mainClass',$name_mainclass->name_mainclass)->where('name_country',$country->country_name)->distinct()->get();
     
      $typeContents= Company::select('type_company')->where('name_mainClass',$name_mainclass->name_mainclass)->where('name_country',$country->country_name)->distinct()->get();
    return view('advancedSearch',compact('typeContents','cities','country'))->with(['nameCountry'=>$nameCountry,'className'=>$className]);
}
   
   public function HomePageCountry($nameCountry){
  
               if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
          $countries=countries::get();
 
      $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
      $adds=Adds::where('id',1)->first();
      $DataSittings=sitting::where('id',1)->first();
      $mainClasses=mainClass::get();
      $countries=countries::get();
         
         
                      if(!empty($username))
     {
return view('index',compact('countries','mainClasses','DataSittings','adds','PinnedPages','username','countries'))->with('nameCountry',$nameCountry);  }
     else{
return view('index',compact('countries','mainClasses','DataSittings','adds','PinnedPages','countries'))->with('nameCountry',$nameCountry);     }
     }
     
     
     
     
     
     public function filterData(Request $request,$className,$nameCountry)
     {
                 if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
      
        $country_name=countries::select('country_name')->where('href',$nameCountry)->first();
       
             $name_mainclass=mainclass::select('name_mainClass','href_mainClass')->where('href_mainClass',$className)->first();
       
     $cities= Company::select('city')->where('name_mainClass',$name_mainclass->name_mainClass)->where('name_country',$country_name->country_name)->distinct()->get();
     
       $typeContents= Company::select('type_company')->where('name_mainClass',$name_mainclass->name_mainClass)->where('name_country',$country_name->country_name)->distinct()->get();
    
      $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
      $adds=Adds::where('id',1)->first();
      $DataSittings=sitting::where('id',1)->first();
       $mainClass= mainClass::select('keywords_mainClass')->where('name_mainClass',$name_mainclass->name_mainClass)->first();
       $countries=countries::get();
      if(empty($request->typeContentsCheck) && empty($request->cityFilter))
      {

      return redirect()->route('goToClasses',['nameCountry'=>$nameCountry,'ClassName'=>$name_mainclass->href_mainClass]);
    // return redirect()->route('goToClasses',['nameCountry'=>$request->name_country,'ClassName'=>$className]);
       view('404 error.404');
       
      }
     
      else if(empty($request->typeContentsCheck) )
      {
         $companies= Company::select('id','logo','city','discreption','name_company','name_url','views','special')->where('name_mainClass',$name_mainclass->name_mainClass)->where('name_country',$country_name->country_name)->where('status',1)->where('city',$request->cityFilter)->paginate($DataSittings->paginate_number);

      }
      else if(empty($request->cityFilter) || isset($request->typeContentsCheck) )
      {
         $companies= Company::select('id','logo','city','discreption','name_company','name_url','views','special')->where('name_mainClass',$name_mainclass->name_mainClass)->where('name_country',$country_name->country_name)->where('status',1)->where('type_company',$request->typeContentsCheck)->paginate($DataSittings->paginate_number);

      }
      else{
         $companies= Company::select('id','logo','city','discreption','name_company','name_url','views','special')->where('name_mainClass',$name_mainclass->name_mainClass)->where('name_country',$country_name->country_name)->where('status',1)->where('type_company',$request->typeContentsCheck)->where('city',$request->cityFilter)->paginate($DataSittings->paginate_number);

      }

                if(!empty($username))
     {
return view('dalilCompany.showClass',compact('companies','mainClass','DataSittings','adds','cities','typeContents','PinnedPages','username','countries'))->with(['nameCountry'=>$request->name_country,'className'=>$request->href_mainclass]);
     }
     else{
return view('dalilCompany.showClass',compact('companies','mainClass','DataSittings','adds','cities','typeContents','PinnedPages','countries'))->with(['nameCountry'=>$request->name_country,'className'=>$request->href_mainclass]);
     }

     }
     
}
