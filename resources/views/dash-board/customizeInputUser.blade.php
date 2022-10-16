@extends('dash-board.rtl')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder mb-0">اعدادت المستخدم</h6>
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
                            <ul class="dropdown-menu  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('dashboard/img/team-2.jpg') }}"
                                                    class="avatar avatar-sm  ms-3 ">
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
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  ms-3 ">
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
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
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


<form method="POST" action="{{ route('customizeUsers1') }}"  class=" m-5  shadow ">
  @csrf
  <div class="row backgroundW p-4  mb-2 ">
      
      
      <h5 class="mt-3">المستخدمون غير مشتركين</h5><hr>
            <div class="col-md-1 mb-4">
    	
					 <label for="nameCompany" class="form-label mt-3">أسم الشركة</label>
                     <input class="" type="checkbox" id="nameCompany" name="nameCompany"  value="nameCompany" @isset($customizeUsers1->nameCompany) {{$checked='checked'}} @endisset>
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="customizeCompany" class="form-label mt-3"> تصنيف الشركة</label>
                     <input class="" type="checkbox" id="customizeCompany" name="customizeCompany" value="customizeCompany"  @isset($customizeUsers1->customizeCompany) {{$checked='checked'}} @endisset>
</div>            <div class="col-md-1 mb-4">
    	
					 <label for="country" class="form-label mt-3">أسم الدولة  </label>
                     <input class="" type="checkbox" id="country" name="country" value="country" @isset($customizeUsers1->country) {{$checked='checked'}} @endisset >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="city" class="form-label mt-3">أسم المدينة </label>
                     <input class="" type="checkbox" id="city" name="city" value="city" @isset($customizeUsers1->city) {{$checked='checked'}} @endisset>
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="telephone" class="form-label mt-3">الهاتف مع رمز الدولة </label>
                     <input class="" type="checkbox" id="telephone" name="telephone" value="telephone" @isset($customizeUsers1->telephone) {{$checked='checked'}} @endisset>
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="phone" class="form-label mt-3">الجوال مع رمز الدولة</label>
                     <input class="" type="checkbox" id="phone" name="phone" value="phone" @isset($customizeUsers1->phone) {{$checked='checked'}} @endisset>
</div>

           <div class="col-md-1 mb-4">
    	
					 <label for="email" class="form-label mt-3">البريد الالكتروني</label>
                     <input class="" type="checkbox" id="email" name="email" value="email" @isset($customizeUsers1->email) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="facebook" class="form-label mt-3">رابط فيسبوك</label>
                     <input class="" type="checkbox" id="facebook" name="facebook" value="facebook" @isset($customizeUsers1->facebook) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="instagram" class="form-label mt-3">رابط انستغرام</label>
                     <input class="" type="checkbox" id="instagram" name="instagram" value="instagram"  @isset($customizeUsers1->instagram) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="youtube" class="form-label mt-3">رابط يوتيوب</label>
                     <input class="" type="checkbox" id="youtube" name="youtube" value="youtube" @isset($customizeUsers1->youtube) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="telegram" class="form-label mt-3">رابط التلغرام</label>
                     <input class="" type="checkbox" id="telegram" name="telegram" value="telegram" @isset($customizeUsers1->telegram) {{$checked='checked'}} @endisset>
</div>
      
                 <div class="col-md-1 mb-4">
    	
					 <label for="linkeden" class="form-label mt-3">رابط لينكدان</label>
                     <input class="" type="checkbox" id="linkeden" name="linkeden" value="linkeden"  @isset($customizeUsers1->linkeden) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="discreption" class="form-label mt-3">نبذة عن الشركة</label>
                     <input class="" type="checkbox" id="discreption" name="discreption" value="discreption" @isset($customizeUsers1->discreption) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="icon" class="form-label mt-3">ايقونة الشركة</label>
                     <input class="" type="checkbox" id="icon" name="icon" value="icon"  @isset($customizeUsers1->icon) {{$checked='checked'}} @endisset>
