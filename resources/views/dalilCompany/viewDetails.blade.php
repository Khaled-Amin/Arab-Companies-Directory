
@extends('layouts.HeaderFooter')
@section('metaAdds')
@isset($adds){!! $adds->atHead !!} @endisset
<meta charset="UTF-8">

<meta name="description" content="@isset($DataSittings){{ $DataSittings->Description }} @endisset">
<meta name="keywords" content="@isset($DataSittings){{ $DataSittings->keywords }} @endisset">
@isset($DataSittings->photoSocialMediaLink)
<meta name="og:image" content="{{ url("/../public/uploading/". $DataSittings->photoSocialMediaLink  ."")}}">@endisset
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
 <link rel="icon" type="image/x-icon" href="{{ url("/../public/upload/". $DataSittings->favicon  ."")}}">@endisset

<title>
    @isset($company)
   {{ $company->name_company }} 
   @endisset
</title>
@endsection
@section('content')



  <div calss="box-section-page">
    <section class="info-company mt-5">
        <div class="container">
            <div class="box-company">
                <div class="picture-company m">
                    
                          
                                 @isset($company->logo )
                                    <img src="{{url( "/../public/logoForCompanies/".$company->logo."")  }}" alt="{{$company->name_company}}">
                                    @endisset
                                    @empty($company->logo )
                                    
                                      <img src="{{url("/../public/upload/".$DataSittings->photoForNotHavePhoto."")  }}" alt="{{$company->name_company}}">
                                    @endempty
                    
                    <!--<img src="{{  url("/../public/logoForCompanies/".$company->logo."") }}" alt="{{ $company->name_company }}">-->
                </div>
                <div class="title-company sizee">
                    <h3>{{ $company->name_company }}</h3>
					<div class="category-company mb-3">
							@if(isset($nameCountry)&& isset($ClassName))
					
						<a href="{{route('goToClasses',['nameCountry'=>$nameCountry,'ClassName'=> $ClassName ])}}"  class="span-one delLink" ><i title="تصنيف" class="fas fa-folder-open mx-1 "></i>{{ $company->name_mainClass }}</a>
						@else
								<span class="span-one"><i title="تصنيف" class="fas fa-folder-open delLink"></i>{{ $company->name_mainClass }}</span>
						@endif
						@if(isset($href_subclass->href_subClass) && isset($nameCountry)&& isset($ClassName))
						
						<a class="delLink" href="{{route('goToSubclass',['nameCountry'=>$nameCountry,'ClassName'=>$ClassName,'nameSubclass'=>$href_subclass->href_subClass])}}"><i title="تصنيف فرعي" class="fas fa-folder-open   mx-1"></i>{{ $company->type_company}}</a>
						@else
							<span><i title="تصنيف فرعي" class="fas fa-folder-open mx-1 "></i>{{ $company->type_company}}</span>
						@endif
					</div>
                    <p class="description">
                      {!! $company->discreption !!}
                    </p>
                </div>
                
            </div>
            <div class="hrr">
			    <hr style="margin:12px 50px;">
			</div>
			
            <div class="middle-page">
				<ul>
				  
				    @isset($company->tags)
				    @if(count($company->tags)>0)
				    <i title="تاغات" class="fa-solid fa-tag"></i>
				    @foreach( $company->tags as $tags)
				    
					<li class="hover-tag">
						
						<a href="{{route('showResultTag',['name_tag'=>$tags->name_tag])}}" class="tag btn mx-2">
						    {{$tags->name_tag}}
                        </a>
					</li>
					@endforeach
				
			
						@endif
					@endisset
				
					<li>
						<div class="flag-country">
							<img src="{{url("/../public/flags/".$flag->flag."")}}" alt="{{ $company->country_name }}" >
						</div>
						<a href= "{{route('HomePageWithCountry',['linkCountry'=>$hrefCountry->href]) }}" style="color:#494949;">{{$company->name_country}}</a><span>-<a href="{{route('HomePageWithCountry',['linkCountry'=>$hrefCountry->href]) }}" style="color:#494949;">{{$company->city}}</a></span>
					</li>
					@isset( $company->number_phone )
					<li>
						<a href="tel:{{ $company->number_phone }}"><i title="اتصال" class="fa-solid fa-phone"></i>{{ $company->number_phone }}</a>
					</li>
					@endisset
					<li>
						<i class="fa-solid fa-square-share-nodes" style="font-size:20px;"></i>
						@isset( $company->facebook)
						<a  target="_blank" href="{{ $company->facebook }}"><i class="fab fa-facebook fa-xl" style="color:#1877F2;"></i></a> 
						@endisset
							@isset($company->youtube)
						<a   target="_blank" href="{{ $company->youtube }}" class="social-page"><i class="fab fa-youtube fa-xl" style="color:#CD201F;"></i></a>
							@endisset
								@isset($company->instagram )
						<a    target="_blank" href="{{ $company->instagram }}"><i class="fab fa-instagram fa-xl" style="color:#E4405F;"></i></a>
							@endisset
								@isset($company->linkedin)
						<a   target="_blank" href="{{ $company->linkedin }}"><i class="fab fa-linkedin fa-xl" style="color:#0A66C2;"></i></a>
							@endisset
					</li>
					
				</ul>
			</div>
            <!--<div class="box-pic">
                <h3 class="head-comp-slide">صور الشركة</h3>
                <div class="slider-img">
                    <div class="slide-img">
                        <img src="{{  url("/../public/logoForCompanies/".$company->logo."") }}" alt="{{ $company->name_company }}">
                    </div>
                    <div class="slide-img">
                        <img src="{{  url("/../public/logoForCompanies/".$company->logo."") }}" alt="{{ $company->name_company }}">
                    </div>
                    <div class="slide-img">
                        <img src="{{  url("/../public/logoForCompanies/".$company->logo."") }}" alt="{{ $company->name_company }}">
                    </div>
                </div>
            </div>
            -->
        </div>
    </section>



