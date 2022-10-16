

<!DOCTYPE html>


<html  lang="ar" dir="rtl"    >
<head>
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3C6G5XV3C4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3C6G5XV3C4');
</script>
    
    
    @yield('metaAds')
    @isset($adds){!! $adds->atHead !!} @endisset
    <meta charset="UTF-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@isset($DataSittings){{ $DataSittings->Description }} @endisset">
    
        @if(isset($selectedContry))
   
    <meta name="keywords" content="@isset($selectedContry){{ $selectedContry->keywords }} @endisset">
    @else
 <meta name="keywords" content="@isset($DataSittings){{ $DataSittings->Keywords }} @endisset">
@endif
  
    @isset($DataSittings->photoSocialMediaLink)
    <meta name="og:image" content="{{url("/../public/uploading/". $DataSittings->photoSocialMediaLink  ."")}}">@endisset
    @isset($DataSittings->socialMidialinkden)
     <meta property="og:url" content="{{$DataSittings->socialMidialinkden}}" />@endisset
      @isset($DataSittings->socialMidiaYoutube)
     <meta property="og:url" content="{{$DataSittings->socialMidiaYoutube}}" />@endisset
     @if(isset($selectedContry))
           <meta content='{{ $selectedContry->keywords }}' name='og:Keywords' />
            @else
            <meta content='{{ $DataSittings->Keywords }}' name='og:Keywords' />
            @endif
         @isset($DataSittings->socialMidiaInstagram)
     <meta property="og:url" content="{{$DataSittings->socialMidiaInstagram}}" />@endisset
         @isset($DataSittings->socialMidiaFacebook)
     <meta property="og:url" content="{{$DataSittings->socialMidiaFacebook}}" />@endisset
         @isset($DataSittings->socialMidiaTelegram)
     <meta property="og:url" content="{{$DataSittings->socialMidiaTelegram}}" />@endisset
      @isset($DataSittings->nameWebsite)
        <meta content='{{$DataSittings->nameWebsite}}' property='og:site_name'/>@endisset
     @isset($DataSittings->linkWebsite)
     <meta content='{{$DataSittings->linkWebsite}}' property='og:url'/>@endisset
     
     <meta content='       @if(isset($DataSittings) && empty($country->title) && empty($name_company))
       {{ $DataSittings->nameWebsite }} 
       @elseif(isset($country->title) && empty($className) && empty($nameSubclass))
       {{$country->title}} 
       @elseif(isset($country->title) && isset($classNameArabic) && empty($nameSubclass))
       {{$country->title}} - {{$classNameArabic}}
         @elseif(isset($country->title) && isset($nameSubclass) && isset($classNameArabic) )
       {{$country->title}} - {{$nameSubclass}}
       @elseif(isset($name_company))
            {{$name_company}} 
       @endif ' property='og:title'/>
       <meta content='ar_AR' property='og:locale'/>
       
     @isset($DataSittings->favicon)
     <link rel="icon" type="image/x-icon" href="{{ url("/../public/upload/". $DataSittings->favicon  ."")}}">@endisset
    <link rel="stylesheet" href="url('/../public/css/style_profile.css')">
    <title>
       @if(isset($DataSittings) && empty($country->title) && empty($name_company))
       {{ $DataSittings->nameWebsite }} 
       @elseif(isset($country->title) && empty($className) && empty($nameSubclass))
       {{$country->title}} 
       @elseif(isset($country->title) && isset($classNameArabic) && empty($nameSubclass))
       {{$country->title}} - {{$classNameArabic}}
         @elseif(isset($country->title) && isset($nameSubclass) && isset($classNameArabic) )
       {{$country->title}} - {{$nameSubclass}}
       @elseif(isset($name_company))
            {{$name_company}} 
       @endif 
    </title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <!--<link rel="stylesheet" href="{{ url('/../public/css/main.css') }}">-->
    <link rel="stylesheet" href="{{ url('/../public/css/styly.css') }}">


      


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--<link rel="stylesheet" href="{{ url('/../public/css/A.style.css.pagespeed.cf.mMBCBFkmOw.css') }}">-->