</div>

                     <div class="col-md-1 mb-4">
    	
					 <label for="tag" class="form-label mt-3">التاغات</label> 
                     <input class="" type="checkbox" id="tag" name="tag" value="tag"  @isset($customizeUsers1->tag) {{$checked='checked'}} @endisset>
</div>
                     <div class="col-md-1 mb-4">
    	
					 <label for="title" class="form-label mt-3">العنوان</label> 
                     <input class="" type="checkbox" id="title" name="title" value="title" @isset($customizeUsers1->title) {{$checked='checked'}} @endisset>
</div>
<div class="col-12 mt-2 ">
  <button type="submit"   class="btn btn-dark" style="background-color: #42424a">حفظ</button>
</div>
      </div> </form>
      <form method="POST" action="{{ route('customizeUsers2') }}"  class=" m-5  shadow ">
  @csrf
    <div class="row backgroundW p-4 mb-2  ">
        
             <h5 class="mt-3">المستخدمون مشتركين</h5><hr>
          <div class="col-md-1 mb-4">
    	
					 <label for="nameCompany_msh" class="form-label mt-3">أسم الشركة</label>
                     <input class="" type="checkbox" id="nameCompany_msh" name="nameCompany_msh" value="nameCompany_msh" @isset($customizeUsers2->nameCompany) {{$checked='checked'}} @endisset>
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="customizeCompany_msh" class="form-label mt-3"> تصنيف الشركة</label>
                     <input class="" type="checkbox" id="customizeCompany_msh" name="customizeCompany_msh" value="customizeCompany_msh"  @isset($customizeUsers2->customizeCompany) {{$checked='checked'}} @endisset>
</div>            <div class="col-md-1 mb-4">
    	
					 <label for="country_msh" class="form-label mt-3">أسم الدولة  </label>
                     <input class="" type="checkbox" id="country_msh" name="country_msh" value="country_msh" @isset($customizeUsers2->country) {{$checked='checked'}} @endisset  >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="city_msh" class="form-label mt-3">أسم المدينة </label>
                     <input class="" type="checkbox" id="city_msh" name="city_msh" value="city_msh"  @isset($customizeUsers2->city) {{$checked='checked'}} @endisset >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="telephone_msh" class="form-label mt-3">الهاتف مع رمز الدولة </label>
                     <input class="" type="checkbox" id="telephone_msh" name="telephone_msh" value="telephone_msh"  @isset($customizeUsers2->telephone) {{$checked='checked'}} @endisset   >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="phone_msh" class="form-label mt-3">الجوال مع رمز الدولة</label>
                     <input class="" type="checkbox" id="phone_msh" name="phone_msh" value="phone_msh" @isset($customizeUsers2->phone) {{$checked='checked'}} @endisset  >
</div>

           <div class="col-md-1 mb-4">
    	
					 <label for="email_msh" class="form-label mt-3">البريد الالكتروني</label>
                     <input class="" type="checkbox" id="email_msh" name="email_msh" value="email_msh"  @isset($customizeUsers2->email) {{$checked='checked'}} @endisset  >
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="facebook_msh" class="form-label mt-3">رابط فيسبوك</label>
                     <input class="" type="checkbox" id="facebook_msh" name="facebook_msh" value="facebook_msh"  @isset($customizeUsers2->facebook) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="instagram_msh" class="form-label mt-3">رابط انستغرام</label>
                     <input class="" type="checkbox" id="instagram_msh" name="instagram_msh" value="instagram_msh"   @isset($customizeUsers2->instagram) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="youtube_msh" class="form-label mt-3">رابط يوتيوب</label>
                     <input class="" type="checkbox" id="youtube_msh" name="youtube_msh" value="youtube_msh"  @isset($customizeUsers2->youtube) {{$checked='checked'}} @endisset   >
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="telegram_msh" class="form-label mt-3">رابط التلغرام</label>
                     <input class="" type="checkbox" id="telegram_msh" name="telegram_msh" value="telegram_msh"  @isset($customizeUsers2->telegram) {{$checked='checked'}} @endisset >
