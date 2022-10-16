 @extends('dash-board.rtl')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
               
                    <h6 class="font-weight-bolder mb-0">الاعضاء</h6>
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
        
        
        
        
         
           @if ($message = Session::get('success'))
            <div class="alert alert-white" role="alert">
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

        <div class="row backgroundW p-4 m-3">
       
          
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">الاسم </th>
                        <th scope="col">الايميل</th>
                        <th scope="col">تاريخ التسجيل</th>
                      
                        <th scope="col"></th
                        
                    </tr>
                </thead>
                <tbody>
@isset($user)
                    @foreach ($user as $usere)


                        <tr>
                            
                            <td>{{$usere->name}}</td>
                            <td>{{$usere->email}}</td>
                            <td>{{$usere->created_at}}</td>
                             
                            <td>
                                <div class="row">
                               
                                    <div class="col-sm">
                                            <a href="{{route('destroy', ['id' => $usere->id])}}"><i class="fa-solid fa-trash-can"></i></a>


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  
                    @endisset
                </tbody>
            </table>
          
        </div>
        @isset($users)
  <div class="d-flex justify-content-center"> {{ $users->links()}}</div>
  @endisset
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
@endsection
<Style>
          @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    body{
       font-family: NotoKufiArabic !important;
    }
    .btn_search{
        background-color:#42424a !important;
        color:#fff !important;
        height: 47px !important;
     /*   height: 3rem !important;*/
    /*border-radius: 0px !important;*/
   
    }
  .col-5{
           height: 3rem !important;
   flex: 0 0 auto !important;
    width: 41.66666667% !important;
  }
    
</Style>