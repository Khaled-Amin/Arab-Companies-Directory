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
            <form action="{{ route('storeCity') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12 mb-3">
                    <label for="name_country" class="form-labell ">الدولة</label>
                   <select name="name_country" id="name_country" class="form-select" >
                <option value="" disabled selected>إختر</option>
                @isset($countries)
                @foreach($countries as $country)
                <option value="{{ $country->country_name }}"  >{{ $country->country_name }}</option>
                @endforeach
                @endisset
              </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="name_city" class="form-labell ">أسم المدينة</label>
                    <input type="text" id="name_city" name="name_city" placeholder="المدينة" class="form-controll">

                </div>

        

          <!--      <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell  ">صورة</label>
                    <input type="file"  name="photo"  class="form-controll ">
                </div>
-->
                <div class="col-12">
                    <button type="submit" class="btn btn-dark" style="background-color:#42424a">حفظ</button>
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
</body>
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