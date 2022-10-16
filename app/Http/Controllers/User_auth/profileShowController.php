<?php

namespace App\Http\Controllers\User_auth;
session_start();
use App\Models\User_company;
use App\Models\PinnedPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitting;
use App\Models\Company;
use App\Models\subClass;
use Image;
class profileShowController extends Controller
{
    
    public function logOutPersonal(){
        session_destroy();
        return redirect()->route('HomePage');
    }
    public function logOutProfile(){
        session_destroy();
        return redirect()->route('HomePage');
    }
    
    public function editData()
    {
    
       $DataSittings=sitting::where('id',1)->first();
            $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
       $user=User_company::where('id',$_SESSION['id'])->first();
                if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
             return view('dalilCompany.editProfile',compact('user','PinnedPages','username'));
        }
        else{
        return view('dalilCompany.editProfile',compact('user','PinnedPages'));
    }}
    
    public function profileShow(){
   
           $DataSittings=sitting::where('id',1)->first();
                  $user=User_company::where('id',$_SESSION['id'])->first();
            $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
               if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
                return view('dalilCompany.profile',compact('user','PinnedPages','username'));
        }
        else{
        return view('dalilCompany.profile',compact('user','PinnedPages'));
        }
    }
      public function show_my_company(){
      
            $DataSittings=sitting::where('id',1)->first();
            $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
             $user=User_company::where('id',$_SESSION['id'])->first();
                
            $mycompanies=Company::where('user_id',$user->id)->get();
                     if(isset($_SESSION['id']))
        {
            $username=User_company::where('id',$_SESSION['id'])->first();
               return view('dalilCompany.myCompaniesProfile',compact('user','PinnedPages','mycompanies','username'));
            
        }
        else {
                return view('dalilCompany.myCompaniesProfile',compact('user','PinnedPages','mycompanies'));
        }
          
      }
    
    
   public function AddOrUpdateUser(Request $request){
       if($request->password== $request->repassword)
       {
    $validation= $request->validate([
   'name'=>'required',
   'password'=>'required|unique:user_company,password,'.$_SESSION['id'],
        'email'       =>"required|max:255|unique:user_company,email,".$_SESSION['id'],
         'profilePhoto'=>'mimes:png,jpg,jpeg,svg,gif'
       

    ],[
'name.required'=>'أسم  مطلوب',

    ]);
           if($request->hasFile('profilePhoto')){
            $classifiedImg=$request->file('profilePhoto');
          
            $time=time();
                $filename = $classifiedImg->getClientOriginalExtension();
               
                $image = Image::make($classifiedImg)->encode('webp', 100)->resize(150, 150)->save(public_path('profilePhoto/'  .  $time . '.webp'));
        }

/*    if($request->hasFile('profilePhoto')){
        $newImageName = time(). '.' . $request->profilePhoto->extension();
        $request->profilePhoto->move(public_path("profilePhoto") , $newImageName);
    }*/
 

$insertTODatabase= User_company::updateOrCreate(['id'=>$_SESSION['id']],[
            'name'=>$request->name,
            'email'=>$request->email,
        'password'=>$request->password,
            'profilePhoto'=>$time.".webp",
            
        ]);


        return redirect()->back()->with('msg','تم الحفظ بنجاح');

   }
   else {
      return redirect()->back()->with('msg',   ' تأكيد كلمة السر غير متطابق' );
   }
   
   } 
   
   
   
}
