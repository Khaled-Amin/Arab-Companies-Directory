<?php

namespace App\Http\Controllers\createCompany;
session_start();
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\mainClass;
use App\Models\subClass;
use App\Models\countries;
use App\Models\city;
use App\Models\tag;
use App\Models\company_tag;
use App\Models\PinnedPages;
use Illuminate\Http\Request;
use App\Models\sitting;
use App\Models\User_company;
use App\Models\customizeUsers;
use Image;
use Illuminate\Support\Facades\File;

class createCompanywithEditUser extends Controller
{
  
    
    
    //get page show companies with can edit
    public function showCompanywithEdit()
    {
        if(isset($_SESSION['id']))
    {   
             $username=User_company::where('id',$_SESSION['id'])->first();
                   $DataSittings=sitting::where('id',1)->first();
        $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
        $showallCompany = Company::where('user_id',$_SESSION['id'])->get();
          $countries=countries::get();
         return view('dalilCompany.showCompanies', compact('showallCompany','PinnedPages','DataSittings','username','countries'));
    }
       else return redirect()->route('logIn');
    }



//get cities for js selection
    public function getCities(Request $request)
    {

         $cities = city::select('name_city')->where("name_country",$request->name_country)->get();

    return $cities;
    }
    

// الذهاب لصفحة اضافة شركة
    public function createCompanywithEdit()
    { 
            $username=User_company::where('id',$_SESSION['id'])->first();
            if($username->uniqueMember==1)
            {
       $customizeUsers= customizeUsers::where('id',1)->first();
            }
            else{
                    $customizeUsers= customizeUsers::where('id',0)->first();
            }
          
        
        $DataSittings=sitting::where('id',1)->first();
        $subClasses=subClass::get();
        $mainClasses=mainClass::get();
               
      $countriess=countries::get();
       $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
        return view('dalilCompany.AddCompanyWithEdit',compact('customizeUsers','mainClasses','countriess','subClasses','DataSittings','PinnedPages','username'));
    }



// تابع في لوحة التحكم للموافقة او رفض الشركة المضافة
 public function viewCompanyWaitting()
 {$DataSittings=sitting::where('id',1)->first();
         $showallCompany = Company::where('status',0)->get(); 
          $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
         return view('dash-board.waiting',compact('showallCompany','DataSittings','PinnedPages'));
 }
 
 
   public function toShow($id)
 {
    
         $companyWithStatusFalse = Company::find($id); 
          $showallCompany = Company::where('status',0)->get(); 
         Company::where('id',$id)->update(['status'=>1]);
        return redirect()->route('viewCompanyWaitting');
 }
 
