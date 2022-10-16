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
      


<!--            </ul>-->
<!--        </div>-->
<!--    </aside>-->
 @extends('dash-board.rtl')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
       
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
            <form action="{{ route('updateMainClass' , $mainClasses->id) }}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">اسم التصنيف الرئيسي</label>
                    <input type="text" name="name_mainClass" value="{{$mainClasses->name_mainClass}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">رابط التصنيف</label>
                    <input type="text" name="href_mainClass" value="{{$mainClasses->href_mainClass}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">كلمات مفتاحية</label>
                    <input type="text" name="keywords_mainClass" value="{{$mainClasses->keywords_mainClass}}" class="form-controll">
                </div>
              
              
                
                    <label for="" class="form-labell  ">صورة</label>
                     <input type="file" name="photo_mainClass" id="photo_mainClass" class="profilePhotoInput" > 
              <div class="col-md-3 border-right">
           
            @isset($mainClasses->photo_mainClass)
             <label for="photo_mainClass" class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/mainClassPhotos/".$mainClasses->photo_mainClass."")}}"> <h5 class="editButton rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
     <!--       @empty($DataSittings->favicon)-->
     <!--       <label for="profilePhoto" class="cursor d-flex justify-content-center">-->
     <!--       <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>-->
     <!--</label>-->
     <!--@endempty-->
        </div>
              
              
                
   <!--<div class="col-md-12 mb-3">-->
   <!--                 <label for="Description" class="form-labell  ">صورة</label>-->
   <!--                 <input type="file"  name="photo_mainClass" id="photoForPindPage"  class=" styleFile ">-->
   <!--                 <div style="border:1px solid;    height: 2.6rem;"><label for="photoForPindPage" class="btn btn-dark d-inline-flex " style="background-color:#42424a; width:8rem; border-radius:0px;left: 1px;"> اضافة صورة</label>-->
   <!--            <span class="me-3" style="position:relative;top: -6px;">{{$mainClasses->photo_mainClass}}</span>-->
   <!--                 </div> -->
   <!--             </div>-->
          
   <!--       <input type="hidden" value="{{$mainClasses->photo_mainClass}}" name="namePhoto">-->

                <div class="col-12">
                    <button type="submit" class="btn btn-dark">تحديث</button>
                </div>
            </form>
        </div>

    </main>

    <!--{{-- sittings --}}-->
    <!--<div class="fixed-plugin">-->
    <!--    <a class="fixed-plugin-button text-white position-fixed px-3 py-2 bg-dark">-->
    <!--        <i class="material-icons py-2">settings</i>-->
    <!--    </a>-->
    <!--    <div class="card shadow-lg">-->
    <!--        <div class="card-header pb-0 pt-3">-->
    <!--            <div class="float-end">-->
    <!--                <h5 class="mt-3 mb-0">Material UI Configurator</h5>-->
    <!--                <p>See our dashboard options.</p>-->
    <!--            </div>-->
    <!--            <div class="float-start mt-4">-->
    <!--                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">-->
    <!--                    <i class="material-icons">clear</i>-->
    <!--                </button>-->
    <!--            </div>-->
                <!-- End Toggle Button -->
    <!--        </div>-->
    <!--        <hr class="horizontal dark my-1">-->
    <!--        <div class="card-body pt-sm-3 pt-0">-->
                <!-- Sidebar Backgrounds -->
    <!--            <div>-->
    <!--                <h6 class="mb-0">Sidebar Colors</h6>-->
    <!--            </div>-->
    <!--            <a href="javascript:void(0)" class="switch-trigger background-color">-->
    <!--                <div class="badge-colors my-2 text-end">-->
    <!--                    <span class="badge filter bg-gradient-primary active" data-color="primary"-->
    <!--                        onclick="sidebarColor(this)"></span>-->
    <!--                    <span class="badge filter bg-gradient-dark" data-color="dark"-->
    <!--                        onclick="sidebarColor(this)"></span>-->
    <!--                    <span class="badge filter bg-gradient-info" data-color="info"-->
    <!--                        onclick="sidebarColor(this)"></span>-->
    <!--                    <span class="badge filter bg-gradient-success" data-color="success"-->
    <!--                        onclick="sidebarColor(this)"></span>-->
    <!--                    <span class="badge filter bg-gradient-warning" data-color="warning"-->
    <!--                        onclick="sidebarColor(this)"></span>-->
    <!--                    <span class="badge filter bg-gradient-danger" data-color="danger"-->
    <!--                        onclick="sidebarColor(this)"></span>-->
    <!--                </div>-->
    <!--            </a>-->
                <!-- Sidenav Type -->
    <!--            <div class="mt-3">-->
    <!--                <h6 class="mb-0">Sidenav Type</h6>-->
    <!--                <p class="text-sm">Choose between 2 different sidenav types.</p>-->
    <!--            </div>-->
    <!--            <div class="d-flex">-->
    <!--                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"-->
    <!--                    onclick="sidebarType(this)">Dark</button>-->
    <!--                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"-->
    <!--                    onclick="sidebarType(this)">Transparent</button>-->
    <!--                <button class="btn bg-gradient-dark px-3 mb-2 me-2" data-class="bg-white"-->
    <!--                    onclick="sidebarType(this)">White</button>-->
    <!--            </div>-->
    <!--            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>-->
                <!-- Navbar Fixed -->
    <!--            <div class="mt-3 d-flex">-->
    <!--                <h6 class="mb-0">Navbar Fixed</h6>-->
    <!--                <div class="form-check form-switch me-auto my-auto">-->
    <!--                    <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="navbarFixed"-->
    <!--                        onclick="navbarFixed(this)">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <hr class="horizontal dark my-3">-->
    <!--            <div class="mt-2 d-flex">-->
    <!--                <h6 class="mb-0">Light / Dark</h6>-->
    <!--                <div class="form-check form-switch me-auto my-auto">-->
    <!--                    <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="dark-version"-->
    <!--                        onclick="darkMode(this)">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <hr class="horizontal dark my-sm-4">-->
    <!--            <a class="btn bg-gradient-info w-100"-->
    <!--                href="https://www.creative-tim.com/product/material-dashboard">Free Download</a>-->
    <!--            <a class="btn btn-outline-dark w-100"-->
    <!--                href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View-->
    <!--                documentation</a>-->
    <!--            <div class="w-100 text-center">-->
    <!--                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"-->
    <!--                    data-icon="octicon-star" data-size="large" data-show-count="true"-->
    <!--                    aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>-->
    <!--                <h6 class="mt-3">Thank you for sharing!</h6>-->
    <!--                <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"-->
    <!--                    class="btn btn-dark mb-0 me-2" target="_blank">-->
    <!--                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet-->
    <!--                </a>-->
    <!--                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"-->
    <!--                    class="btn btn-dark mb-0 me-2" target="_blank">-->
    <!--                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share-->
    <!--                </a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
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
       .styleFile{
           position: absolute;
    display: none;
    width: 0.1px;
    }

.heightPhoto{
    height:8rem;
width: 146px;
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
width: 146px;
    height: 8rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
.editButtonFor2{
color: transparent;
     position: absolute;
    z-index:100;
 width: 146px;
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