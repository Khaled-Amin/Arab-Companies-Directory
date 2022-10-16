
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
        {{ $Company->name_company }}
        <div class="row backgroundW p-4 m-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">تعديل</li>
                </ol>
            </nav>
            <form action="{{ route('updateCompany' , $id) }}" enctype="multipart/form-data" method="post" >
                @csrf

                <div class="col-md-6 mb-3">
                    <label for="inputNameCompany" class="form-labell">أسم الشركة</label>
                    <input type="text" class="@error('nameWebsite') is-invalid @enderror form-controll "
                        name="name_company" id="inputNameCompany"
                        value ="@isset($Company) {{ $Company->name_company }} @endisset"
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
                                                        <option  @isset($Company) @if($Company->type_company == $subClass->name_subClass){{ $selected="selected"  }}@endif @endisset  value="{{ $subClass->name_subClass }}">       {{ $subClass->name_subClass }}</option>                                    
                                                    
                                                                                  
                                                      @endif
                                                        @endforeach
                                                        @endisset
                                                        @endforeach
                                                        @endisset
                                            
                                              
                                                    
                                                
                                            
                                                </select>
        </div>
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
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-labell  ">المدينة</label>
                    <input type="text" class="form-controll" name="city" id="city"
                        value="@isset($Company) {{ $Company->city }} @endisset">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-labell  ">العنوان</label>
                    <input type="text" class="form-controll" name="title" id="title"
                        value="@isset($Company) {{ $Company->title }} @endisset">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phonea" class="form-labell  "> الهاتف مع رمز الدولة</label>
                    <input type="text" class="form-controll" name="telephone_fix" id="phonea"
                        value="@isset($Company) {{ $Company->telephone_fix }} @endisset">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phoneo" class="form-labell  ">الجوال مع رمز الدولة</label>
                    <input type="text" class="form-controll" name="number_phone" id="phoneo"
                        value="@isset($Company) {{ $Company->number_phone }} @endisset">
                </div>
                 <div class="col-md-6 mb-3">
                    <label for="email" class="form-labell  ">البريد الالكتروني</label>
                    <input type="email" class="form-controll" name="email" id="email"
                        value="@isset($Company) {{ $Company->email }} @endisset">
                </div>
                <div class="col-md-6 mb-3 ">
                    <label for="inputlink1" class="form-labell  ">رابط فيسبوك</label>
                    <input type="text" class="form-controll " name="facebook" id="inputlink1"
                        value="@isset($Company) {{ $Company->facebook }} @endisset">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="inputlink2" class="form-labell ">رابط تلغرام</label>
                    <input type="text" class="form-controll" name="telegram" id="inputlink2"
                        value="@isset($Company) {{ $Company->telegram }} @endisset">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="inputlink3" class="form-labell ">رابط انستغرام</label>
                    <input type="text" class="form-controll" name="instagram" id="inputlink3"
                        value="@isset($Company) {{ $Company->instagram }} @endisset">
                </div>
        
                <div class="col-md-6 mb-3">
                    <label for="inputlink4" class="form-labell ">رابط يوتيوب</label>
                    <input type="text" class="form-controll" name="youtube" id="inputlink4"
                        value="@isset($Company) {{ $Company->youtube }} @endisset">
                </div>
        
                <div class="col-12 mb-3">
                    <label for="inputLinkden" class="form-labell ">Linlkden رابط </label>
                    <input type="text" id="inputLinkden" class="form-controll " name="linkedin"
                        value="@isset($Company) {{ $Company->linkedin }} @endisset">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">نبذة عن الشركة </label>
                    <textarea type="text" id="Description" name="discreption" class="form-controll ckeditor resizeForTextarea">
        @isset($Company)
        {{ $Company->discreption }}
        @endisset
        </textarea>
                </div>
                            <div class="col-12 mb-3">
            <label for="tag" class="form-labell "> (ادرج فرغ بين كل تاغ)التاغات </label>
            <input type="text" id="tag" class="form-controll" name="tag"
                  value="@isset($Company) @foreach($Company->tags as $company_tag){{ $company_tag->name_tag }} @endforeach @endisset" >
                </div>
                
                
                
                
                        <label for="" class="form-labell  ">     إضافة صورة</label>
                           <input type="file" name="logo" id="logo" class="profilePhotoInput" > 
              <div class="col-md-6 mb-4 border-right">
         
            @isset($Company->logo)
             <label for="logo" class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/logoForCompanies/".$Company->logo."")}}"> <h5 class="editButtonFor2 rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
            @empty($Company->logo)
            <label for="logo" class="cursor d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>
     </label>
     @endempty
        </div>
              <div class="col-md-12 mb-4">
    	
					 <label for="special" class="form-label mt-3">شركة مميزة</label>
					 @if($Company->special==1)
					 <!--{{$Company->special}}-->
                     <input class="" type="checkbox" checked id="special" name="special" value="1">
                    
                     @elseif($Company->special==0)
                        <input class="" type="checkbox"  id="special" name="special" value="1">
                     @endif
</div>

                
        <!--        <div class="col-md-6 mb-4">-->
                
        <!--                     <label for="companyIcon" class="form-label">أيقونة الشركة</label>-->
        <!--                     <input class="form-control" type="file" name="logo" id="companyIcon" style="height:35px !important">-->
        <!--</div>-->

                <div class="col-12">
                    <button type="submit" class="btn btn-dark">تحديث</button>
                </div>
            </form>
        </div>

    </main>

    <!--{{-- sittings --}}-->

    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
         <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
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
