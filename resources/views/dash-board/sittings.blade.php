 @extends('dash-board.rtl')
@section('content')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        
          <h6 class="font-weight-bolder mb-0">الاعدادات العامة</h6>
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
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  ms-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  ms-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  ms-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    
                      
             
        
{{--الاعدادات العامة --}}

<form method="POST" action="{{ route('setSittings') }}" enctype="multipart/form-data" class=" m-5  shadow ">
  @csrf
{{-- ارسال الأخطاء --}}

@if(!empty(session('msg')))
    

<div class="row backgroundW p-4  ">
  <div class="alert" style="background-color: #42424a ">
<ul>
    <li  style="color:white" class="">{{ session('msg') }}</li>
  </ul>
  </div></div>
@endif
<div class="row backgroundW p-4  ">
 @if ($errors->any())
    <div class="alert" style="background-color: #42424a ">
        <ul>
            @foreach ($errors->all() as $error)
                <li  style="color:white" class=>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="col-12 mb-3">
      <label for="inputFirstNmae" class="form-labell" >أسم الموقع</label>
      <input type="text" class="@error('nameWebsite') is-invalid @enderror form-controll " name="nameWebsite" id="inputFirstNmae" value="@isset($DataSittings){{ $DataSittings->nameWebsite }} @endisset" required>
  </div>
 

  <div class="col-12 mb-3">
      <label for="inputLastNmae" class="form-labell  ">رابط الموقع</label>
      <input type="text" class="form-controll" name="linkWebsite" id="inputLastNmae" value="@isset($DataSittings){{ $DataSittings->linkWebsite }} @endisset" >
  </div>

<div class="col-md-6 mb-3 ">
<label for="inputlink1" class="form-labell  ">رابط فيسبوك</label>
<input type="text" class="form-controll " name="socialMidiaFacebook" id="inputlink1" value="@isset($DataSittings){{ $DataSittings->socialMidiaFacebook }} @endisset" >
</div>
<div class="col-md-6 mb-3">
<label for="inputlink2" class="form-labell ">رابط تلغرام</label>
<input type="text" class="form-controll" name="socialMidiaTelegram" id="inputlink2" value="@isset($DataSittings){{ $DataSittings->socialMidiaTelegram }} @endisset" >
</div>
<div class="col-12 mb-3">
<label for="inputlink3" class="form-labell ">رابط انستغرام</label>
<input type="text" class="form-controll" name="socialMidiaInstagram" id="inputlink3" value="@isset($DataSittings){{ $DataSittings->socialMidiaInstagram }} @endisset">
</div>

<div class="col-md-6 mb-3">
<label for="inputlink4" class="form-labell ">رابط يوتيوب</label>
<input type="text" class="form-controll" name="socialMidiaYoutube" id="inputlink4" value="@isset($DataSittings){{ $DataSittings->socialMidiaYoutube }} @endisset">
</div>

<div class="col-md-6 mb-3">
<label for="inputLinkden" class="form-labell ">Linlkden رابط </label>
<input type="text" id="inputLinkden" name="socialMidialinkden" class="form-controll"value="@isset($DataSittings){{ $DataSittings->socialMidialinkden }} @endisset" >
</div>
<div class="col-md-6 mb-3">
<label for="paginate_number" class="form-labell ">عدد الشركات التي تظهر في كل صفحة </label>
<input type="text" id="paginate_number" name="paginate_number" class="form-controll"value="@isset($DataSittings){{ $DataSittings->paginate_number }} @endisset" >
</div>
<div class="col-md-12 mb-3">
  <label for="Description" class="form-labell ">نبذة عن الموقع </label>
  <textarea type="text" id="Description" name="Description" class="form-controll resizeForTextarea" > @isset($DataSittings){{ $DataSittings->Description }} @endisset</textarea>
  </div>
  <div class="col-md-12 mb-3">
    <label for="Description" class="form-labell ">الكلمات المفتاحية ( يجب الفصل بينها بفاصلة )</label>
    <textarea type="text" id="Description" name="Keywords" class="form-controll resizeForTextarea" >@isset($DataSittings) {{ $DataSittings->Keywords }} @endisset</textarea>
    </div>

      
  
                    <label for="" class="form-labell  ">ادخال ايقونة الموقع</label>
                     <input type="file" name="favicon" id="favicon" class="profilePhotoInput" > 
              <div class="col-md-3 border-right">
           
            @isset($DataSittings->favicon)
             <label for="favicon" class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/upload/".$DataSittings->favicon."")}}"> <h5 class="editButton rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
            @empty($DataSittings->favicon)
            <label for="profilePhoto" class="cursor d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>
     </label>
     @endempty
        </div>
    
       <!--    <div class="col-12 mb-3">
          <label for="pictureForShow" class="form-labell labelForPicture"> ادخال صورة المشاركة مع السوشيل ميديا</label>
          <input type="file" accept="image/*" class="form-controll   pictureForShow" name="photoSocialMediaLink" id="pictureForShow" value="" >
      </div>
      -->
        <label for="" class="form-labell  ">ادخال صورة المشاركة مع السوشيل ميديا</label>
                           <input type="file" name="photoSocialMediaLink" id="photoSocialMediaLink" class="profilePhotoInput" > 
              <div class="col-md-3 border-right">
         
            @isset($DataSittings->photoSocialMediaLink)
             <label for="photoSocialMediaLink" class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/uploading/".$DataSittings->photoSocialMediaLink."")}}"> <h5 class="editButtonFor2 rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
            @empty($DataSittings->photoSocialMediaLink)
            <label for="profilePhoto" class="cursor d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>
     </label>
     @endempty
        </div>
        
        
        
             <label for="" class="form-labell  ">ادخال صورة ثابتة للشركات التي لاتمتلك صورة   </label>
                           <input type="file" name="photoForNotHavePhoto" id="photoForNotHavePhoto" class="profilePhotoInput" > 
              <div class="col-md-3 border-right">
         
            @isset($DataSittings->photoForNotHavePhoto)
             <label for="photoForNotHavePhoto" class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/upload/".$DataSittings->photoForNotHavePhoto."")}}"> <h5 class="editButtonFor2 rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
            @empty($DataSittings->photoForNotHavePhoto)
            <label for="photoForNotHavePhoto" class="cursor d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>
     </label>
     @endempty
        </div>
      
                        <!--    <div class="col-md-12 mb-3">-->
               
    <!--                <input type="file" accept="image/*" name="photoSocialMediaLink"  class="form-controll   pictureForShow " style="    position: absolute;
    display: none;
    width: 0.1px;" name="favicon" id="pictureForShow"  >
                    <div style="border:1px solid;    height: 2.6rem;"><label for="pictureForShow" class="btn btn-dark d-inline-flex " style="background-color:#42424a; width:8rem; border-radius:0px;left: 1px;"> اضافة صورة</label>
               <span class="me-3" style="position:relative;top: -6px;">أ @isset($DataSittings) {{ $DataSittings->photoSocialMediaLink }} @endisset @empty($DataSittings)أسم الملف @endempty </span>
                    </div> 
                </div>
      -->

      
      
<div class="col-12 ">
  <button type="submit"   class="btn btn-dark" style="background-color: #42424a">حفظ</button>
</div>
</form>
</div>

</div>


{{-- نهاية الاعدادات العامة --}}
        {{-- Footer --}}

    </div>
  </main>
  
  <!--   Core JS Files   -->


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('dashboard/js/material-dashboard.min.js?v=3.0.2')}}"></script>
</body>

</html>
@endsection
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
