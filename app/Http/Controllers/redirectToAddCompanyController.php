<?php

namespace App\Http\Controllers;
session_start();
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User_company;
use App\Models\PinnedPages;
use Illuminate\Http\Request;
use App\Models\countries;

class redirectToAddCompanyController extends Controller
{
  
  public function redirct()
  {
   if(isset($_SESSION['id']))
   {
       return redirect()->route('logIn');
   }
 
   else {
          $countries=countries::get();
            $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
      return view('dalilCompany.showChoosesAddCompany',compact('PinnedPages','countries'));
   }
 
  }
  
}