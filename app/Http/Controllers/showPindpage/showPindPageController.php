<?php

namespace App\Http\Controllers\showPindpage;

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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class showPindPageController extends Controller
{

public function showPindPage($pindPageHref,$id){

              if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
        }
            $countries=countries::get();
    $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
    $adds= Adds::where("id",1)->first();
    $DataSittings=sitting::where("id",1)->first()->makeHidden(['keywords','nameWebsite','Description' ]);
   $pindPage= PinnedPages::where('id',$id)->first();
                             if(!empty($username))
     {
    return view('pindPage.pindPage',compact('adds','countries','DataSittings','pindPage','PinnedPages','username'));
  }
     else{
    return view('pindPage.pindPage',compact('adds','countries','DataSittings','pindPage','PinnedPages'));
     }
}


}