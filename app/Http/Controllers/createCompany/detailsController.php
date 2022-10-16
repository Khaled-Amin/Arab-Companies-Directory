<?php

namespace App\Http\Controllers\createCompany;
 session_start(); 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitting;
use App\Models\Adds;
use App\Models\User_company;
use App\Models\PinnedPages;
use App\Models\Company;
use App\Models\tag;
use App\Models\countries;

use App\Models\mainClass;
use App\Models\subClass;
class detailsController extends Controller
{


public function showResultTag($name_tag){
      $countries=countries::get();
      $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
        $DataSittings=sitting::where('id',1)->first();
            //   $country=countries::where('href',$nameCountry)->select('country_name','title')->first();
   $companies_id=tag::with('companies'
       )->select('id')->where('name_tag',$name_tag)->paginate($DataSittings->paginate_number);

return view('dalilCompany.showResultTag',compact('companies_id','PinnedPages','DataSittings','countries'));
   
}


public function getDetails($nameCompany,$ClassName,$id){
    


                if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
    $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
            
     $countries=countries::get();
    $adds=Adds::where('id',1)->first();
    $DataSittings=sitting::where('id',1)->first();
    $company=Company::with('tags')->where('id',$id)->first();

   $hrefCountry= countries::where('country_name',$company->name_country)->select('href')->first();
  
   $href_subclass= subClass::select('href_subClass')->where('name_subClass',$company->type_company)->first();
$nameCountry=Company::select('name_country')->where('name_company',$company->name_company)->first();
$flag=countries::select('flag')->where('country_name',$nameCountry->name_country)->first();
    $companyName=countries::where('href',$nameCompany)->first();
    $nameMainClass=mainClass::where('href_mainClass',$ClassName)->first();
// {{url("/../public/flags/".$country->flag."")}}

           $latestCompanies=Company::where('name_country',$companyName->country_name)->where('name_mainClass',$nameMainClass->name_mainClass)->where('status',1)->limit(6)->latest()->get();

   $viewsCompany=Company::select('views')->where('id',$id)->first();
   $views=$viewsCompany->views;
   $views=$views+1;
   Company::where('id',$id)->update(['views'=>$views]);
  $nameCountry= $nameCompany;

      
                 if(!empty($username))
     {
    return view('dalilCompany.viewDetails',compact('hrefCountry','company','DataSittings','adds','PinnedPages','username','latestCompanies','countries','href_subclass','flag'))->with(['nameCompany'=>$nameCompany,'ClassName'=>$ClassName,'name_company'=>$company->name_company,'nameCountry'=>$nameCountry]);
  }
     else{
    return view('dalilCompany.viewDetails',compact('hrefCountry','company','DataSittings','adds','PinnedPages','latestCompanies','href_subclass','flag','countries'))->with(['nameCompany'=>$nameCompany,'ClassName'=>$ClassName,'name_company'=>$company->name_company,'nameCountry'=>$nameCountry]);
     }
}

public function viewDetails($id,$nameCompany){

                if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }


        
                $nameCountry=Company::select('name_country')->where('id',$id)->first();
$flag=countries::select('flag')->where('country_name',$nameCountry->name_country)->first();


         $countries=countries::get();
    $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
    $adds=Adds::where('id',1)->first();
    $DataSittings=sitting::where('id',1)->first();
    $company=Company::with('tags')->where('id',$id)->first();
    $hrefCountry=countries::select('href')->where('country_name',$company->name_country)->first();
     $href_subclass= subClass::select('href_subClass')->where('name_subClass',$company->type_company)->first();
     $ClassName =mainClass::where('name_mainClass',$company->name_mainClass)->select('href_mainClass')->first();
           $latestCompanies=Company::where('name_country',$company->name_country)->where('name_mainClass',$company->name_mainClass)->where('status',1)->limit(6)->latest()->get();

    //  $hrefCountry= countries::where('country_name',$company->name_country)->select('href')->first();

     $viewsCompany=Company::select('views')->where('id',$id)->first();
   $views=$viewsCompany->views;
   $views=$views+1;
   Company::where('id',$id)->update(['views'=>$views]);

                 if(!empty($username))
     {
    return view('dalilCompany.viewDetails',compact('latestCompanies','company','DataSittings','adds','PinnedPages','username','countries','flag','hrefCountry'))->with(['nameCompany'=>$nameCompany,'name_company'=>$company->name_company,'ClassName'=>$ClassName->href_mainClass,'nameCountry'=>$hrefCountry->href,'href_subclass'=>$href_subclass]);
  }
     else{
    return view('dalilCompany.viewDetails',compact('latestCompanies','company','DataSittings','adds','PinnedPages','countries','flag','hrefCountry'))->with(['nameCompany'=>$nameCompany,'name_company'=>$company->name_company,'ClassName'=>$ClassName->href_mainClass,'nameCountry'=>$hrefCountry->href,'href_subclass'=>$href_subclass]);
     }
}

public function getDetail($id){
                if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
              $countries=countries::get();
    $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
    $adds=Adds::where('id',1)->first();
    $DataSittings=sitting::where('id',1)->first();
    $company=Company::with('tags')->where('id',$id)->first();

                      if(!empty($username))
     {
    return view('dalilCompany.viewDetails',compact('company','DataSittings','adds','PinnedPages','username'));
  }
     else{
    return view('dalilCompany.viewDetails',compact('company','DataSittings','adds','PinnedPages','countries'));
     }
}

}