</div>
      
                 <div class="col-md-1 mb-4">
    	
					 <label for="linkeden_msh" class="form-label mt-3">رابط لينكدان</label>
                     <input class="" type="checkbox" id="linkeden_msh" name="linkeden_msh" value="linkeden_msh" @isset($customizeUsers2->linkeden) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="discreption_msh" class="form-label mt-3">نبذة عن الشركة</label>
                     <input class="" type="checkbox" id="discreption_msh" name="discreption_msh" value="discreption_msh"  @isset($customizeUsers2->discreption) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="icon_msh" class="form-label mt-3">ايقونة الشركة</label>
                     <input class="" type="checkbox" id="icon_msh" name="icon_msh" value="icon_msh" @isset($customizeUsers2->icon) {{$checked='checked'}} @endisset>
</div>
                     <div class="col-md-1 mb-4">
    	
					 <label for="tag_msh" class="form-label mt-3">التاغات</label> 
                     <input class="" type="checkbox" id="tag_msh" name="tag" value="tag"  @isset($customizeUsers2->tag) {{$checked='checked'}} @endisset>
</div>
                     <div class="col-md-1 mb-4">
    	
					 <label for="title_msh" class="form-label mt-3">العنوان</label> 
                     <input class="" type="checkbox" id="title_msh" name="title" value="title"  @isset($customizeUsers2->title) {{$checked='checked'}} @endisset>
</div>
<div class="col-12 mt-2 ">
  <button type="submit"   class="btn btn-dark" style="background-color: #42424a">حفظ</button>
</div>
       </div>
  
  
  </form>

      <form method="POST" action="{{ route('customizeUsers3') }}"  class=" m-5  shadow ">
  @csrf
    <div class="row backgroundW p-4 mb-2  ">
        
             <h5 class="mt-3">المستخدمون مسجلين وغير مشتركين</h5><hr>
          <div class="col-md-1 mb-4">
    	
					 <label for="nameCompany3" class="form-label mt-3">أسم الشركة</label>
                     <input class="" type="checkbox" id="nameCompany3" name="nameCompany_msh" value="nameCompany_msh" @isset($customizeUsers3->nameCompany) {{$checked='checked'}} @endisset>
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="customizeCompany3" class="form-label mt-3"> تصنيف الشركة</label>
                     <input class="" type="checkbox" id="customizeCompany3" name="customizeCompany_msh" value="customizeCompany_msh"  @isset($customizeUsers3->customizeCompany) {{$checked='checked'}} @endisset>
</div>            <div class="col-md-1 mb-4">
    	
					 <label for="country3" class="form-label mt-3">أسم الدولة  </label>
                     <input class="" type="checkbox" id="country3" name="country_msh" value="country_msh" @isset($customizeUsers3->country) {{$checked='checked'}} @endisset  >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="city3" class="form-label mt-3">أسم المدينة </label>
                     <input class="" type="checkbox" id="city3" name="city_msh" value="city_msh"  @isset($customizeUsers3->city) {{$checked='checked'}} @endisset >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="telephone_msh3" class="form-label mt-3">الهاتف مع رمز الدولة </label>
                     <input class="" type="checkbox" id="telephone_msh3" name="telephone_msh" value="telephone_msh"  @isset($customizeUsers3->telephone) {{$checked='checked'}} @endisset   >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="phone_msh3" class="form-label mt-3">الجوال مع رمز الدولة</label>
                     <input class="" type="checkbox" id="phone_msh3" name="phone_msh" value="phone_msh" @isset($customizeUsers3->phone) {{$checked='checked'}} @endisset  >
