<?php

namespace App\Http\Controllers\createCompany;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitting;
use App\Models\Company;
use App\Models\mainClass;
use App\Models\PinnedPages;
use App\Models\User_company;
use App\Models\subClass;
use App\Models\countries;
use App\Models\customizeUsers;

class showAddCompanyView extends Controller
{
public function viewAddCompany(){
   
               if(isset($_SESSION['id']))
        {
           
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
                   $DataSittings=sitting::where('id',1)->first();
   $PinnedPages= PinnedPages::limit(12)->get();
   $Company= Company::where('user_id',$_SESSION['id'])->first();
   $mainClasses=mainClass::select('name_mainClass')->get();
   $countries=countries::get();

        
                   
         
   $subClasses=subClass::get();
  
              if(!empty($username))
     {
   return view('dalilCompany.AddCompany',compact('Company','mainClasses','subClasses','countries','PinnedPages','username','DataSittings'));
  }
     else{
   return view('dalilCompany.AddCompany',compact('Company','mainClasses','subClasses','countries','PinnedPages','DataSittings'));
     }
}

public function viewAddCompanyWithoutSession(){

               if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
         $customizeUsers= customizeUsers::where('id',0)->first();
     $PinnedPages= PinnedPages::limit(12)->get();
       $DataSittings=sitting::where('id',1)->first();
       $mainClasses=mainClass::select('name_mainClass')->get();
   $countriess=countries::select('country_name')->get();
      $countries=countries::get();
   $subClasses=subClass::get();
   
                    if(!empty($username))
     {
      return view('dalilCompany.AddCompany',compact('mainClasses','subClasses','countriess','PinnedPages','username','DataSittings','customizeUsers','countries'));
  }
     else{
      return view('dalilCompany.AddCompany',compact('mainClasses','subClasses','countriess','PinnedPages','DataSittings','customizeUsers','countries'));
     }

}

}