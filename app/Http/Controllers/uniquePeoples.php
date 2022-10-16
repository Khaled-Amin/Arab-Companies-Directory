<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sitting;
use App\Models\uniquePeople;
use App\Models\Company;
use DB;
class uniquePeoples extends Controller
{
    
 public function  selectUniquePeople(){
     
    $uniquePeople= uniquePeople::where('id',1)->first();
     
     return view('dash-board.uniquePeople',compact('uniquePeople'));
 }
    
    public function setUniquePeople(Request $request){
     
               $insertTODatabase= DB::table('uniquePeople')->update([
'number_id2'=>$request->number_id2,
'number_id3'=>$request->number_id3,
'number_id4'=>$request->number_id4,
'number_id5'=>$request->number_id5,
'number_id6'=>$request->number_id6,
'number_id7'=>$request->number_id7,
'number_id8'=>$request->number_id8,
'number_id9'=>$request->number_id9,
'number_id10'=>$request->number_id10,
'number_id11'=>$request->number_id11,
'number_id12'=>$request->number_id12,
 'number_id13'=>$request->number_id13,

        ]);
              $array=array($request->number_id2,$request->number_id3,$request->number_id4,$request->number_id5,$request->number_id6,$request->number_id7,$request->number_id8,$request->number_id9,$request->number_id10,$request->number_id11,$request->number_id12,$request->number_id13);
for($i=0;$i<count($array);$i++)
{
    if($array[$i]==NULL)
    {
        continue;
    }
    else {
      Company::where('id',$array[$i])->where('status',1)->update(['mowasa_at'=>'موصى به']);
       
    }
        
        
}
    
         return redirect()->back()->with('msg','تم الحفظ بنجاح'); 
      
       
    
    }
    
    
}