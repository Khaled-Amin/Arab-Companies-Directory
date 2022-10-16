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


<form method="POST" action="{{ route('storeCompany') }}" class=" m-5  " enctype="multipart/form-data" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px !important;">
    @csrf
    {{-- ارسال الأخطاء --}}

    @if (!empty(session('msg')))
        <div class="row backgroundW p-4  " style="box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;">
            <div class="alert" style="background-color: #42424a ">
                <ul>
                    <li style="color:white" class="">{{ session('msg') }}</li>
                </ul>
            </div>
        </div>
    @endif
    <div class="row backgroundW p-4  ">
        @if ($errors->any())
            <div class="alert" style="background-color: #42424a ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:white" class=>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       
        <div class="col-md-6 mb-3">
            <label for="inputNameCompany" class="form-labell">أسم الشركة</label>
            <input type="text" class="@error('nameWebsite') is-invalid @enderror form-controll "
                name="name_company" id="inputNameCompany"
                
                required>
        </div>
           <div class="col-md-6 mb-3">
            <label for="inputNameCompany" class="form-labell">تصنيف الشركة</label>
                                                <select id="ddlMainCategories" name="type_company" class="form-select" style="">
                                            @isset($mainClasses)
                                                
                                           @foreach ($mainClasses as $mainClass)
                                               
                                          
                                        <optgroup class="parent" label={{ $mainClass->name_mainClass }}></optgroup>
                                        @isset($subClasses)
                                                @foreach ($subClasses as $subClass)
                                                    
                                                @if($mainClass->name_mainClass ==$subClass->name_mainClass)
                                                <option value="{{ $subClass->name_subClass }}">        {{ $subClass->name_subClass }}</option>                                    
                                            
                                                                          
                                              @endif
                                                @endforeach
                                                @endisset
                                                @endforeach
                                                @endisset
                                    
                                      
                                            
                                        
                                    
                                        </select>
</div>
        <div class="col-md-6 mb-3">
            <label for="ArabCountry" class="form-labell">اسم الدولة</label>
            <select name="name_country" class="form-select" id="ArabCountry" >
                <option value="" disabled selected>إختر</option>
                @isset($countries)
                @foreach($countries as $country)
                <option value="{{ $country->country_name }}"  >{{ $country->country_name }}</option>
                @endforeach
                @endisset
              </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="city" class="form-labell  ">المدينة</label>
           <select name="city" class="form-select" id="city" >
                <option value=""  ></option>
               </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="title" class="form-labell  ">العنوان</label>
            <input type="text" class="form-controll" name="title" id="title"
               >
        </div>
        <div class="col-md-6 mb-3">
            <label for="phonea" class="form-labell  "> الهاتف مع رمز الدولة</label>
            <input type="text" class="form-controll" name="telephone_fix" id="phonea"
                >
        </div>
        <div class="col-md-6 mb-3">
            <label for="phoneo" class="form-labell  ">الجوال مع رمز الدولة</label>
            <input type="text" class="form-controll" name="number_phone" id="phoneo"
               >
        </div>
         <div class="col-md-6 mb-3">
            <label for="email" class="form-labell  ">البريد الالكتروني</label>
            <input type="email" class="form-controll" name="email" id="email"
               >
        </div>
        <div class="col-md-6 mb-3 ">
            <label for="inputlink1" class="form-labell  ">رابط فيسبوك</label>
            <input type="text" class="form-controll " name="facebook" id="inputlink1"
                >
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputlink2" class="form-labell ">رابط تلغرام</label>
            <input type="text" class="form-controll" name="telegram" id="inputlink2"
               >
        </div>
        <div class="col-md-6 mb-3">
            <label for="inputlink3" class="form-labell ">رابط انستغرام</label>
            <input type="text" class="form-controll" name="instagram" id="inputlink3"
               >
        </div>

        <div class="col-md-6 mb-3">
            <label for="inputlink4" class="form-labell ">رابط يوتيوب</label>
            <input type="text" class="form-controll" name="youtube" id="inputlink4"
               >
        </div>

        <div class="col-12 mb-3">
            <label for="inputLinkden" class="form-labell ">Linlkden رابط </label>
            <input type="text" id="inputLinkden" class="form-controll" name="linkedin"
                >
        </div>
        <div class="col-md-12 mb-3">
            <label for="Description" class="form-labell ">نبذة عن الشركة </label>
            <textarea type="text" id="Description" name="discreption" class="form-controll ckeditor resizeForTextarea">

</textarea>
        </div>
      
           <div class="col-12 mb-3">
            <label for="tag" class="form-labell "> (ادرج فرغ بين كل تاغ)التاغات </label>
            <input type="text" id="tag" class="form-controll" name="tag"
               >
         
      
        <div class="col-md-6 mb-4">
    	
					 <label for="companyIcon" class="form-label">أيقونة الشركة</label>
                     <input class="form-control" type="file" name="logo" id="companyIcon" style="height:35px !important">
</div>
        <div class="col-md-12 mb-4">
    	
					 <label for="special" class="form-label mt-3">شركة مميزة</label>
                     <input class="" type="checkbox" id="special" name="special" value="1">
</div>


        <div class="col-12 ">
            <button type="submit" class="btn btn-dark" style="background-color: #42424a">حفظ</button>
        </div>
        
</form>
</div>

</div>



{{-- نهاية الاعدادات العامة --}}


<!-- Github buttons -->

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('dashboard/js/material-dashboard.min.js?v=3.0.2') }}"></script>
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

     <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
<style>
          @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    body{
       font-family: NotoKufiArabic !important;
    }

    }
</style>