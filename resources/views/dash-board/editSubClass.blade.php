<!--<!DOCTYPE html>-->
<!--<html lang="ar" dir="rtl">-->

<!--<head>-->
<!--    <meta charset="utf-8" />-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"-->
<!--        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">-->
<!--    </script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"-->
<!--        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">-->
<!--    </script>-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
<!--        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
<!--    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/../public/dashboard/img/apple-icon.png') }}">-->
<!--    <link rel="icon" type="image/png" href="{{ url('/../public/dashboard/img/favicon.png') }}">-->
<!--    <link rel="stylesheet" href="{{ url('/../public/css/asw.css') }}">-->
<!--    <title>-->
<!--        لوحة التحكم-->
<!--    </title>-->
    <!--     Fonts and icons     -->
<!--    <link rel="stylesheet" type="text/css"-->
<!--        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />-->
    <!-- Nucleo Icons -->
<!--    <link href="{{ url('/../public/dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />-->
<!--    <link href="{{ url('/../public/dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />-->
    <!-- Font Awesome Icons -->
<!--    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>-->
    <!-- Material Icons -->
<!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">-->
    <!-- CSS Files -->
<!--    <link id="pagestyle" href="{{ url('/../public/dashboard/css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />-->
<!--</head>-->

<!--<body class="g-sidenav-show rtl bg-gray-200">-->
<!--    <aside-->
<!--        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark"-->
<!--        id="sidenav-main">-->
<!--        <div class="sidenav-header">-->
<!--            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none"-->
<!--                aria-hidden="true" id="iconSidenav"></i>-->
<!--            <a class="navbar-brand m-0" href="#">-->
<!--                <img src="{{ url('/../public/dashboard/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">-->
<!--                <span class="me-1 font-weight-bold text-white">لوحة التحكم</span>-->
<!--            </a>-->
<!--        </div>-->
<!--        <hr class="horizontal light mt-0 mb-2">-->
<!--        <div dir="rtl" class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">-->
<!--            <ul class="navbar-nav">-->
         

<!--            </ul>-->
<!--        </div>-->
<!--    </aside>-->
 @extends('dash-board.rtl')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 ">
                     
                    </ol>
                    <h6 class="font-weight-bolder mb-0">RTL</h6>
                </nav>
        
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>

            @endif
        </div>

        @if (count($errors) > 0)

        <ul>
            @foreach ($errors->all() as $item)
                <li class="text-danger">
                    {{$item}}
                </li>
            @endforeach
        </ul>

        @endif

        <div class="row backgroundW p-4 m-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   
                    <li class="breadcrumb-item active" aria-current="page">تعديل</li>
                </ol>
            </nav>
            <form action="{{ route('updateSubClass' , $subClasses->id) }}" method="post" >
                @csrf

                <div class="col-md-12 mb-3">
                    <label for="ddlMainCategories" class="form-labell ">اسم التصنيف الرئيسي</label>
                    <select id="ddlMainCategories" name="name_mainClass" class="form-select" style="border: 1px solid #ced4da;">
                        @isset($namesMainClass)
                        @foreach($namesMainClass as $nameMainClass)
                        <option value="{{ $nameMainClass->name_mainClass }}"> {{ $nameMainClass->name_mainClass }}</option>
                        @endforeach
                        
                        @endisset
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">اسم التصنيف الفرعي</label>
                    <input type="text" name="name_subClass" value="{{$subClasses->name_subClass}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell "> رابط التصنيف الفرعي</label>
                    <input type="text" name="href_subClass" value="{{$subClasses->href_subClass}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">كلمات مفتاحية</label>
                    <input type="text" name="keywords_subClass" value="{{$subClasses->keywords_subClass}}" class="form-controll">
                </div>
            
          
          

                <div class="col-12">
                    <button type="submit" class="btn btn-dark">تحديث</button>
                </div>
            </form>
        </div>

    </main>

    {{-- sittings --}}
 
    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
  
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard/js/material-dashboard.min.js?v=3.0.2') }}"></script>
    @endsection
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
</style>
