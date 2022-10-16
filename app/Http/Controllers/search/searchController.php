<?php

namespace App\Http\Controllers\search;

session_start();
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User_company;
use App\Models\Company;
use App\Models\mainClass;
use App\Models\PinnedPages;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\sitting;
use App\Models\countries;
use Illuminate\Support\Facades\Validator;

class searchController extends Controller
{
    
public function search(Request $request){
               if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
          $countries=countries::get();
          $DataSittings=sitting::where('id',1)->first();
    $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
   $companies= Company::where('name_company','LIKE',"%{$request->search}%")->where('status',1)->get();
    if($request->search=="")
  {
      
      return view('404 error.404');
  }
   
  if(count($companies)>0)
  {
                    if(!empty($username))
     {
    return view('dalilCompany.search',compact('companies','PinnedPages','username','DataSittings','countries'));
  }
     else{
    return view('dalilCompany.search',compact('companies','PinnedPages','DataSittings','countries'));
     }
  }
  else {
                 if(isset($username))
        {
            return view('404 error.404',compact('PinnedPages','DataSittings','countries','username'));
        }
  else {
       return view('404 error.404',compact('PinnedPages','DataSittings','countries'));
  }
  }

}
}