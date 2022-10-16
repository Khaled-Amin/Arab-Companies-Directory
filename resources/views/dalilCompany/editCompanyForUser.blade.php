@extends('layouts.HeaderFooter')
@section('content')

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
            
            <form action="{{ route('updateCompanyForUser' , $id) }}" enctype="multipart/form-data" method="post" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px !important;background-color:#fff;padding: 2rem;" >
                @csrf
<div class="row backgroundW p-4  ">
    
       @isset($customizeUsers->nameCompany)
                <div class="col-md-6 mb-3">
                    <label for="inputNameCompany" class="form-label">أسم الشركة</label>
                    <input type="text" class="@error('nameWebsite') is-invalid @enderror form-control "
                        name="name_company" id="inputNameCompany"
                        value ="@isset($Company) {{ $Company->name_company }} @endisset"
                        required>
                </div>
                @endisset
                
                
                
                    @isset($customizeUsers->customizeCompany)
                    
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
    @endisset
    
    
             @isset($customizeUsers->country)
                <div class="col-md-6 mb-3">
                    <label for="ArabCountry" class="form-labell">اسم الدولة</label>
                    <select name="name_country" class="form-select" id="ArabCountry">
                        <option value="" disabled selected>إختر</option>
                        @isset($countries)
                        @foreach($countries as $country)
                        <option value="{{ $country->country_name }}" @isset($Company) @if($Company->name_country==$country->country_name) selected @endif @endisset>{{ $country->country_name }}</option>
                        @endforeach
                        @endisset
                      </select>
                </div>
                @endisset
                     @isset($customizeUsers->city)
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label ">المدينة</label>
                    <input type="text" class="form-control" name="city" id="city"
                        value="@isset($Company) {{ $Company->city }} @endisset">
                </div>
                @endisset
                
                   @isset($customizeUsers->title)
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label  ">العنوان</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="@isset($Company) {{ $Company->title }} @endisset">
                </div>
                @endisset
                
                    @isset($customizeUsers->telephone)
                <div class="col-md-6 mb-3">
                    <label for="phonea" class="form-label "> الهاتف مع رمز الدولة</label>
                    <input type="text" class="form-control" name="telephone_fix" id="phonea"
                        value="@isset($Company) {{ $Company->telephone_fix }} @endisset">
                </div>
                @endisset
                
                  @isset($customizeUsers->phone)
                <div class="col-md-6 mb-3">
                    <label for="phoneo" class="form-label ">الجوال مع رمز الدولة</label>
                    <input type="text" class="form-control" name="number_phone" id="phoneo"
                        value="@isset($Company) {{ $Company->number_phone }} @endisset">
                </div>
                @endisset
                
                  @isset($customizeUsers->email)
                 <div class="col-md-6 mb-3">
                    <label for="email" class="form-label  ">البريد الالكتروني</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="@isset($Company) {{ $Company->email }} @endisset">
                </div>
                 @endisset
                 
                 @isset($customizeUsers->facebook)
                <div class="col-md-6 mb-3 ">
                    <label for="inputlink1" class="form-label  ">رابط فيسبوك</label>
                    <input type="text" class="form-control" name="facebook" id="inputlink1"
                        value="@isset($Company) {{ $Company->facebook }} @endisset">
                </div>
                @endisset
                
                  @isset($customizeUsers->telegram)
                <div class="col-md-6 mb-3">
                    <label for="inputlink2" class="form-label ">رابط تلغرام</label>
                    <input type="text" class="form-control" name="telegram" id="inputlink2"
                        value="@isset($Company) {{ $Company->telegram }} @endisset">
                </div>
                @endisset
                
                
                   @isset($customizeUsers->instagram)
                <div class="col-md-6 mb-3">
                    <label for="inputlink3" class="form-label ">رابط انستغرام</label>
                    <input type="text" class="form-control" name="instagram" id="inputlink3"
                        value="@isset($Company) {{ $Company->instagram }} @endisset">
                </div>
                    @endisset
                    
          @isset($customizeUsers->youtube)
                <div class="col-md-6 mb-3">
                    <label for="inputlink4" class="form-label ">رابط يوتيوب</label>
                    <input type="text" class="form-control" name="youtube" id="inputlink4"
                        value="@isset($Company) {{ $Company->youtube }} @endisset">
                </div>
        @endisset
        
           @isset($customizeUsers->linkeden)
                <div class="col-12 mb-3">
                    <label for="inputLinkden" class="form-label ">Linlkden رابط </label>
                    <input type="text" id="inputLinkden" class="form-control" name="linkedin"
                        value="@isset($Company) {{ $Company->linkedin }} @endisset">
                </div>
                  @endisset
                
                  @isset($customizeUsers->discreption)
                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-label ">نبذة عن الشركة </label>
                    <textarea type="text" id="Description" name="discreption" class="form-control resizeForTextarea">
        @isset($Company)
        {{ $Company->discreption }}
        @endisset
        </textarea>
                </div>
                 @endisset
                 
                 @isset($customizeUsers->tag)
                      <div class="col-12 mb-3">
            <label for="tag" class="form-label "> (ادرج فرغ بين كل تاغ)التاغات </label>
            <input type="text" id="tag" class="form-control" name="tag"
                  value="@isset($Company) @foreach($Company->tags as $company_tag){{ $company_tag->name_tag }} @endforeach @endisset" >
                </div>
                
                @endisset
                   @isset($customizeUsers->icon)
                
                    <label for="" class="form-label  ">لوغو الشركة </label>
                           <input type="file" name="logo" id="logo" class="profilePhotoInput" > 
                      <div class="col-md-6 mb-4 border-right">
         
            @isset($Company->logo)
             <label for="logo" class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/logoForCompanies/".$Company->logo."")}}"> <h5 class="editButtonFor2 rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
            @empty($Company->logo)
            <label for="profilePhoto" class="cursor d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>
     </label>
     @endempty
        </div>
@endisset
                <div class="col-12">
                    <button type="submit" class="btn btn-dark">تحديث</button>
                </div>
            </form>
        </div>
</div>


    {{-- sittings --}}
 
                <!-- Sidenav Type -->

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

<style>
              @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    body{
       font-family: NotoKufiArabic !important;
    }
    
    
    
    .heightPhoto{
    height:8rem;
width: 127px;
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
background-color:#6a0808;
    opacity: 0.8;
}
.editButtonFor2:hover{
    color:#fff;
background-color:#6a0808;
    opacity: 0.8;
}
.logoutefitor{
   position: relative;
    top: 123px;
}
        .form-label{
            font-size: 0.875rem;
    font-weight: 400 !important;
    color: #7b809a !important;
}
.btn{width:5rem !important;}
    
@media screen And (max-width:600px)
{
    .logoutefitor{
            position: relative;
    top: 49px;
   background-color: white;
    height: 4rem;
    display: flex;
}
}
</style>