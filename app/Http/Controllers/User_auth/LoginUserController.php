<?php

namespace App\Http\Controllers\User_auth;
session_start();
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User_company;
use App\Models\PinnedPages;
use App\Models\countries;
use App\Models\sitting;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
  public function  goForgetPassword(){
         $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
      return view('user_auth.forgetPassword',compact('PinnedPages'));
  }
 public function setEmailForForgetPassword()
 {
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('zhnyft230@gmail.com')->send(new \App\Mail\myEmail($details));
   
    dd("Email is Sent.");
 }
    public function setlogIn(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            ],[
              'email.required'=>  'حقل الايميل مطلوب', 'password.required'=>  'كلمة المرور مطلوبة ',
                ]);
             $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
        $User_company= User_company::where('password',$request->password)->where('email',$request->email)->first();
if($User_company)
{
   
   
   $_SESSION['id']=$User_company->id;
   
   
   return redirect()->route('showCompanywithEdit');
}
else{
    $error="البريد الالكتروني أو كلمة المرور غير صحيحة";
    return redirect()->route('logIn')->with('error',$error);
}
    }
    public function logIn(){
          $countries=countries::get();
           $DataSittings=sitting::where('id',1)->first();
        $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
        if(isset($_SESSION['id']))
        { $User_company= User_company::where('id',$_SESSION['id'])->first();
            
        }
        if( !empty($User_company))
      
        {
                            

            
          return redirect()->route('showCompanywithEdit');
        }
        else {
            return view('user_auth.login',compact('countries','PinnedPages','DataSittings'));
        }
       
    }
    
}
