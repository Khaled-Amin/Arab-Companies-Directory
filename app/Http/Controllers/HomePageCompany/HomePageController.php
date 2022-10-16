<?php

namespace App\Http\Controllers\HomePageCompany;

 session_start(); 
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User_company;
use App\Models\countries;
use App\Models\sitting;
use App\Models\PinnedPages;
use App\Models\mainClass;
use App\Models\Adds;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\uniquePeople;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomePageController extends Controller
{
   public function pindPagePage(){
       
      return view('pindPage.pindPage');
  }
   public function showLatestResult($nameCompany){
            if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
      $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
          $DataSittings=sitting::where('id',1)->first();
      $company= Company::where('name_company',$nameCompany)->first();
           if(!empty($username))
     {
  return view('dalilCompany.search',compact('company','PinnedPages','username','company'));     }
     else{
  return view('dalilCompany.search',compact('company','PinnedPages','company'));
     }
    
   }
   public function HomePage(){
     $companiesUnique=array();
      $uniquePeople= uniquePeople::find(1);
      $array=array($uniquePeople->number_id2,$uniquePeople->number_id3,$uniquePeople->number_id4,$uniquePeople->number_id5,$uniquePeople->number_id6,$uniquePeople->number_id7,$uniquePeople->number_id8,$uniquePeople->number_id9,$uniquePeople->number_id10,$uniquePeople->number_id11,$uniquePeople->number_id12,$uniquePeople->number_id13);
      for($i=0;$i<count($array);$i++)
      {
    
          if($array[$i]==NULL)
          {
              continue;
          }
          else {
             $company= Company::find($array[$i]);
             if($company == NULL)
             {
                 continue;
             }
             else {
                    array_push($companiesUnique,$company);
             }
  
          }
      }
      

     $PinnedPages= PinnedPages::limit(12)->get()->makeHidden(['slug','content','photo','keyword']);
        if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
        
     $DataSittings=sitting::where("id",1)->first();
     $mainClasses=mainClass::get();
     $adds= Adds::where("id",1)->first();
   $countryAdmin=countries::select('href')->where('FirstCountry',1)->first();
     $countries=countries::get();
 
     if(!empty($username))
     {
        return view('index',compact('countries','countryAdmin','mainClasses','DataSittings','adds','PinnedPages','username','companiesUnique'));  
     }
     else{
                 return view('index',compact('countries','countryAdmin','mainClasses','DataSittings','adds','PinnedPages','companiesUnique'));  

     }
   }
   public function HomePageCountry($nameCountry){
       
         $companiesUnique=array();
       
           $uniquePeople= uniquePeople::find(1);
      $array=array($uniquePeople->number_id2,$uniquePeople->number_id3,$uniquePeople->number_id4,$uniquePeople->number_id5,$uniquePeople->number_id6,$uniquePeople->number_id7,$uniquePeople->number_id8,$uniquePeople->number_id9,$uniquePeople->number_id10,$uniquePeople->number_id11,$uniquePeople->number_id12,$uniquePeople->number_id13);
      for($i=0;$i<count($array);$i++)
      {
    
          if($array[$i]==NULL)
          {
              continue;
          }
          else {
             $company= Company::find($array[$i]);
             if($company == NULL)
             {
                 continue;
             }
             else {
       
                    array_push($companiesUnique,$company);
             }
  
          }
      }
  
      
          if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
        
      $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
      $adds= Adds::where("id",1)->first();
      $DataSittings=sitting::where("id",1)->first();
      $mainClasses=mainClass::get();
      $countries=countries::get();
     $country=countries::where('href',$nameCountry)->first();
      $latestCompanies=Company::where('name_country',$country)->limit(6)->latest()->get();
$selectedContry=countries::where('country_name',$nameCountry)->first();
$nameOfCountry=countries::select('country_name')->where('href',$nameCountry)->first();
    if(!empty($username))
     {
    
      return view('index',compact('countries','mainClasses','DataSittings','adds','latestCompanies','PinnedPages','username','country','companiesUnique'))->with(['nameOfCountry'=>$nameOfCountry,'nameCountry'=>$nameCountry,'selectedContry'=>$selectedContry]);
     }
     else{
              
                 return view('index',compact('countries','mainClasses','DataSittings','adds','latestCompanies','PinnedPages','country','companiesUnique'))->with(['nameOfCountry'=>$nameOfCountry,'nameCountry'=>$nameCountry,'selectedContry'=>$selectedContry]);  

     }
     }
}