<body dir="rtl">
  
    <!-- هون بداية ال navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="logo" style="background-color:#6a0808; border-radius: 100px;">
                <a class="navbar-brand" href="{{url('')}}">
                    <img src="{{url('/../public/uploading/logozooozaaa.png')}}" alt="">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <div class="div-list-ul">
                        <ul class="nav-list">
                            <li>
                                <a href="{{ url('') }}">
                                    <i class="fa-solid fa-address-book"></i>
                                    <span>الصفحة الرئيسية</span>
                                </a>
                            </li>
                                  <li>
                                        @isset($username)
                                           <a href="{{ route('createCompanywithEdit') }}">
                                    <i class="fa-solid fa-address-book"></i>
                                    <span>إضافة شركة</span>
                                </a>
                            </li>
                            @endisset
                            @empty($username)
                            <li>
                                <a href="{{ route('redirect') }}">
                                    <i class="fa-solid fa-address-book"></i>
                                    <span>إضافة شركة</span>
                                </a>
                             
                            </li>
                              @endempty
                               @isset($username)
                                 <li>
                                <a href="{{ route('showCompanywithEdit') }}">
                                    <i class="fa-solid fa-address-book"></i>
                                    <span> شركاتي</span>
                                </a>
                             
                            </li>
                            @endisset
                           
                        </ul>
                    </div>
                    <!-- قسم يساري تبع ازرار -->
                    <div class="left-nav">
                        <div class="form-btn">
                            
                     @isset($countries)
            
                <button class="btn btn-sm dropdown-toggle ed" id="bbb" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="border:1px solid #dee0e1;">
                                اختر الدولة
                </button>
                
                <div class="dropdown-menu" style="width: 110%;">
                    <ul class="list" id="drop_list">
              
                        @foreach($countries as $country)
                            <li id="eee">
                                 <img src="{{url("/../public/flags/".$country->flag."")}}" alt="{{ $country->country_name }}" >
                                <a href= "{{route('HomePageWithCountry',['linkCountry'=>$country->href]) }}" class="text-decoration-none text-dark mb-1" >
                                    {{ $country->country_name }}
                                </a>
                            </li>
                        @endforeach
               
                    </ul>
                </div>
                      @endisset       
                         
                             @isset($username)
                   
                       <div class="dropdown">
                            
                                <button class=" btn-secondary dropdown-toggle ff" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="{{url("/../public/profilePhoto/".$username->profilePhoto."")}}" class="border-radius:100% alt="">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                   
   <li><a class="dropdown-item aa" href="{{url('profileShow')}}">لوحة تحكم</a></li>
                                    <li><a class="dropdown-item aa" href="{{url('show-Company-with-Edit')}}">شركاتي </a></li>
                                    <li><a class="dropdown-item aa" href="{{route('logOutPersonal')}}">تسجيل خروج</a></li>
                                </ul>
                            </div>
                   
                   
                   <!--{{url("/../public/profilePhoto/".$username->profilePhoto."")}}-->
                   
                   
                   
                   
                   @endisset
                   @empty($username)
                                               <a href="{{route('logIn')}}" class="theme-btn secondary-btn text-decoration-none a-one-nav link-one">
                                <span>دخول</span>
                            </a>

                            <a href="{{route('registerCompany')}}" class="theme-btn primary-btn text-decoration-none a-two-nav link-two">
                                <span>حساب جديد</span>

                            </a>
                   @endempty
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- نهاية قسم navbar -->
    
     <div class="" style="margin-top: 1rem;">
            
                  <form action="{{ url('search') }}" method="POST" class="container">
            @csrf
                <!-- قسم مربع البحث -->
                <div class="d-search">
                    <input type="text" class="form-control search-main" name="search" id="exampleFormControlInput1" placeholder="بحث">
                    <button type="submit" class="btn-search">
                        بحث
                    </button>
                </div>
                </form>
                <!-- Ads قسم اعلانات -->
           
                </div>
   
                    @yield("content")


   <div class="box-main-footer">
        <footer class="container footer">
            <div class="footer-one footer-ban">
                <h4>روابط</h4>
                <ul class="footer-ul">
                        @isset($PinnedPages)
        @foreach($PinnedPages as $PinnedPage)

               
                    <li><a href="{{ route('pindPage',['pindPageHref'=>$PinnedPage->href,'id'=>$PinnedPage->id]) }}">{{ $PinnedPage->page_name }}</a></li>
                   @if($loop->iteration==4)
                  @break
                   @endif
                    @endforeach
                    @endisset
                </ul>
            </div>
            <div class="footer-two footer-ban">
                <h4>تابعنا</h4>
                <ul class="footer_ul2_amrc">
               @empty($username)
                    <li><a href="{{route('registerCompany')}}"> 
                        حساب جديد</a>
                    </li>
                
                    <li><a href="{{route('logIn')}}"> 
                        تسجيل دخول</a>
                    </li>
                    @endempty
                    @isset($username)
                    <li><a href="{{url('show-Company-with-Edit')}}"> 
                        حساب جديد</a>
                    </li>
                
                    <li><a href="{{url('show-Company-with-Edit')}}"> 
                        تسجيل دخول</a>
                    </li>
                    @endisset
              
                </ul>
            </div>
            <div class="footer-three footer-ban">
                <h4>روابط</h4>
                <ul class="footer-ul">
                                  @isset($PinnedPages)
        @foreach($PinnedPages as $PinnedPage)

                       @if($loop->iteration>4)
                         <li><a href="{{ route('pindPage',['pindPageHref'=>$PinnedPage->href,'id'=>$PinnedPage->id]) }}">{{ $PinnedPage->page_name }}</a></li>
                 @endif
                 @break($loop->iteration==8)
                 @endforeach
                 @endisset
                </ul>
            </div>
            <div class="footer-four footer-ban">
                <h4>من نحن</h4>
                <p class="content">دليل شامل للفعاليات الاقتصادية في كافة الدول العربية يشمل كافة القطاعات التجارية والصناعية والخدمية .</p>
            </div>
            
        </footer>
        <div class="social">
            <ul>
                  @isset($DataSittings->socialMidiaFacebook)
                <li><a href="{{ $DataSittings->socialMidiaFacebook }}"><i class="fab fa-facebook-f fa-2x"></i></a></li>
                 @endisset
                  @isset($DataSittings->socialMidiaTelegram)
                <li><a href="{{ $DataSittings->socialMidiaTelegram }}"><i class="fab fa-telegram fa-2x"></i></a></li>
                     @endisset
                 @isset($DataSittings->socialMidiaInstagram)
                <li><a href="{{ $DataSittings->socialMidiaInstagram }}"><i class="fab fa-instagram fa-2x"></i></a></li>
                  @endisset
                @isset($DataSittings->socialMidiaYoutube)
                <li><a href="{{ $DataSittings->socialMidiaYoutube }}"><i class="fab fa-youtube fa-2x"></i></a></li>
                @endisset
            </ul>
        </div>
        <hr style="background-color:#837777; margin-left: 8rem;
        margin-right: 8rem;">
        <div class="footer-span"><span>All rights reserved © <script>document.write(new Date().getFullYear());</script></span></div>
    </div>
    
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

               

   
             
</body>
</html>

<style>
    @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    /*.dropdown-menu[data-bs-popper] {*/
        
    /*   top: 54% !important;*/
    /*left: 62% !important;*/
        
    /*}*/
    /*.form-btn{*/
    /*    width: 374px !important;*/
    /*}*/

.ff{
     width: 44px !important;
    height: 44px !important;
}
    .ff img{
    width: 44px;
    height: 44px;
    position: relative;
    bottom: 3px !important;
    left: 8px !important;
   border-radius: 100%;
}

#eee{
    height: 35px !important;
    font-size: 14px;
    margin-right: 0.4px;
    max-width: 133px;
    margin-left: 0.1px;
       
}
.box-5:hover{
        background-color:#f8f9fa !important;
}
#eee:hover{
    background-color:#f8f9fa !important;
}
h4{
        color: #fff;
    font-size: 36px;
    margin-bottom: 28px;
}
</style>