</div>

           <div class="col-md-1 mb-4">
    	
					 <label for="email_msh3" class="form-label mt-3">البريد الالكتروني</label>
                     <input class="" type="checkbox" id="email_msh3" name="email_msh" value="email_msh"  @isset($customizeUsers3->email) {{$checked='checked'}} @endisset  >
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="facebook_msh3" class="form-label mt-3">رابط فيسبوك</label>
                     <input class="" type="checkbox" id="facebook_msh3" name="facebook_msh" value="facebook_msh"  @isset($customizeUsers3->facebook) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="instagram_msh3" class="form-label mt-3">رابط انستغرام</label>
                     <input class="" type="checkbox" id="instagram_msh3" name="instagram_msh" value="instagram_msh"   @isset($customizeUsers3->instagram) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="youtube_msh3" class="form-label mt-3">رابط يوتيوب</label>
                     <input class="" type="checkbox" id="youtube_msh3" name="youtube_msh" value="youtube_msh"  @isset($customizeUsers3->youtube) {{$checked='checked'}} @endisset   >
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="telegram_msh3" class="form-label mt-3">رابط التلغرام</label>
                     <input class="" type="checkbox" id="telegram_msh3" name="telegram_msh" value="telegram_msh"  @isset($customizeUsers3->telegram) {{$checked='checked'}} @endisset >
</div>
      
                 <div class="col-md-1 mb-4">
    	
					 <label for="linkeden_msh3" class="form-label mt-3">رابط لينكدان</label>
                     <input class="" type="checkbox" id="linkeden_msh3" name="linkeden_msh" value="linkeden_msh" @isset($customizeUsers3->linkeden) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="discreption_msh3" class="form-label mt-3">نبذة عن الشركة</label>
                     <input class="" type="checkbox" id="discreption_msh3" name="discreption_msh" value="discreption_msh"  @isset($customizeUsers3->discreption) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="icon_msh3" class="form-label mt-3">ايقونة الشركة</label>
                     <input class="" type="checkbox" id="icon_msh3" name="icon_msh" value="icon_msh" @isset($customizeUsers3->icon) {{$checked='checked'}} @endisset>
</div>
                     <div class="col-md-1 mb-4">
    	
					 <label for="tag_msh3" class="form-label mt-3">التاغات</label> 
                     <input class="" type="checkbox" id="tag_msh3" name="tag_msh" value="tag"  @isset($customizeUsers3->tag) {{$checked='checked'}} @endisset>
</div>
                     <div class="col-md-1 mb-4">
    	
					 <label for="title_msh3" class="form-label mt-3">العنوان</label> 
                     <input class="" type="checkbox" id="title_msh3" name="title_msh" value="title"  @isset($customizeUsers3->title) {{$checked='checked'}} @endisset>
</div>
<div class="col-12 mt-2 ">
  <button type="submit"   class="btn btn-dark" style="background-color: #42424a">حفظ</button>
</div>
       </div>
  
  
  </form>



      <form method="POST" action="{{ route('customizeUsers4') }}"  class=" m-5  shadow ">
  @csrf
    <div class="row backgroundW p-4 mb-2  ">
        
             <h5 class="mt-3">الفئة الذهبية</h5><hr>
          <div class="col-md-1 mb-4">
    	
					 <label for="nameCompany_msh4" class="form-label mt-3">أسم الشركة</label>
                     <input class="" type="checkbox" id="nameCompany_msh4" name="nameCompany_msh" value="nameCompany_msh" @isset($customizeUsers4->nameCompany) {{$checked='checked'}} @endisset>
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="customizeCompany_msh4" class="form-label mt-3"> تصنيف الشركة</label>
                     <input class="" type="checkbox" id="customizeCompany_msh4" name="customizeCompany_msh" value="customizeCompany_msh"  @isset($customizeUsers4->customizeCompany) {{$checked='checked'}} @endisset>
</div>            <div class="col-md-1 mb-4">
    	
					 <label for="country_msh4" class="form-label mt-3">أسم الدولة  </label>
                     <input class="" type="checkbox" id="country_msh4" name="country_msh" value="country_msh" @isset($customizeUsers4->country) {{$checked='checked'}} @endisset  >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="city_msh4" class="form-label mt-3">أسم المدينة </label>
                     <input class="" type="checkbox" id="city_msh4" name="city_msh" value="city_msh"  @isset($customizeUsers4->city) {{$checked='checked'}} @endisset >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="telephone_msh4" class="form-label mt-3">الهاتف مع رمز الدولة </label>
                     <input class="" type="checkbox" id="telephone_msh4" name="telephone_msh" value="telephone_msh"  @isset($customizeUsers4->telephone) {{$checked='checked'}} @endisset   >
