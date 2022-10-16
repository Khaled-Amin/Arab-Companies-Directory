@extends('dash-board.rtl')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                   
                    <h6 class="font-weight-bolder mb-0">الصفحات الثابتة</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">
                 
                    <ul class="navbar-nav me-auto ms-0 justify-content-end">
                       
                        <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown ps-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-white" role="alert">
                {{$message}}
            </div>

            @endif
        </div>

        @if ($errors->any())
        
        
        <div class="container">
        <div class="alert row" style="background-color:#42424a ">
            <ul style="color:white">
                انتبه !!!
                @foreach ($errors->all() as $error)
                    <li  style="color:white ;font-family: Arabic;" class=>{{ $error }}</li>
                @endforeach
            </ul>
        </div></div>
    @endif

        <div class="row backgroundW p-4 m-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                
                    <li class="breadcrumb-item active" aria-current="page">انشاء</li>
                </ol>
            </nav>
            <form action="{{ route('actionAddCountry') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">اسم الدولة</label>
                    <input type="text" name="country_name" placeholder="ادخل اسم الصفحة" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">رابط الدولة</label>
                    <input type="text" name="href" placeholder="ادخل رابط الصفحة" class="form-controll">

                </div>

                <div class="col-md-12 mb-4">
                    <label for="Description" class="form-labell ">كلمات مفتاحية</label>
                    <input type="text" name="keywords" placeholder="ادخل كلمات مفتاحية" class="form-controll">
                </div>
                  <div class="col-md-12 mb-3">
                    <label for="title" class="form-labell ">عنوان الصفحة</label>
                    <input type="text" name="title" value="" class="form-controll">
                </div>
                <div class="col-md-12 mb-3">
  <label for="Description" class="form-labell ">نبذة عن الموقع </label>
  <textarea type="text" id="Description" name="Description" class="form-controll resizeForTextarea" > </textarea>
  </div>
  
                  <div class="col-md-12 mb-3">
  <label for="flag" class="form-labell ">صورة الدولة </label>
<input type="file" name="flag" id="flag" >
  </div>
  
                <div class="col-md-12 mb-4">
                    <input class="" type="checkbox" value="1" name="FirstCountry" id="flexCheckChecked" style="width: 19px;cursor:pointer;" >
                    <label class="form-check-label" for="flexCheckChecked">
                    تظهر ببداية الدخول
                    </label>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-dark" style="background-color:#42424a">حفظ</button>
                </div>
            </form>
        </div>

    </main>

    {{-- sittings --}}
   
    <!--   Core JS Files   -->
    <script src="{{ url('/../public/dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{url('/../public/dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('/../public/dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('/../public/dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ url('/../public/dashboard/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard/js/material-dashboard.min.js?v=3.0.2') }}"></script>
@endsection
<style>
          @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    body{
       font-family: NotoKufiArabic !important;
    }
</style>
