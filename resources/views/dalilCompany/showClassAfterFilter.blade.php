@extends('layouts.HeaderFooter')
@section('metaAdds')
@isset($adds){!! $adds->atHead !!} @endisset
<meta charset="UTF-8">
<meta name="description" content="@isset($DataSittings){{ $DataSittings->Description }} @endisset">
<meta name="keywords" content="@isset($mainClass){{ $mainClass->keywords_mainClass }} @endisset">
@isset($DataSittings->photoSocialMediaLink)
<meta name="og:image" content="{{asset("uploading/". $DataSittings->photoSocialMediaLink  ."")}}">@endisset
@isset($DataSittings->socialMidialinkden)
 <meta property="og:url" content="{{$DataSittings->socialMidialinkden}}" />@endisset
  @isset($DataSittings->socialMidiaYoutube)
 <meta property="og:url" content="{{$DataSittings->socialMidiaYoutube}}" />@endisset
     @isset($DataSittings->socialMidiaInstagram)
 <meta property="og:url" content="{{$DataSittings->socialMidiaInstagram}}" />@endisset
     @isset($DataSittings->socialMidiaFacebook)
 <meta property="og:url" content="{{$DataSittings->socialMidiaFacebook}}" />@endisset
     @isset($DataSittings->socialMidiaTelegram)
 <meta property="og:url" content="{{$DataSittings->socialMidiaTelegram}}" />@endisset
 @isset($DataSittings->favicon)
 <link rel="icon" type="image/x-icon" href="{{ asset("upload/". $DataSittings->favicon  ."")}}">@endisset

<title>
    @isset($DataSittings){{ $DataSittings->nameWebsite }} @endisset
</title>
@endsection
@section('content')
    <section class="section-part mt-4 mb-5">
                <div class="container">
                    <div class="part">
                        <h6>قسم خدمات</h6>
                        <div class="btns" >
                                  <a href="{{route('goToFilter',['nameCountry'=>$nameCountry,'className'=>$className ])}}" class="theme-btn primary-btn btn-part" target="">
                                بحث متقدم
                            </a>
                        </div>
                    </div>
                    
                    <div class="box-part-main" id="city" >
    @isset($companies)
 
    @foreach ($companies as $company)
      @isset($company->mowasa_at)
    
         
       
                        <div class="child-box">
                            <a href="{{ route('getDetails',['nameCountry'=>$nameCountry,'ClassName'=>$className,'id'=>$company->id  ]) }}" class="anchor-company">
                                <div class="img">
                                 @isset($company->logo)
                                    <img src="{{url( "/../public/logoForCompanies/".$company->logo."")  }}" alt="{{$company->name_company}}">
                                    @endif
                                    @empty($company->logo)
                                      <img src="{{url( "/../public/upload/".$DataSittings->photoForNotHavePhoto."")  }}" alt="{{$company->name_company}}">
                                    @endempty
                                </div>
                                <p class="title">{{$company->name_company  }}</p>
                            </a>
                            <hr style="background-color:red;">
                            <div class="under-hr">
                                <span class="title-span"><i class="far fa-eye"></i>{{$company->views  }}</span>
                                    <!--@isset($company->mowasa_at)-->
                                <p>{{$company->mowasa_at}}</p>
                                <!--@endisset-->
                            </div>
                            
                        </div>
                       
    
    

      @endisset
      
        @endforeach
  
            @foreach ($companies as $company)
    
@empty($company->mowasa_at)
   
    
            
                        <div class="child-box">
                            <a href="{{ route('getDetails',['nameCountry'=>$nameCountry,'ClassName'=>$className,'id'=>$company->id  ]) }}" class="anchor-company">
                                <div class="img">
                                    <img src="{{url( "/../public/logoForCompanies/".$company->logo."")  }}" alt="{{$company->name_company}}">
                                </div>
                                <p class="title">{{$company->name_company  }}</p>
                            </a>
                            <hr style="background-color:red;">
                            <div class="under-hr">
                                <span class="title-span"><i class="far fa-eye"></i>{{$company->views  }}</span>
                                    <!--@isset($company->mowasa_at)-->
                                <p></p>
                                <!--@endisset-->
                            </div>
                            
                        </div>
    
     @endempty

        @endforeach
    @endisset
    </div>
<div class="mt-3 pagin-dept pagination  ">{{ $companies->links() }} </div>
</div>

</section>



@endsection


<style>
        @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
   
</style>



