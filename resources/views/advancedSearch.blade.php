@extends('layouts.HeaderFooter')
@section('content')

<div class="search-advanc mt-5">
    <div class="container">
        <div class="ddd d-flex">

        
            <div class="advanced-se">
                <form action="{{ route('filterData',['nameCountry'=>$className,'className'=>$nameCountry]) }}" method="GET" class="mt-5">
                    @csrf
                     <input type="hidden" name="name_country" value="{{ $nameCountry }}">
            <input type="hidden" name="href_mainclass" value=" {{ $className }} ">
                    <select class="form-select" name="cityFilter" aria-label="Default select example">
       
                        <option selected>اختر</option>
                                        @isset($cities)
           @foreach($cities as $city)
        <option value="{{ $city->city }}">{{ $city->city }}</option>
           @endforeach
       @endisset
                      
                    </select>
        

        
        
                    <label for="" class="mt-5">خدمات الشركة</label>
                    <div class="group-input mt-3">
                             @isset($typeContents)
    @foreach($typeContents as $typeContent)
    <div class="col">
    <input type="checkbox" class="inp " name="typeContentsCheck" id="typeContentsCheck"  value="{{ $typeContent->type_company }}" >
    <label for="typeContentsCheck"  class="form-check-label labelCheck">{{ $typeContent->type_company }}</label>
</div>
    @endforeach

    @endisset
                       
                    </div>
                    <div class="bttn">
                        <button class="btn but-ad">بحث</button>
                    </div>
                    
                </form>
            </div>
            <div class="imgg">
                <img src="{{url('/../public/uploading/register.svg')}}" alt="">
            </div>
        </div>
    </div>
</div>


@endsection
<style>
            @font-face {
        font-family: NotoKufiArabic;
        src: url("{{url("/../public/fonts/NotoKufiArabic-VariableFont_wght.ttf")}}");
    }
</style>