 //تخزين الشركة في الداتا بيز
    public function storeCompanyForUser(Request $request)
    {

   
         $request->validate([
            'name_company'=>"required|max:100",
            'type_company'=>"required|",
            'name_country'=>"required|max:50",
            'city'        =>"required|max:50",
            'number_phone'=>"max:25|",
         'telephone_fix'  =>"required|max:25",
            'discreption' =>"required|max:255",
            'logo'        =>"max:255|",
            'title'       =>"required|max:255",
            'email'       =>"required|max:255|unique:companies,email",
            // 'g-recaptcha-response' => 'required|captcha'
    
        ],[
    'name_company.required'=>'أسم الشركة مطلوب','type_company.required'=>'تصنيف الشركة مطلوب','name_country.required'=>'أسم الدولة مطلوب',
    'city.required'=>'أسم المدينة مطلوب','number_phone.max'=>'رقم التلفون لا يحب أن يتعدى 25 رقماً','telephone_fix.max'=>'رقم الهاتف لا يحب أن يتعدى 25 رقماً',
    'telephone_fix.required'=>'رقم الهاتف مطلوب','title.required'=>'عنوان الشركة مطلوب','discreption.required'=>'نبذة عن الشركة مطلوب',
    'logo.max'=>'تسمية الصورة لايجب أن تتجاوز 255 حرفاً','title.max'=>'عنوان الشركة لايجب أن يتجاوز 255 حرفاً','discreption.max'=>'نبذة عن الشركة لايجب أن يتتعدى 255 حرفاً',
    'email.unique'=>'هذا الايميل موجود سابقا'
        ]);
        $name_mainClass=subClass::select('name_mainClass')->where('name_subClass', $request->type_company)->first();

        if($request->hasFile('logo')){
            $classifiedImg=$request->file('logo');
          
            $time=time();
                $filename = $classifiedImg->getClientOriginalExtension();
                $image = Image::make($classifiedImg)->encode('webp', 100)->resize(170, 170)->save(public_path('logoForCompanies/'  .  $time . '.webp'));
        }
      $namee=$request->name_company;
       $name_url= str_replace(' ','-',$namee) ;
       if($image)
       {
        $id= Company::insertGetId([
            'name_company'=>$request->name_company,
            'type_company'=>$request->type_company,
            'name_mainClass'=>$name_mainClass->name_mainClass,
            'name_country'=>$request->name_country,
            'city'=>$request->city,
            'number_phone'=>$request->number_phone,
            'telephone_fix'=>$request->telephone_fix,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube,
            'telegram'=>$request->telegram,
            'linkedin'=>$request->linkedin,
            'discreption'=>$request->discreption,
            'title'=>$request->title,
            'instagram'=>$request->instagram,
          
            'name_url'=>$name_url,
            'status'=>0,
            'user_id'=>$_SESSION['id'],
           'logo'=> $time . '.webp',
            
        ]);
    }
    else{
        $id= Company::insertGetId([
            'name_company'=>$request->name_company,
            'type_company'=>$request->type_company,
            'name_mainClass'=>$name_mainClass->name_mainClass,
            'name_country'=>$request->name_country,
            'city'=>$request->city,
            'number_phone'=>$request->number_phone,
            'telephone_fix'=>$request->telephone_fix,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube,
            'telegram'=>$request->telegram,
            'linkedin'=>$request->linkedin,
            'discreption'=>$request->discreption,
            'title'=>$request->title,
            'instagram'=>$request->instagram,
            'logo'=> $newImageName ,
            'name_url'=>$name_url,
            'status'=>0,
            'user_id'=>$_SESSION['id'],
           
            
        ]);
    }
   
      
foreach(explode(' ',$request->tag) as $tags)
{
   $tag_id= tag::insertGetId(['name_tag'=>$tags,
    
        ]);
        company_tag::create(['company_id'=>$id,'tag_id'=>$tag_id]);
}

        return  redirect()->route('showCompanywithEdit')
            ->with('success', 'Successfuly Added Country');
    }


  
// الذهاب لصفحة تعديل الشركة
    public function editCompanywithEdit($id)
    {
         $DataSittings=sitting::where('id',1)->first();

        $subClasses=subClass::get();
        $mainClasses=mainClass::get();
        $countries=countries::get();
        $Company = Company::with('tags')->find($id);

       $PinnedPages= PinnedPages::select('page_name','href','id')->limit(12)->get();
       
        $username=User_company::where('id',$_SESSION['id'])->first();
           if($username->uniqueMember==1)
            {
       $customizeUsers= customizeUsers::where('id',1)->first();
            }
            else{
                    $customizeUsers= customizeUsers::where('id',0)->first();
            }
         
        return view('dalilCompany.editCompanyForUser', compact('Company','username','mainClasses','countries','subClasses','DataSittings','PinnedPages','customizeUsers'))->with('id',$id);
    }

