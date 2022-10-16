

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
    
    
    <!--@isset($adds){!! $adds->atHead !!} @endisset-->
    <meta charset="UTF-8">
    <meta name="description" content="
    @if(isset($country->descrip))
    {{$country->descrip}}
    
       @else
  {{ $DataSittings->Description }}  
    

  
  @endif
    " >
 
    
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
         @isset($DataSittings->socialMidiaInstagram)
     <meta property="og:url" content="{{$DataSittings->socialMidiaInstagram}}" />@endisset
         @isset($DataSittings->socialMidiaFacebook)
     <meta property="og:url" content="{{$DataSittings->socialMidiaFacebook}}" />@endisset
         @isset($DataSittings->socialMidiaTelegram)
     <meta property="og:url" content="{{$DataSittings->socialMidiaTelegram}}" />@endisset
     @isset($DataSittings->favicon)
     <link rel="icon" type="image/x-icon" href="{{ url("/../public/upload/". $DataSittings->favicon  ."")}}">@endisset
   
    <title>
       @if(isset($DataSittings) && empty($country->title))
       {{ $DataSittings->nameWebsite }} 
       @elseif(isset($country->title))
       {{$country->title}} 
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
            
                <button class="btn btn-sm dropdown-toggle" id="bbb" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="border:1px solid #dee0e1;">
                                اختر الدولة
                </button>
                
                <div class="dropdown-menu menuu width"    style="width: 110%;">
                    <ul class="list" id="drop_list">
              
                        @foreach($countries as $country)
                            <li id="eee" class="">
                                <img src="{{url("/../public/flags/".$country->flag."")}}" alt="{{ $country->country_name }}" >
                                <a href= "{{route('HomePageWithCountry',['linkCountry'=>$country->href]) }}" class="text-decoration-none text-dark mb-1" style=
                                'text-align: right;'>
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
                   
<!--                 <a href="{{route('profileShow')}}"><div class="" style="    display: grid;-->
<!--    justify-items: center;-->
<!--    position: absolute;-->
<!--    right: 42px;top: 15px;">-->
     
<!--     @empty($username->profilePhoto)       -->
<!--<i class='fa fa-user-circle' style='color:#f1bc31;font-size: 2rem;'></i>-->
<!--    @endempty-->

<!-- @isset($username->profilePhoto)-->
<!-- <img class="rounded-circle  heightPhoto hoverPhoto  "  width="50px" style="border: 2px solid;height: 2.6rem;    object-fit: cover;" src="{{url("/../public/profilePhoto/".$username->profilePhoto."")}}"> <h5 class="editButton rounded-circle ">-->

<!--                <span class="d-flex justify-content-center"> {{$username->name}}</span>-->
<!--        </div></a>-->
<!--        @endisset-->
        
     
              
              
              
              
              
              
              
                            
                         

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- نهاية قسم navbar -->
   
     <section class="section-slide">
        <!--  قسم تبع صورة وكتابة على يمين -->
        <div class="container">
            <div class="row blockk">
                <div class="col-md-6 col-sm-12 main-right">
                    <h1 class="title mb-4">
                        @isset($nameOfCountry)
                        دليل الشركات في {{$nameOfCountry->country_name}}
                        @endisset
                        @empty($nameOfCountry)
                        دليل الشركات العربية
                        @endempty
                    </h1>
                    <p class="info-content">
                         @isset($nameOfCountry)
                          هو دليل صناعي وتجاري وخدمي يشمل كافة المدن في    {{$nameOfCountry->country_name}}،فهو دليل
