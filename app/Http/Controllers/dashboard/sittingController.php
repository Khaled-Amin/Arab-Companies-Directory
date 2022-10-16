<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitting;
use DB;
use Image;
class sittingController extends Controller
{
   public function setSittings(Request $request){
   $validation= $request->validate([

'Description'=>"max:256",
'paginate_number' => "numeric"
    ],
    [

   'Description.max'=>'عدد الحروف لا يجب أن يتجاوز 256 حرفا ',
   
     ] );
    
    //   $name=$request->favicon->getClientOriginalName();
   
   if($request->hasFile('photoForNotHavePhoto'))
   {
       $nameFavicon=$request->file('photoForNotHavePhoto')->getClientOriginalName();
  $time='imageCompany'.time();
             
                         $image = Image::make($request->file('photoForNotHavePhoto')->getRealPath())->encode('webp', 100)->resize(224, 167)->save(public_path('upload/'  .  $time . '.webp'));
                      DB::table('sittings')->update([
                          "photoForNotHavePhoto"=> $time . '.webp',
                          ]);
   }
      if($request->hasFile('favicon'))
                       {
                           
             
                           
                           
                           
                           
  $nameFavicon=$request->file('favicon')->getClientOriginalName();
  $time=time();
             
                         $image = Image::make($request->file('favicon')->getRealPath())->encode('webp', 100)->resize(150, 150)->save(public_path('upload/'  .  $time . '.webp'));
                      DB::table('sittings')->update([
                          "favicon"=> $time . '.webp',
                          ]);
                        
                       }
                      
                           if($request->hasFile('photoSocialMediaLink'))
                       {
                           
                             $time=time();
             
                         $image = Image::make($request->file('photoSocialMediaLink')->getRealPath())->encode('webp', 100)->resize(150, 150)->save(public_path('uploading/'  .  $time . '.webp'));
                           
                           
/*   $namephotoSocialMediaLink= $request->file('photoSocialMediaLink')->getClientOriginalName();
                       $path=$request->photoSocialMediaLink->move(public_path('uploading'),$namephotoSocialMediaLink);*/
                      
                           DB::table('sittings')->update([
                          "photoSocialMediaLink"=>$time.'.webp'
                          ]);
                       }
    if($validation)
    {
      
       $insertTODatabase= DB::table('sittings')->update([
'nameWebsite'=>$request->nameWebsite,
'linkWebsite'=>$request->linkWebsite,
'Description'=>$request->Description,
'socialMidiaFacebook'=>$request->socialMidiaFacebook,
'socialMidiaTelegram'=>$request->socialMidiaTelegram,
'socialMidiaInstagram'=>$request->socialMidiaInstagram,
'socialMidiaYoutube'=>$request->socialMidiaYoutube,
"socialMidialinkden"=>$request->socialMidialinkden,
 
'Keywords'=>$request->Keywords,
'paginate_number'=>$request->paginate_number,

        ]);
       
      
       return redirect()->back()->with('msg','تم الحفظ بنجاح');
    
}
  
   
   }
   public function getDataSittings(){
    $DataSittings=sitting::where("id",1)->first();
    
    return view('dash-board.sittings',compact('DataSittings'));
}
}
