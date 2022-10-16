<?php

namespace App\Http\Controllers\User_auth;

session_start();
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User_company;
use App\Models\PinnedPages;
use Illuminate\Http\Request;
use App\Models\countries;
use App\Models\sitting;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
    
   
  
    public function setRigester(Request $request)
    {
        $Validator=$request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user_company,email',
            'password' => 'required|string|min:8',
        ],[
            'name.required'=>'الاسم مطلوب','email.required'=>'الايميل مطلوب','password.required'=>'كلمة السر مطلوبة',
            'name.string'=>'الاسم يجب أن يتألف من أحرف فقط','email.email'=>'الايميل غير صحيح','email.max'=>'الايميل يجب الا يتعدى 255 حرفا',
            'name.max'=>'الاسم يجب الا يتعدى 255 حرفا', 'password.min'=>' الحد الادنى لكلمة السر 8 أحرف',
        ]);
    
if($Validator)
{
         $User_company=User_company::create([
            'name' => $request->name,
            
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if($User_company)
        {
                $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
            $User_company=User_company::select('id')->where('name',$request->name)->where('email',$request->email)->where('password',$request->password)->first();
        
            $_SESSION['id']=$User_company->id;
            
      return redirect()->route('logIn');
        }
       
    }
    }
    public function registerCompany(){
           $countries=countries::get();
                   $DataSittings=sitting::where('id',1)->first();
        $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
        if(isset($_SESSION['id']))
        { $User_company= User_company::where('id',$_SESSION['id'])->first();
            
        }
        if( !empty($User_company))
      
        {
                            

            
          return redirect()->route('viewAddCompany');
        }
        else{
            return view('user_auth.rigester',compact('countries','PinnedPages','DataSittings'));
        }
        
    }
    
}
