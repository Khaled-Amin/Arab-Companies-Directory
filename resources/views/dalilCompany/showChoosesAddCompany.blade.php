@extends('layouts.HeaderFooter')
@section('content')
<div class="container">
    <div class="row mt-5  align-items-center " style="background-color:#fff !important; height:12rem; margin-bottom:10rem;">
         <div class="col d-flex justify-content-center ">
        <a  href="{{url('log-in')}}" class="  btn d-flex justify-content-center align-items-center" style="color:#fff;background-color:#6a0808;">أدراج شركة مع امكانية التعديل</a>
        </div>
        <div class="col d-flex justify-content-center align-items-center ">
           <a href="{{route('viewAddCompanyWithoutSession')}}" class=" d-flex justify-content-center align-items-center  btn" style="color:#fff;background-color:#6a0808;">أدراج شركة بدون امكانية التعديل</a>
       </div>
    </div>
</div>
@endsection