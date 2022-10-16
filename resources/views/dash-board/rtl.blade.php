
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/../public/dashboard/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('/../public/dashboard/img/favicon.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>
        لوحة التحكم    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ url('/../public/dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('/../public/dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('/../public/dashboard/css/material-dashboard.css?v=3.0.2')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('/../public/css/asw.css') }}">
</head>

<body class="g-sidenav-show rtl bg-gray-200" >
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
 
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div  dir="rtl" class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
    
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('Rtl') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text me-1">الرئيسية</span>
          </a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link " href="{{ route('sittings') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text me-1">الاعدادات العامة</span>
          </a>
        </li>
    
    
        <li class="nav-item">
          <a class="nav-link " href="{{ route('AddControl') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">person</i>
            </div>
            <span class="nav-link-text me-1">منطقة الاعلانات</span>
          </a>
        </li>
    
    
         <li class="nav-item">
          <a class="nav-link " href="{{ route('showCustomizeUsers') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">person</i>
            </div>
            <span class="nav-link-text me-1">اعدادات المستخدم</span>
          </a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link " href="{{route('main_pagess') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons-round opacity-10">table_view</i>
              </div>
              <span class="nav-link-text me-1">عرض الصفحات الثابتة</span>
          </a>
      </li>

    <li class="nav-item">
      <a class="nav-link " href="{{route('showCountries')}}">
          <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">table_view</i>
          </div>
          <span class="nav-link-text me-1">الدول</span>
      </a>
  </li>
                     <li class="nav-item">
                    <a class="nav-link " href="{{ route('city') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons-round opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text me-1">المدن</span>
                    </a>
                </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('MainClass') }}">
        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
            <i class="material-icons-round opacity-10">table_view</i>
        </div>
        <span class="nav-link-text me-1">التصنيفات الرئيسية</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link " href="{{ route('SubClass') }}">
        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
            <i class="material-icons-round opacity-10">table_view</i>
        </div>
        <span class="nav-link-text me-1">التصنيفات الفرعية</span>
    </a>
</li>
<li class="nav-item">
  <a class="nav-link " href="{{ route('companies') }}">
      <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
          <i class="material-icons-round opacity-10">table_view</i>
      </div>
      <span class="nav-link-text me-1">الشركات</span>
  </a>
</li>
          <li class="nav-item">
                    <a class="nav-link " href="{{ route('userCompany') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons-round opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text me-1">الاعضاء</span>
                    </a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link " href="{{ route('uniqueMember') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons-round opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text me-1">اعضاء مميزين</span>
                    </a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link " href="{{ route('viewCompanyWaitting') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons-round opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text me-1">قائمة الانتظار</span>
                    </a>
                </li>
   
             <li class="nav-item">
                    <a class="nav-link " href="{{ route('selectUniquePeople') }}">
                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons-round opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text me-1">شركات مميزة</span>
                    </a>
                </li>
   
      </ul>
    </div>
  
  </aside>
 @yield('content')
</body>

</html>
<style>
      @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    body{
       font-family: NotoKufiArabic !important;
    }
     .navbar-vertical.navbar-expand-xs{
        overflow:auto;
    }
       .resizeForTextarea{
resize:none;
}
</style>