    public function updateCompanyForUser(Request $request, $id)
    {
        $name_mainClass=subClass::select('name_mainClass')->where('name_subClass', $request->type_company)->first();

        $companies = Company::with('tags')->find($id);
      

        $request->validate([
            'name_company'=>"required|max:100",
            'type_company'=>"required|",
            'name_country'=>"required|max:50",
            'city'        =>"required|max:50",
            'number_phone'=>"max:25|",
         'telephone_fix'  =>"required|max:25",
            'discreption' =>"required|max:255",
            'logo'        =>"max:255|",
            'title'       =>"required|max:255",
            'email'       =>"required|max:255|unique:companies,email,".$id,
            // 'g-recaptcha-response' => 'required|captcha'
        ],[
    'name_company.required'=>'أسم الشركة مطلوب','type_company.required'=>'تصنيف الشركة مطلوب','name_country.required'=>'أسم الدولة مطلوب',
    'city.required'=>'أسم المدينة مطلوب','number_phone.max'=>'رقم التلفون لا يحب أن يتعدى 25 رقماً','telephone_fix.max'=>'رقم الهاتف لا يحب أن يتعدى 25 رقماً',
    'telephone_fix.required'=>'رقم الهاتف مطلوب','title.required'=>'عنوان الشركة مطلوب','discreption.required'=>'نبذة عن الشركة مطلوب',
    'logo.max'=>'تسمية الصورة لايجب أن تتجاوز 255 حرفاً','title.max'=>'عنوان الشركة لايجب أن يتجاوز 255 حرفاً','discreption.max'=>'نبذة عن الشركة لايجب أن يتتعدى 255 حرفاً',
        ]);
        $pathImg = str_replace('\\', '/', public_path('logoForCompanies/')) . $companies->logo;

        if (File::exists($pathImg)) {
            File::delete($pathImg);
        }
         $namee=$request->name_company;
      $name_url= str_replace(' ','-',$namee) ;

        // $newImageName = time() .'-' . $request->name_product .'.'. $request->photo->extension();

        // $classifiedImg=$request->file('logo');
        //     // $filename = time(). '.' . $request->logo->extension();
        //     $time=time();
        //         $filename = $classifiedImg->getClientOriginalExtension();
                
          
        //         $image = Image::make($classifiedImg)->encode('webp', 100)->resize(170, 170)->save(public_path('logoForCompanies/'  .  $time . '.webp'));
               


        if($request->hasFile('logo')){
            $classifiedImg=$request->file('logo');
        $time=time();
        $filename = $classifiedImg->getClientOriginalExtension();
        $image = Image::make($classifiedImg)->encode('webp', 100)->resize(170, 170)->save(public_path('logoForCompanies/'  .  $time . '.webp'));
        $companies->logo         = $time . '.webp';
        $companies->update();
        }

        $companies->name_company = $request->name_company;
        $companies->type_company         = $request->type_company;
        $companies->name_country = $request->name_country;
        $companies->city         = $request->city;
        $companies->title         = $request->title;
        $companies->telephone_fix         = $request->telephone_fix;
        $companies->number_phone         = $request->number_phone;
        $companies->email         = $request->email;
        $companies->facebook         = $request->facebook;
        $companies->telegram         = $request->telegram;
        $companies->instagram         = $request->instagram;
        $companies->youtube         = $request->youtube;
        $companies->linkedin         = $request->linkedin;
        $companies->discreption         = $request->discreption;
         $companies->name_url         =  $name_url;
        $companies->name_mainClass         = $name_mainClass->name_mainClass;
       
              $companies->status=0;
        $companies->update();
     /*   return $companies->tags;*/
        
        // return explode(' ',$request->tag);
        foreach ( $companies->tags as $tags)
        {
              $yes=$companies->tags()->updateExistingPivot($id,$tags->id,false);
        }
      
      //explode(' ',$request->tag)
        // /*$company_tags=Company::with('tags')->find($id);*/
//         foreach($companies->tags as $tag)
//         { 
//             echo $tag->id;
//   /*         tag::where('id',$tag->id)->update(['name_tag'=>$tag->name_tag]);
//             company_tag::where('company_id',$id)->update(['tag_id'=>$tag->id]);*/
//         }
        
//         foreach(explode(' ',$request->tag) as $tags)
// {
//   $tag_id= tag::insertGetId(['name_tag'=>$tags,
    
//         ]);
//         company_tag::create(['company_id'=>$id,'tag_id'=>$tag_id]);
// }


        return  redirect()->route('showCompanywithEdit')
            ->with('success', 'Successfuly Added Country');
    }

    public function deleteCompanyForUser($id)
    {
        $companies = company::find($id);
        $company_tag=company_tag::where('company_id',$id)->get();
        foreach($company_tag as $comp_ta)
        {
            $comp_ta->delete();
        }
        foreach($company_tag as $tag_id)
        {
          
           $tag_get=tag::where('id',$tag_id->tag_id)->first();
          
      if($tag_get !=null)
      {
          $tag_get->delete();
      }
        }

        $destination = str_replace('\\', '/', public_path('logoForCompanies/')) . $companies->logo;

        if (File::exists($destination)) {
            File::delete($destination);
            $companies->delete();
         
            return redirect()->route('showCompanywithEdit')
                ->with('success', 'deleted data');
        }
        $companies->delete();
        return redirect()->route('showCompanywithEdit')
            ->with('success', 'deleted data');
    }
}
