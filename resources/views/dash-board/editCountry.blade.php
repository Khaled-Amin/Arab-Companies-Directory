
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
            <form action="{{ route('updateCountry' , $Country->id) }}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">اسم الدولة</label>
                    <input type="text" name="country_name" value="{{$Country->country_name}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">رابط الدولة</label>
                    <input type="text" name="href" value="{{$Country->href}}" class="form-controll">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="Description" class="form-labell ">كلمات مفتاحية</label>
                    <input type="text" name="keywords" value="{{$Country->keywords}}" class="form-controll">
                </div>
                 <div class="col-md-12 mb-3">
                    <label for="title" class="form-labell ">عنوان الصفحة</label>
                    <input type="text" name="title" value="{{$Country->title}}" class="form-controll">
                </div>
                
                           <div class="col-md-12 mb-3">
  <label for="Description" class="form-labell ">نبذة عن الموقع </label>
  <textarea type="text" id="Description" name="Description" class="form-controll resizeForTextarea" >@isset($Country->descrip){{$Country->descrip}}@endisset</textarea>
  </div>
  
        <label for="" class="form-labell  ">علم الدولة </label>
                           <input type="file" name="flag" id="photoSocialMediaLink" class="profilePhotoInput" > 
              <div class="col-md-3 border-right">
         
            @isset($Country->flag)
             <label for="photoSocialMediaLink"  class="cursor d-flex justify-content-center">
               
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5  "> <img class="rounded-circle  heightPhoto hoverPhoto  "  src="{{url("/../public/flags/".$Country->flag."")}}"> <h5 class="editButtonFor2 rounded-circle ">تعديل</h5><span class="text-black-50"></span><span> </span></div>
</label>
            @endisset
            @empty($Country->flag)
            <label for="photoSocialMediaLink" class="cursor d-flex justify-content-center">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 "  width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">أدرج صورة</span><span class="text-black-50"></span><span> </span></div>
     </label>
     @endempty
        </div>
  
                <div class="col-md-12 mb-4">
                     @if($Country->FirstCountry==1)
                    <input class="" type="checkbox" value="1" name="FirstCountry" id="flexCheckChecked" checked  style="width: 19px;cursor:pointer;" >
                    @elseif($Country->FirstCountry==0)
                        <input class="" type="checkbox" value="1" name="FirstCountry" id="flexCheckChecked"   style="width: 19px;cursor:pointer;" >
                    @endif
                    <label class="form-check-label" for="flexCheckChecked">
                    تظهر ببداية الدخول
                    </label>
                </div>
          

                <div class="col-12">
                    <button type="submit" class="btn btn-dark">تحديث</button>
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
