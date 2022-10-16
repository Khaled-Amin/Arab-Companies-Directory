@extends('layouts.HeaderFooter')
@section('content')


  <section class="section">
        <div class="container">
            <div class="box-main-foo">
                <div class="sign-in">
                    <div class="part-above">
                                        @if(session('error'))
 <span class="invalid-feedback justify-content-center mb-3" style="display: flex;font-size:16px;" role="alert">
                                <strong style="color: red">{{session('error')}}</strong>
                            </span>
@endif
            

                        <h4>مرحبا بك مجددا</h4>


         
<form method="POST" action="{{ route('setLogIn') }}" class="fomr-sign" id="appointment-form">
     @csrf
            <div class="col mb-4">
                 <label class="mb-2" for="typeEmailX-2">ايميل</label>
              <input type="email" value="{{ old('email') }}" id="typeEmailX-2 " name="email" class="form-control @error('email') is-invalid @enderror" />
             
               @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror
            </div>

            <div class="col mb-4">
                              <label class="mb-2" for="typePasswordX-2">كلمة السر</label>
              <input type="password"   name="password" id="typePasswordX-2" class="form-control  @error('password') is-invalid @enderror" />

                   @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>

            <!-- Checkbox -->
          

            <button class="theme-btn primary-btn btn-sign w-100 mt-4" type="submit">سجل</button>

          </form>
          
    <div class="sec">
          <p>
                          هل نسيت كلمة المرور؟
                            <a href="{{ url('goForgetPassword') }}">استعادة كلمة المرور </a>
                        </p>
                        <p>
                            ليس لديك حساب؟
                            <a href="{{ url('rigesteration') }}">سجل الأن</a>
                        </p>
                    </div>
</div>

              </div>
              <div class="left-form-login">
                    <img src="{{url('/../public/uploading/login.svg')}}" alt="">
                </div>
        </div>
    </div>
    
  </section>
  
  
  

@endsection

<style>
   @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
.sign-in {
     margin-bottom: 0rem !important;
}
  
</style>