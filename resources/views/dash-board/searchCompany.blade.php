 @extends('dash-board.rtl')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
               
                    <h6 class="font-weight-bolder mb-0">الدول</h6>
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


             <form action="{{ url('searchCompany') }}" method="GET" class="container ">
            @csrf
                <!-- قسم مربع البحث -->
                <div class=" row justify-content-center">
                    <input type="text" class="form-controll search-main col-5" name="nameCompany" id="exampleFormControlInput1" placeholder="بحث عن شركة محددة">
                    <button type="submit" class=" col-1 btn btn_search mx-2">
                        بحث
                    </button>
                </div>
                </form>


        <div class="container">
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

        <div class="row backgroundW p-4 m-3" style="    overflow-x: auto;">
            <div class="container d-flex justify-content-start">
                
                <a  class="btn fs-6" style="background-color: #38383e;color:#fff;border:0px;" href="{{ route('createCompany') }}"> إضافة شركة جديدة</a>
            </div>
          
            <table class="table table-bordered ">
                <thead>
                    <tr>
                    
                        <th scope="col">اسم الشركة</th>
                        <th scope="col">تصنيف الفرعي للشركة</th>
                        <th scope="col">أسم الدولة</th>
        
                  
                        <th scope="col">الجوال مع رمز الدولة</th>

                        
                    </tr>
                </thead>
                <tbody>
@isset($showallCompany)
                    @foreach ($showallCompany as $company)


                        <tr>
                         
                            <td>{{$company->name_company}}</td>
                            <td>{{$company->type_company}}</td>
                            <td>{{$company->name_country}}</td>
                    
                            <td>{{$company->number_phone}}</td>
             

                            <td>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a href="{{route('editCompany' , $company->id)}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <div class="col-sm">
                                            <a href="{{route('deleteCompany', ['id' => $company->id])}}"><i class="fa-solid fa-trash-can"></i></a>


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
<div class="d-flex justify-content-center my-5">@isset($showallCompany){{$showallCompany->links()}}@endisset</div>
    </main>

    {{-- sittings --}}

    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">



        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function() {
                $('#ArabCountry').on('change', function(e) {
                    document.getElementById('city').innerHTML="<option value>أختر المدينة</option>";
                    var name_country = e.target.value;
                    console.log(name_country);
                    
                    $.ajax({
                        url: "{{ route('getCities') }}",
                        type: "POST",
                        data: {
                            name_country: name_country
                          
                                         
                        },
                        success: function(data) {
                            
                      data.forEach(element =>  document.getElementById('city').innerHTML+="<option value="+element.name_city+">"+element.name_city+"</option>" );
                     
                            },
                           
                        });
                 
                });
            });
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
    .pagi{
            background-color: #38383e !important;
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
</style>