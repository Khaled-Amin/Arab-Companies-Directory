<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Company;
use Goutte\Client;
use App\Models\number;
class webScrapping extends Controller
{
  public function  goWebscrapping()
  {
      return view('webScrap');
  }


   public function indexWebscrapping()
{
   
    
    $client = new Client();

$num=number::where('id',1)->select('num')->first();
    for($i=$num->num;$i<$num->num+8;$i++)
    {
        
    $website = $client->request('GET', "https://www.findsaudi.com/ar/CatView/252/".$i."/%D8%B4%D8%B1%D9%83%D8%A9_%D9%84%D8%A7%D9%85%D9%87_%D9%84%D9%84%D8%AA%D8%AC%D8%A7%D8%B1%D8%A9_%D9%88%D8%A7%D9%84%D9%85%D9%82%D8%A7%D9%88%D9%84%D8%A7%D8%AA.aspx");


   
  
      $companies = $website->filter(".category-view")->each(function ($nude) {
    // echo $nude->filter('.title')->text() ."<br>";
    //      echo $nude->filter('#ctl00_ctl00_cphContent_cphContent_lvLinkdCAtegories_ctrl0_lnkParent')->text() ."<br>";
    //      echo $nude->filter('#ctl00_ctl00_cphContent_cphContent_lvLinkdCAtegories_ctrl0_lnkItem')->text() ."<br>";
    //          echo $nude->filter('.city')->text() ."<br>";
    //           echo $nude->filter('.category-view-text')->text() ."<br>";
                
                     
               $namee=$nude->filter('.title')->text();
       $name_url= str_replace(' ','-',$namee) ; 
                    
                    
                $id= Company::insertGetId([
                    
                     'name_company'=>$nude->filter('.title')->text() ,
            'type_company'=>$nude->filter('#ctl00_ctl00_cphContent_cphContent_lvLinkdCAtegories_ctrl0_lnkItem')->text(),
            'name_mainClass'=>$nude->filter('#ctl00_ctl00_cphContent_cphContent_lvLinkdCAtegories_ctrl0_lnkParent')->text(),
            'name_country'=>"السعودية",
            'city'=>$nude->filter('.city')->text(),
         'discreption'=>$nude->filter('.category-view-text')->text(),
          
               'name_url'=>$name_url,
            'status'=>0,
                    ]);
       
    try {
         $company= Company::where('id',$id)->update([
               'number_phone'=>$nude->filter('.cv_contact-details:nth-child(2) > span[dir="ltr"] ')->text(),
        ]);
        
    }
    
        catch (\InvalidArgumentException $e) {
   
}

    try {
         $company= Company::where('id',$id)->update([
                'telephone_fix'=>$nude->filter('div > span[itemprop="telephone"] ')->text(),
        ]);
        
    }
    
        catch (\InvalidArgumentException $e) {
   
}

    try {
        $company= Company::where('id',$id)->update([
            'facebook'=>$nude->filter('.cv_contact-details:nth-child(4) div:nth-child(4) a')->text(),
          ]);
        
    }
        catch (\InvalidArgumentException $e) {
   
}

         try {
           $company= Company::where('id',$id)->update([
            'youtube'=>$nude->filter('.cv_contact-details:nth-child(4) div:nth-child(5) a')->text() ,
                ]);
    }
        catch (\InvalidArgumentException $e) {
   
}    
        
            // 'telegram'=>$request->telegram,
            // 'linkedin'=>$request->linkedin,
           
                    try {
           $company= Company::where('id',$id)->update([
           'title'=>$nude->filter('span[itemprop="address"] ')->text(),
                ]);
    }
        catch (\InvalidArgumentException $e) {
   
} 
           
                               try {
           $company= Company::where('id',$id)->update([
           'instagram'=>$nude->filter('.cv_contact-details:nth-child(4) div:nth-child(3) a')->text(),
                ]);
    }
        catch (\InvalidArgumentException $e) {
   
} 
           
          
         
        
});
 
 

    
/*   return $companies->text();*/
}
number::where('id',1)->update(['num'=>$num->num+8]);
}
}