<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adds;
use App\Models\sitting;
use Illuminate\Support\Facades\DB;
class setAddsController extends Controller
{
public function AddControl(){
    $Adds=Adds::where('id',1)->first();
    $DataSittings=sitting::where("id",1)->first();
return view('dash-board.adds',compact(['Adds','DataSittings']));
}
public function setAdd(Request $request){
$setAdd=DB::table('adds')->update([
    "atTop"=>$request->setTop,
    "atRight"=>$request->setCenter,
    "otherSite"=>$request->otherSite,
    "atHead"=>$request->setHead,
]);
if($setAdd)
{
    return redirect()->route('AddControl')->with('msg','تم الحفظ بنجاح');
}
}
}
