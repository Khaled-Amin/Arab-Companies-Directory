 @extends('dash-board.rtl')
@section('content')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        
          <h6 class="font-weight-bolder mb-0">شركات مميزة </h6>
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
    
    
    
    
    <form method="POST" action="{{ route('setUniquePeople') }}"  class=" m-5  shadow ">
  @csrf
  <h4 class="d-flex justify-content-center">بمجرد وضع id الشركة ستصبح مميزة<h4/>
  <div class="row my-5  ">
      <div class="col-12 d-flex justify-content-evenly my-3">
  <input type="number" class="widthInput  " name="number_id2" value="@isset($uniquePeople){{$uniquePeople->number_id2}}@endisset" placeholder="1" >
    <input type="number" class="widthInput " name="number_id3" value="@isset($uniquePeople){{$uniquePeople->number_id3}}@endisset"  placeholder="2"  >
      <input type="number" class="widthInput " name="number_id4" value="@isset($uniquePeople){{$uniquePeople->number_id4}}@endisset"  placeholder="3"  >
        <input type="number" class="widthInput " name="number_id5" value="@isset($uniquePeople){{$uniquePeople->number_id5}}@endisset"  placeholder="4"  >
        </div>
             <div class="col-12 d-flex justify-content-evenly  my-3">
          <input type="number" class="widthInput " name="number_id6" value="@isset($uniquePeople){{$uniquePeople->number_id6}}@endisset"  placeholder="5"  >
            <input type="number" class="widthInput " name="number_id7" value="@isset($uniquePeople){{$uniquePeople->number_id7}}@endisset"  placeholder="6"  >
              <input type="number" class="widthInput " name="number_id8"  value="@isset($uniquePeople){{$uniquePeople->number_id8}}@endisset" placeholder="7"  >
                <input type="number" class="widthInput " name="number_id9" value="@isset($uniquePeople){{$uniquePeople->number_id9}}@endisset"  placeholder="8"  >
                 </div>
                  <div class="col-12 d-flex justify-content-evenly  my-3">
                   <input type="number" class="widthInput " name="number_id13"  value="@isset($uniquePeople){{$uniquePeople->number_id9}}@endisset"    placeholder="9"  >  
    <input type="number" class="widthInput " name="number_id10" value="@isset($uniquePeople){{$uniquePeople->number_id10}}@endisset"  placeholder="10"  >
      <input type="number" class="widthInput " name="number_id11" value="@isset($uniquePeople){{$uniquePeople->number_id11}}@endisset"  placeholder="11"  >
        <input type="number" class="widthInput " name="number_id12" value="@isset($uniquePeople){{$uniquePeople->number_id12}}@endisset"  placeholder="12" > </div>  </div>
             <div class="col-12 d-flex justify-content-center">
          <button type="submit"   class="btn btn-dark" style="background-color: #42424a">حفظ</button>
       </div>

  
  
  </form>
    
    
@endsection
<style>
       @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
    body{
       font-family: NotoKufiArabic !important;
    }
    .width{
       width: 75rem;
       flex-wrap:wrap;
    }
    .widthInput{
        width:7rem;
    }
</style>