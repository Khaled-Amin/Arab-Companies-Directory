<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\User_company;
use App\Models\Company;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use App\Models\customizeUsers;

class userController extends Controller
{
    public function showUsers(){
   $users= User_company::where('uniqueMember',0)->paginate(25);
    return view('dash-board.user',compact('users'));
}
    public function destroy($id)
    {
        $user = User_company::find($id);
        $company=Company::where('user_id',$id);
        $user->delete();
        $company->delete();
        return redirect()->route('userCompany')
            -> with('success' , 'Successfuly deleted data');
    }
    
    
    
    public function searchUser(Request $request){
         if($request->name=="")
  {
      
   $users= User_company::paginate(25);
    return view('dash-board.user',compact('users'));
  }
   
   
   $user= User_company::where('name','LIKE',"%{$request->name}%")->paginate(25);

  if(count($user)>0)
  {
          
    return view('dash-board.searchUser',compact('user'));
  }
     else{
         
//   $users= User_company::paginate(25);
    return redirect()->back()->withErrors(['errors' => 'أسم العضو غير موجود ']);
     }
  

}
    public function goToUniqueMember($id){
        User_company::where('id',$id)->update(['uniqueMember'=>1]);
        //   $users= User_company::where('uniqueMember',0)->paginate(25);
    return redirect()->route('userCompany');
    }
    
    public function uniqueMember(){
          $user= User_company::where('uniqueMember',1)->paginate(25);
              return view('dash-board.uniqueMember',compact('user'));
    }
    
    public function showCustomizeUsers(){
      $customizeUsers1=  customizeUsers::where('id',0)->first();
       $customizeUsers2=  customizeUsers::where('id',1)->first();
              $customizeUsers3=  customizeUsers::where('id',2)->first();
                     $customizeUsers4=  customizeUsers::where('id',3)->first();
        return view('dash-board.customizeInputUser',compact('customizeUsers1','customizeUsers2','customizeUsers3','customizeUsers4'));
    }
    
    
        
    public function customizeUsers1(Request $request){
     customizeUsers::where('id',0)->update([
         'nameCompany'=>$request->nameCompany,
          'customizeCompany'=>$request->customizeCompany,
           'country'=>$request->country,
            'city'=>$request->city,
             'telephone'=>$request->telephone,
              'phone'=>$request->phone,
               'email'=>$request->email,
                'facebook'=>$request->facebook,
                 'instagram'=>$request->instagram,
                  'youtube'=>$request->youtube,
                 'telegram'=>$request->telegram,
                  'linkeden'=>$request->linkeden,
                   'discreption'=>$request->discreption,
                   'icon'=>$request->icon,
                   'tag'=>$request->tag,
                   'title'=>$request->title,
         ]);
         return redirect()->back();
    }
       public function customizeUsers2(Request $request){
           customizeUsers::where('id',1)->update([
         'nameCompany'=>$request->nameCompany_msh,
          'customizeCompany'=>$request->customizeCompany_msh,
           'country'=>$request->country_msh,
            'city'=>$request->city_msh,
             'telephone'=>$request->telephone_msh,
              'phone'=>$request->phone_msh,
               'email'=>$request->email_msh,
                'facebook'=>$request->facebook_msh,
                 'instagram'=>$request->instagram_msh,
                  'youtube'=>$request->youtube_msh,
                 'telegram'=>$request->telegram_msh,
                  'linkeden'=>$request->linkeden_msh,
                   'discreption'=>$request->discreption_msh,
                   'icon'=>$request->icon_msh,
                   'tag'=>$request->tag_msh,
                   'title'=>$request->title_msh,
         ]);
           return redirect()->back();
    }
           public function customizeUsers3(Request $request){
           customizeUsers::where('id',2)->update([
         'nameCompany'=>$request->nameCompany_msh,
          'customizeCompany'=>$request->customizeCompany_msh,
           'country'=>$request->country_msh,
            'city'=>$request->city_msh,
             'telephone'=>$request->telephone_msh,
              'phone'=>$request->phone_msh,
               'email'=>$request->email_msh,
                'facebook'=>$request->facebook_msh,
                 'instagram'=>$request->instagram_msh,
                  'youtube'=>$request->youtube_msh,
                 'telegram'=>$request->telegram_msh,
                  'linkeden'=>$request->linkeden_msh,
                   'discreption'=>$request->discreption_msh,
                   'icon'=>$request->icon_msh,
                   'tag'=>$request->tag_msh,
                   'title'=>$request->title_msh,
         ]);
           return redirect()->back();
    }
    
               public function customizeUsers4(Request $request){
           customizeUsers::where('id',3)->update([
         'nameCompany'=>$request->nameCompany_msh,
          'customizeCompany'=>$request->customizeCompany_msh,
           'country'=>$request->country_msh,
            'city'=>$request->city_msh,
             'telephone'=>$request->telephone_msh,
              'phone'=>$request->phone_msh,
               'email'=>$request->email_msh,
                'facebook'=>$request->facebook_msh,
                 'instagram'=>$request->instagram_msh,
                  'youtube'=>$request->youtube_msh,
                 'telegram'=>$request->telegram_msh,
                  'linkeden'=>$request->linkeden_msh,
                   'discreption'=>$request->discreption_msh,
                   'icon'=>$request->icon_msh,
                   'tag'=>$request->tag_msh,
                   'title'=>$request->title_msh,
         ]);
           return redirect()->back();
    }
    
    
}