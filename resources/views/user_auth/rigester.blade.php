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
          
                        <h4>أنشئ حساب جديد</h4>

 <div class="line">
             
                    </div>
                    <form action="{{ route('setRigester') }}" method="POST" class="fomr-sign" autocomplete="off">
                           @csrf
                        <div class="row mt-5 mb-4">
                            <div class=" col-12 col-sm-6 mb-2 ">
                                <label for="" class="mb-2">الاسم الأول</label>
                                <input type="text" class="form-control" name="name" placeholder="الاسم " aria-label="First name">
                                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:rgb(114, 5, 5)">{{ $message }}</strong>
                        </span>
                    @enderror
                            </div>
                       

                        <div class="col-12 col-sm-6 mb-2">
                            <label for="" class="mb-2">البريد الإلكتروني</label>
                            <input type="email" autocomplete="off" class="form-control" name="email" placeholder="البريد الإلكتروني" aria-label="البريد الإلكتروني">
                               @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        

                    
                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">كلمة السر</label>
                                <input type="password" class="form-control" name="password" placeholder="كلمة السر" aria-label="First name">
                                             @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">تأكيد كلمة السر</label>
                                <input type="password"  name="password_confirmation" class="form-control" placeholder="تأكيد كلمة السر" aria-label="Last name">
                            </div>
                       
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="policy-form">
                                    <span class="policy">
                                        بالتسجيل في دليل الشركات العربية,انت توافق على 
                                        <a href="{{url('pindPage/privacy/19')}}">الخصوصية</a>
                                        و
                                        <a href="{{url('pindPage/terms/20')}}">الشروط و الأحكام</a>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="theme-btn primary-btn btn-sign w-100">تسجيل</button>
                    </form>
                    <div class="sec">
                        <p>
                            هل بالفعل لديك حساب
                            <a href="{{url('log-in')}}">دخول</a>
                        </p>
                    </div>
                </div>
             
             
            </div>
            </div>
               <div class="left-form">
                    <img src="{{url('/../public/uploading/register.svg')}}" alt="">
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
    margin-bottom:0px !important;
}
    .btnStyle{
            background-color: #f1bc31 !important;
    border: #f1bc31 !important;
    color:#fff  !important;
    }
</style>