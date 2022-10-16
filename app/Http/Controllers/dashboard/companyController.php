<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\mainClass;
use App\Models\subClass;
use App\Models\countries;
use App\Models\city;
use App\Models\tag;
use App\Models\company_tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
class companyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    
    
        public function searchCompany(Request $request){
         if($request->nameCompany=="")
  {
      
   $companies= Company::paginate(25);
    return view('dash-board.companies',compact('companies'));
  }
   
   
   $showallCompany= Company::where('name_company','LIKE',"%{$request->nameCompany}%")->paginate(25);

  if(count($showallCompany)>0)
  {
          
    return view('dash-board.searchCompany',compact('showallCompany'));
  }
     else{
         

    return redirect()->back()->withErrors(['errors' => 'الشركة غير موجود ']);
     }
  

}

    public function index()
    {
        $showallCompany = Company::where('status',1)->paginate(12);
        return view('dash-board.companies', compact('showallCompany'));
    }

    public function getCities(Request $request)
    {

         $cities = city::select('name_city')->where("name_country",$request->name_country)->get();

    return $cities;
    }

    public function createCompany()
    { $subClasses=subClass::get();
        $mainClasses=mainClass::get();
      $countries=countries::get();
        return view('dash-board.AddCompany',compact('mainClasses','countries','subClasses'));
    }

 public function viewCompanyWaitting()
 {
         $showallCompany = Company::where('status',0)->paginate(12); 
         return view('dash-board.waiting',compact('showallCompany'));
 }
   public function toShow($id)
 {
         $companyWithStatusFalse = Company::find($id); 
          $showallCompany = Company::where('status',0)->get(); 
         Company::where('id',$id)->update(['status'=>1]);
        return redirect()->route('viewCompanyWaitting');
 }
    public function storeCompany(Request $request)
    {

        // dd($request->all());
         $request->validate([
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
        $name_mainClass=subClass::select('name_mainClass')->where('name_subClass', $request->type_company)->first();
        if($request->logo)
        {
                                       
                             $time=time();
             
                         $image = Image::make($request->file('logo')->getRealPath())->encode('webp', 100)->resize(224, 167)->save(public_path('logoForCompanies/'  .  $time . '.webp'));
          $newImageName = time(). '.' . $request->logo->extension();  
        }
else {
    $time=NULL;
}
    
      $namee=$request->name_company;
       $name_url= str_replace(' ','-',$namee) ;
      
  if($time==NULL)
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
             'special'=> $request->special,
            'name_url'=>$name_url,
            'status'=>1
          
            
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
            'logo'=> $time.'.webp' ,
            'name_url'=>$name_url,
            'status'=>1,
            
           'special'=> $request->special
        ]);
          
      }

foreach(explode(' ',$request->tag) as $tags)
{
   $tag_id= tag::insertGetId(['name_tag'=>$tags,
    
        ]);
        company_tag::create(['company_id'=>$id,'tag_id'=>$tag_id]);
}


        return  redirect()->route('companies')
            ->with('success', 'Successfuly Added Country');
    }


    // public function show($id)
    // {
    //     $countries = Countries::find($id);
    //     return view('countries.detailcountry', compact('countries'));
    // }


    public function editCompany($id)
    {
        

        $subClasses=subClass::get();
        $mainClasses=mainClass::get();
        $countries=countries::get();
   $Company = Company::with('tags')->find($id);

        
        return view('dash-board.editCompany', compact('Company','mainClasses','countries','subClasses'))->with('id',$id);
    }

      public function updateCompany(Request $request, $id)
    {
        
        
        
         $name_mainClass=subClass::select('name_mainClass')->where('name_subClass', $request->type_company)->first();
        
                 $logo=Company::select('logo')->where('id',$id)->first();
         
          if($logo->logo==NULL && $request->logo )
          {
                    $time=time().'.webp';
                   
             
                         $image = Image::make($request->file('logo')->getRealPath())->encode('webp', 100)->resize(224, 167)->save(public_path('logoForCompanies/'  .$time ));
          $newImageName = time(). '.' . $request->logo->extension();  
          }
          else if($logo->logo && $request->logo)
          {
                  $time=time().'.webp';
                  
                         $image = Image::make($request->file('logo')->getRealPath())->encode('webp', 100)->resize(224, 167)->save(public_path('logoForCompanies/'  .$time ));
          $newImageName = time(). '.' . $request->logo->extension();  
          }
          
          else if($logo->logo  && $request->logo==NULL){
    $time=$logo->logo;
}
  else if($logo->logo ==NULL &&  $request->logo==NULL)
{ 
    $time=NULL;
    
}     
        
       
        $companies = Company::find($id);
        
        
        $tags_id=company_tag::where('company_id',$companies->id)->get();
        if(count($tags_id)>0)
        {
foreach($tags_id as  $tag_id )
{
    tag::where('id',$tag_id)->delete();
}
company_tag::where('company_id',$companies->id)->delete();
}



                foreach(explode(' ',$request->tag) as $tags)
{
    
     $tag_id= tag::insertGetId(['name_tag'=>$tags,
    
        ]);
        company_tag::create(['company_id'=>$id,'tag_id'=>$tag_id]);
}
    
    // $array_tags=array();
    // array_push($array_tags,$tags);



     
        
        
        

         $namee=$request->name_company;
       $name_url= str_replace(' ','-',$namee) ;

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
           $companies->special  = $request->special;
        $companies->name_mainClass         = $name_mainClass->name_mainClass;
        $companies->logo=  $time;
        $companies->special=  0;
        $companies->update();
 

        return  redirect()->route('companies')
            ->with('success', 'Successfuly Added Country');
    }
    public function deleteCompany($id)
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
        if(isset($companies->logo))
        {
        $destination = str_replace('\\', '/', public_path('logoForCompanies/')) . $companies->logo;
}
        if (File::exists($destination)) {
            File::delete($destination);
            $companies->delete();
            return redirect()->route('companies')
                ->with('success', 'deleted data');
        }
        $companies->delete();
        return redirect()->route('companies')
            ->with('success', 'deleted data');
    }
}
