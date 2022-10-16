<?php

namespace App\Http\Controllers\createCompany;
session_start();
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sitting;
use App\Models\Company;
use App\Models\company_tag;
use Image;
use App\Models\tag;
use App\Models\subClass;
class createCompany extends Controller
{
   public function AddOrUpdateCompany(Request $request){

    if(!empty($_SESSION['id']))
    {

    
    $validation= $request->validate([
/*        'g-recaptcha-response' => 'required|recaptcha',*/
        'name_company'=>"required|max:100",
        'type_company'=>"required|",
        'name_country'=>"required|max:50",
        'city'        =>"required|max:50",
        'number_phone'=>"max:25|",
     'telephone_fix'  =>"required|max:25",
        'discreption' =>"required|max:255",
     
        'title'       =>"required|max:255",
        'email'       =>"required|max:255|unique:companies,email,".$_SESSION['id'],

    ],[
'name_company.required'=>'أسم الشركة مطلوب','type_company.required'=>'تصنيف الشركة مطلوب','name_country.required'=>'أسم الدولة مطلوب',
'city.required'=>'أسم المدينة مطلوب','number_phone.max'=>'رقم التلفون لا يحب أن يتعدى 25 رقماً','telephone_fix.max'=>'رقم الهاتف لا يحب أن يتعدى 25 رقماً',
'telephone_fix.required'=>'رقم الهاتف مطلوب','title.required'=>'عنوان الشركة مطلوب','discreption.required'=>'نبذة عن الشركة مطلوب',
'logo.max'=>'تسمية الصورة لايجب أن تتجاوز 255 حرفاً','title.max'=>'عنوان الشركة لايجب أن يتجاوز 255 حرفاً','discreption.max'=>'نبذة عن الشركة لايجب أن يتتعدى 255 حرفاً',
    ]);
}
    else{
        $validation= $request->validate([
            // 'g-recaptcha-response' => 'required|recaptcha',
            'name_company'=>"required|max:100",
            'type_company'=>"required|",
            'name_country'=>"required|max:50",
            'city'        =>"required|max:50",
            'number_phone'=>"max:25|",
         'telephone_fix'  =>"required|max:25",
            'discreption' =>"required|max:255",
        
            'title'       =>"required|max:255",
            'email'       =>"required|max:255|unique:companies,email",
    
        ],[
    'name_company.required'=>'أسم الشركة مطلوب','type_company.required'=>'تصنيف الشركة مطلوب','name_country.required'=>'أسم الدولة مطلوب',
    'city.required'=>'أسم المدينة مطلوب','number_phone.max'=>'رقم التلفون لا يحب أن يتعدى 25 رقماً','telephone_fix.max'=>'رقم الهاتف لا يحب أن يتعدى 25 رقماً',
    'telephone_fix.required'=>'رقم الهاتف مطلوب','title.required'=>'عنوان الشركة مطلوب','discreption.required'=>'نبذة عن الشركة مطلوب',
    'logo.max'=>'تسمية الصورة لايجب أن تتجاوز 255 حرفاً','title.max'=>'عنوان الشركة لايجب أن يتجاوز 255 حرفاً','discreption.max'=>'نبذة عن الشركة لايجب أن يتتعدى 255 حرفاً',
        ]); 
    }
    $name_mainClass=subClass::select('name_mainClass')->where('name_subClass', $request->type_company)->first();
   

  

    if($request->hasFile('logo')){
        $classifiedImg=$request->file('logo');
          
        $time=time();
            $filename = $classifiedImg->getClientOriginalExtension();
            $image = Image::make($classifiedImg)->encode('webp', 100)->resize(170, 170)->save(public_path('logoForCompanies/'  .  $time . '.webp'));
    }
     $namee=$request->name_company;
       $name_url= str_replace(' ','-',$namee) ;

  if(isset($_SESSION['id'])  )
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
       
            'user_id'=>$_SESSION['id'],
            'name_url'=>$name_url,
            'status'=>0,
 
            
        ]);
}
else{
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
       
            'user_id'=>0,
            'name_url'=>$name_url,
            'status'=>0,
            "logo"=>$time . '.webp',
            
        ]);
    }
}
foreach(explode(' ',$request->tag) as $tags)
{
   $tag_id= tag::insertGetId(['name_tag'=>$tags,
    
        ]);
        company_tag::create(['company_id'=>$id,'tag_id'=>$tag_id]);
}

        // return  redirect()->route('showCompanywithEdit')
        //     ->with('success', 'Successfuly Added Country');
    

        return redirect()->back()->with('msg','تم الحفظ بنجاح');

    }
      
   }