</div>
            <div class="col-md-1 mb-4">
    	
					 <label for="phone_msh4" class="form-label mt-3">الجوال مع رمز الدولة</label>
                     <input class="" type="checkbox" id="phone_msh4" name="phone_msh" value="phone_msh" @isset($customizeUsers4->phone) {{$checked='checked'}} @endisset  >
</div>

           <div class="col-md-1 mb-4">
    	
					 <label for="email_msh4" class="form-label mt-3">البريد الالكتروني</label>
                     <input class="" type="checkbox" id="email_msh4" name="email_msh" value="email_msh"  @isset($customizeUsers4->email) {{$checked='checked'}} @endisset  >
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="facebook_msh4" class="form-label mt-3">رابط فيسبوك</label>
                     <input class="" type="checkbox" id="facebook_msh4" name="facebook_msh" value="facebook_msh"  @isset($customizeUsers4->facebook) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="instagram_msh4" class="form-label mt-3">رابط انستغرام</label>
                     <input class="" type="checkbox" id="instagram_msh4" name="instagram_msh" value="instagram_msh"   @isset($customizeUsers4->instagram) {{$checked='checked'}} @endisset>
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="youtube_msh4" class="form-label mt-3">رابط يوتيوب</label>
                     <input class="" type="checkbox" id="youtube_msh4" name="youtube_msh" value="youtube_msh"  @isset($customizeUsers4->youtube) {{$checked='checked'}} @endisset   >
</div>
           <div class="col-md-1 mb-4">
    	
					 <label for="telegram_msh4" class="form-label mt-3">رابط التلغرام</label>
                     <input class="" type="checkbox" id="telegram_msh4" name="telegram_msh" value="telegram_msh"  @isset($customizeUsers4->telegram) {{$checked='checked'}} @endisset >
</div>
      
                 <div class="col-md-1 mb-4">
    	
					 <label for="linkeden_msh4" class="form-label mt-3">رابط لينكدان</label>
                     <input class="" type="checkbox" id="linkeden_msh4" name="linkeden_msh" value="linkeden_msh" @isset($customizeUsers4->linkeden) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="discreption_msh4" class="form-label mt-3">نبذة عن الشركة</label>
                     <input class="" type="checkbox" id="discreption_msh4" name="discreption_msh" value="discreption_msh"  @isset($customizeUsers4->discreption) {{$checked='checked'}} @endisset>
</div>
                       <div class="col-md-1 mb-4">
    	
					 <label for="icon_msh4" class="form-label mt-3">ايقونة الشركة</label>
                     <input class="" type="checkbox" id="icon_msh4" name="icon_msh" value="icon_msh" @isset($customizeUsers4->icon) {{$checked='checked'}} @endisset>
</div>
                     <div class="col-md-1 mb-4">
    	
					 <label for="tag_msh4" class="form-label mt-3">التاغات</label> 
                     <input class="" type="checkbox" id="tag_msh4" name="tag_msh" value="tag"  @isset($customizeUsers4->tag) {{$checked='checked'}} @endisset>
</div>
                     <div class="col-md-1 mb-4">
    	
					 <label for="title_msh4" class="form-label mt-3">العنوان</label> 
                     <input class="" type="checkbox" id="title_msh4" name="title_msh" value="title"  @isset($customizeUsers4->title) {{$checked='checked'}} @endisset>
</div>
<div class="col-12 mt-2 ">
  <button type="submit"   class="btn btn-dark" style="background-color: #42424a">حفظ</button>
</div>
       </div>
  
  
  </form>





        {{-- Footer --}}

        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" style="background-color: #42424a">
            <i class="material-icons py-2" style="color:white">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-end">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-start mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-end">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 me-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch me-auto my-auto">
                        <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch me-auto my-auto">
                        <input class="form-check-input mt-1 float-end me-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-info w-100"
                    href="https://www.creative-tim.com/product/material-dashboard">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
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
<style>
          @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    body{
       font-family: NotoKufiArabic !important;
    }
</style>