<section class="info-company mt-5 edit-info">
        <div class="container">
            <div class="boxinfo-company f">
                <div class="title-companys m">
                    <h3>شركات ننصحك بزيارتها</h3>
                    <a href="{{route('goToClasses',['nameCountry'=>$nameCountry,'ClassName'=> $ClassName ])}}" class= "text-decoration-none" >مشاهدة المزيد</a>
                </div>
            </div>
			<div class="company-tips">
			    @isset($latestCompanies)
					@foreach($latestCompanies->take(4) as $latcompany)
					<div class="child-box tips-box">
						<a href="{{ route('getDetails',['nameCountry'=>$nameCountry,'ClassName'=>$ClassName,'id'=>$latcompany->id  ]) }}" class="anchor-company">
							<div class="img">
							    
							          
                                 @isset($latcompany->logo )
                                    <img src="{{url( "/../public/logoForCompanies/".$latcompany->logo."")  }}" alt="{{$company->name_company}}">
                                    @endisset
                                    @empty($latcompany->logo )
                                    
                                      <img src="{{url("/../public/upload/".$DataSittings->photoForNotHavePhoto."")  }}" alt="{{$company->name_company}}">
                                    @endempty
							    
							    
								<!--<img src="{{url("/../public/logoForCompanies/".$latcompany->logo."")}}" alt="">-->
							</div>
							<p class="title">{{$latcompany->name_company}}</p>
						</a>
						<hr style="background-color:red;">
						<div class="under-hr">
							<span class="title-span"><i class="far fa-eye"></i>{{$latcompany->views}}</span>
							<!--<p>موصى به</p>-->
						</div>

					</div>
                    @endforeach
					@endisset
					
			</div>

        </div>
    </section>



@endsection
<style>

     @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
   
   .delLink{
       color:#494949 !important;
       text-decoration: none !important;
   }
/* .middle-page ul li .flag-country {*/
/*	width:20px !important;*/
/*	height:0px !important;*/
/*	margin-left:1rem !important;*/
/*}*/

</style>