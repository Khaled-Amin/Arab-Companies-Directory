<?php

namespace App\Http\Controllers\dalil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitting;
use App\Models\Countries;
class dalilController extends Controller
{
   public function HomePage(){
    $DataSittings=sitting::where("id",1)->first();
   $country_names= Countries::select('country_name')->get();
    
       return view('dalil.index',compact(['DataSittings','country_names']));
   }

}