الأعمال المميز.
                                         <br>       <br>  
                        من مميزات الدليل
                    
                         @endisset
                           @empty($nameOfCountry)
                        هو دليل صناعي وتجاري وخدمي يشمل كافة الفعاليات في الدول العربية. 
                       <br>     <br>                  
                        من مميزات الدليل:
                          @endempty
                    <div class="content" style="text-align:right;">
                        <p>- طريقة العرض والبحث الدقيق.</p>
                        <p>- الحداثة ودقة بيانات  .</p>
                        <p>- يتيح الدليل لكافة المستخدمين إدخال شركاتهم ومنشئاتهم بشكل مجاني .</p>
                        <p>- يتميز بقوة نتائجه في محركات البحث.</p>
                      
                    </div>
                    </p>
                        @empty($username)
                    <div class="btns">
                        
                        <a href="{{route('registerCompany')}}" class="theme-btn primary-btn">
                            سجل الأن
                        </a>
                    </div>
                    @endempty
                </div>
                <div class="col-lg-6 col-sm-12 img">
                    <img src="{{url('/../public/uploading/home-slider1.svg')}}" alt="">
                </div>
            </div>
        </div>
    
    
    
    
    
        <!-- بداية جزءالاقسام -->
        <div class="mb-3" style="margin-top: 6rem;">
            
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
                <div class="container mt-2">
                    <div class="row">
                        <section class="ads">
                            <div class="fixed-sites bg-light bg-gradient text-white rounded shadow-sm bg-white rounded">
                                
                            </div>
                    </div>
                </div>
                <!-- End Ads -->
    
    <!--بداية قم الاقسام-->
    <div class="container">
         <div class="box-main">

   @isset($mainClasses)
                   @foreach($mainClasses as $mainClass)
                      
                
                    <a  title="{{ $mainClass->name_mainClass }}" href="@isset($countryAdmin){{route('goToClasses',['nameCountry'=>$countryAdmin->href,'ClassName'=>$mainClass->href_mainClass])  }}@endisset @isset($nameCountry){{route('goToClasses',['nameCountry'=>$nameCountry,'ClassName'=>$mainClass->href_mainClass])  }}@endisset" class="mt-3 box-5">
                        <div class="img">
                            <img src="{{ url("/../public/mainClassPhotos/".$mainClass->photo_mainClass."") }}" alt="{{ $mainClass->name_mainClass }}">
                        </div>
                        <p class="title">{{ $mainClass->name_mainClass }}</p>
                    </a>
      @endforeach
            @endisset
    
    </div>
    
    </div>
        <!-- نهاية جزءالاقسام -->

    <!-- جزء عرض الشركات -->
    <section class="section-part mt-4 mb-5">
        <div class="container">
            <div class="part">
                <h6>شركات مميزة</h6>
               
            </div>
            
                 <div class="box-part-main mt-4">
                     @isset($companiesUnique)
                     @foreach($companiesUnique as $company)
                <div class="child-box">
                    <a href="{{ route('viewDetails',['id'=>$company->id,'nameCompany'=>$company->name_url]) }}" class="anchor-company">
                        <div class="img">
                            <img src="{{url("/../public/logoForCompanies/".$company->logo."")}}" alt="{{$company->name_company}}" >
                        </div>
                        <p class="title">{{$company->name_company}} </p>
                    </a>
                    <hr style="background-color:red;">
                    <div class="under-hr">
                        <span class="title-span"><i class="far fa-eye"></i>{{$company->views}}</span>
                        <p>موصى به</p>
                          </div>
                    
                </div>
                @endforeach
                @endisset
            </div>
        </div>
        
    </section>
    
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
                <p class="content">دليل شامل للفعاليات الاقتصادية في كافة الدول العربية يشمل كافة القطاعات التجارية والصناعية والخدمية . </p>
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
    <!--  نهاية قسم الfooter -->
 
   
<!--     @isset($username)-->
<!--                 <a href="{{route('profileShow')}}"><div class="" style="    display: grid;-->
<!--    justify-items: center;-->
<!--    position: absolute;-->
<!--    right: 42px;top: 15px;">-->
     
<!--     @empty($username->profilePhoto)       -->
<!--<i class='fa fa-user-circle' style='color:#f1bc31;font-size: 2rem;'></i>-->
<!--    @endempty-->

<!-- @isset($username->profilePhoto)-->
<!-- <img class="rounded-circle  heightPhoto hoverPhoto  "  width="50px" style="border: 2px solid;height: 2.6rem;    object-fit: cover;" src="{{url("/../public/profilePhoto/".$username->profilePhoto."")}}"> <h5 class="editButton rounded-circle ">-->

<!--                <span class="d-flex justify-content-center"> {{$username->name}}</span>-->
<!--        </div></a>-->
<!--        @endisset-->
        
<!--      @endisset-->
      
        



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
    .section-slide{
        padding-bottom:0px !important;
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