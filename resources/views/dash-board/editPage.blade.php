
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
<!--                <img src="{{ asset('dashboard/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">-->
<!--                <span class="me-1 font-weight-bold text-white">لوحة التحكم</span>-->
<!--            </a>-->
<!--        </div>-->
<!--        <hr class="horizontal light mt-0 mb-2">-->
<!--        <div dir="rtl" class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">-->
<!--            <ul class="navbar-nav">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link " href="{{route('Rtl')}}">-->
<!--                        <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">-->
<!--                            <i class="material-icons-round opacity-10">dashboard</i>-->
<!--                        </div>-->
<!--                        <span class="nav-link-text me-1">لوحة القيادة</span>-->
<!--                    </a>-->
<!--                </li>-->



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
                        <li class="breadcrumb-item text-sm ps-2"><a class="opacity-5 text-dark"
                                href="javascript:;">لوحات القيادة</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">RTL</li>
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
                    <li class="breadcrumb-item"><a href="{{route('main_pagess')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل</li>
                </ol>
            </nav>
            <form action="{{ route('update_Page' , $findId->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">اسم الصفحة</label>
                    <input type="text" name="page_name" value="{{$findId->page_name}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">رابط الصفحة</label>
                    <input type="text" name="href" value="{{$findId->href}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">كلمات مفتاحية</label>
                    <input type="text" name="keyword" value="{{$findId->keyword}}" class="form-controll">
                </div>

            
  <div class="col-md-12 mb-3">
                    <label><strong>محتوى الصفحة :</strong></label>
                    <textarea class="ckeditor form-controll" name="content" placeholder="ادخل محتوى الصفحة">{{$findId->content}}</textarea>
                </div>



      <label for="" class="form-labell  ">صورة </label>
                           <input type="file" name="photoForPindPage" id="photoForPindPage" class="profilePhotoInput" > 
              <div class="col-md-3 border-right">
         
            @isset($findId->photoForPindPage)
             <label for="photoForPindPage" class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/uploading/".$findId->photoForPindPage."")}}"> <h5 class="editButtonFor2 rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
            @empty($findId->photoForPindPage)
            <label for="photoForPindPage" class="cursor d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>
     </label>
     @endempty
        </div>



<!--                <div class="col-md-12 mb-3">-->
<!--                    <label for="Description" class="form-labell  ">صورة</label>-->
<!--                    <input type="file"  name="photoForPindPage" id="photoForPindPage"  class=" styleFile ">-->
<!--                    <div style="border:1px solid;    height: 2.6rem;"><label for="photoForPindPage" class="btn btn-dark d-inline-flex " style="background-color:#42424a; width:8rem; border-radius:0px;left: 1px;"> اضافة صورة</label>-->
<!--               <span class="me-3" style="position:relative;top: -6px;"> {{$findId->photoForPindPage}}</span>-->
<!--                    </div> -->
<!--                </div>-->
<!--<input type="hidden" value="{{$findId->photoForPindPage}}" name="namePhoto">-->
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
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard/js/material-dashboard.min.js?v=3.0.2') }}"></script>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
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
       .styleFile{
           position: absolute;
    display: none;
    width: 0.1px;
    }

.heightPhoto{
    height:8rem;

}
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.profilePhotoInput{
    position: absolute;
    width: 0.1px;
    display: none;
}
.cursor{
    cursor:pointer;
}


.hoverPhoto:hover +.editButton{
color:#fff;
background-color:#f1bc31;
    opacity: 0.7;
}
.editButton{
color: transparent;
    position: absolute;
    z-index:100;
    /*top: 60.7rem;*/
    width: 130px;
    height: 8rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
.editButtonFor2{
color: transparent;
     position: absolute;
    z-index:100;
    width: 130px;
    height: 8.4rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
.editButton:hover{
    color:#fff;
background-color:#42424a;
    opacity: 0.8;
}
.editButtonFor2:hover{
    color:#fff;
background-color:#42424a;
    opacity: 0.8;
}
.logoutefitor{
   position: relative;
    top: 123px;
}
@media screen And (max-width:600px)
{
    .logoutefitor{
            position: relative;
    top: 49px;
   background-color: white;
    height: 4rem;
    display: flex;
}
</style>