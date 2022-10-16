@extends('layouts.HeaderFooter')
@section('metaAdds')

 <link rel="stylesheet" href="url('/../public/css/style_profile.css')">
@endsection
@section('content')
  <div class="container mt-5">
        <div class="row">

          <div class="box-right col-3">
                <h4 class="mt-2" style="color: #000;">حسابي</h4>
                <hr>
                <form method="POST" action="{{route('AddOrUpdateUser')}}" enctype="multipart/form-data" >
<input type="file" name="profilePhoto" id="profilePhoto" class="profilePhotoInput" > 
         @isset($user->profilePhoto)
                <label  for="profilePhoto" class="img-profile">
                       
                               
                    <img src="{{url("/../public/profilePhoto/".$user->profilePhoto."")}}" alt="{{$user->profilePhoto}}">
                    <h5 class="editButton rounded-circle cursor ">تعديل</h5>
                 
                    </label >   @endisset
                    @empty($user->profilePhoto)
                      <label  for="profilePhoto" class="img-profile">
           
            <img    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
              <h5 class="editButton rounded-circle cursor ">تعديل</h5>
   
       </label > 
     @endempty
               
                <br>
                <ul class="list-tabs mt-3">
                    <a class="text-decoration-none color" href="{{url('profileShow')}}"><li>الرئيسية</li></a>
                    <a class="text-decoration-none color" href="{{url('editData')}}"><li>تعديل البيانات</li></a>
                    <a class="text-decoration-none color" href="{{route('show_my_company')}}"><li>شركاتي</li></a>
                    <a class="text-decoration-none color" href="{{route('logOutPersonal')}}"><li>تسجيل الخروج</li></a>
                </ul>
            </div>



 <div class="box-left col-8 d-flex justify-content-center align-items-center fs-5">
                <div class="box-profile">
                                                    @if(!empty(session('msg')))
    

<div class="row backgroundW p-4  ">
  <div class="alert" style="background-color:#6a0808;height: 3rem;">
<ul>
    <li  style="color:white" class="">{{ session('msg') }}</li>
  </ul>
  </div></div>
@endif
                
                         @csrf
                        <label for="">الاسم:</label>
                        <input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
                        <label for="">البريد الالكتروني:</label>
                        <input type="email" name="email" value="{{$user->email}}"  id="" class="form-control">
                        <label for="">كلمة السر:</label>
                        <input type="password" name="password"  value="{{$user->password}}" id="" class="form-control">
                                                <label for=""> تأكيد كلمة السر:</label>
                        <input type="password" name="repassword"  value="" id="" class="form-control">
                                <div class="mt-3 text-end"><button class="btn mb-1  profile-button" style="background-color:#6a0808; color:#fff;" type="submit">حفظ</button></div>
                 
                </div>
                   </form>
            </div>
        </div>
    </div>
  

@endsection



<style>
.color:hover{
color:#fff;
}

.btn{
    width: 5rem !important;
    height: 37px !important;
    margin-top: 0rem !important;
    }

.box-right{
    background-color: #f1f1f1;
    width: 30%;
    margin-right: 1rem;
}
.box-right .img-profile{
    width: 100px;
    height: 100px;
        display: flex;
    border-radius: 50px;
    overflow: hidden;
    margin: 0 auto;
    border: 5px solid #6a0808;
}
.box-right .img-profile img{
    width: 100%;
    height: 100%;
}
.list-tabs{
    list-style: none;
    display: flex;
    flex-direction: column;
}
.list-tabs li{
    margin-bottom: 1rem;
    padding: 3px;
    width: 108%;
    background-color: #6a0808;
    border-radius: 5px;
    transition: .3s;
}
.list-tabs a{
    color: #fff;

}
.list-tabs li:hover{
    background-color: #d87a7a;
    -webkit-box-shadow: 0px 1px 5px -1px #6a0808;
    -moz-box-shadow: 0px 1px 5px -1px #6a0808;
    box-shadow: 0px 1px 5px -1px #6a0808;
    transition: .3s;
}






.box-left{
    display: grid;
    grid-template-columns: auto auto auto;
    width: 65%;
    flex-wrap: wrap;
    margin-right: 1rem;
    background-color: #f1f1f1;
}
.box-left .div{
    width: 90%;
    display: block;
    background-color: #fff;
    margin-top: 1rem;
    margin-bottom: 1rem;
}

.box-left .anc{
    text-align: center;
    color: #fff;
    
}
.box-left .anc .underr-hr{
    width: 40%;
    padding-top: 5px;
    padding-bottom: 5px;
    margin: 0 auto;
    background-color: #6a0808;
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
    top: 228px;
    lrft: -26px;
    left: 74.3rem;
    width: 100px;
    height: 6.3rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
.editButton:hover{
    color:#fff;
background-color:#6a0808;
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

.color::hover{
    color:#fff;
}



</style>