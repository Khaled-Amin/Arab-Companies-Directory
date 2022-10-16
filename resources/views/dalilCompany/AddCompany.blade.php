@extends('layouts.HeaderFooter')
@section('metaAdds')
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <title>دليل الشركات العربية</title>
@endsection
  
@section('content')
{{-- {{ session_start()}} --}}




<form method="POST" action="{{ route('AddOrUpdateCompany') }}" class=" m-5  " enctype="multipart/form-data" style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px !important;background-color:#fff;padding: 2rem;">
    @csrf
    {{-- ارسال الأخطاء --}}

    @if (!empty(session('msg')))
        <div class="row backgroundW p-4  " style="box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;">
            <div class="alert" style="background-color: #42424a; ">
                <ul>
                    <li style="color:white" class="">{{ session('msg') }}</li>
                </ul>
            </div>
        </div>
    @endif
    <div class="row backgroundW p-4  ">
        @if ($errors->any())
            <div class="alert" style="background-color: #42424a ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:white" class=>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @isset($customizeUsers->nameCompany)
       
        <div class="col-md-6 mb-3">
            <label for="inputNameCompany" class="form-label">أسم الشركة</label>
            
            <input type="text" class="@error('nameWebsite') is-invalid @enderror form-control "
                name="name_company" id="inputNameCompany" value="{{ old('name_company') }}"
                
                required>
        </div>@endisset
          @isset($customizeUsers->customizeCompany)
           <div class="col-md-6 mb-3">
            <label for="inputNameCompany" class="form-label">تصنيف الشركة</label>
                                                <select id="ddlMainCategories" name="type_company" class="form-select" style="">
                                            @isset($mainClasses)
                                                
                                           @foreach ($mainClasses as $mainClass)
                                               
                                          
                                        <optgroup class="parent" label={{ $mainClass->name_mainClass }}></optgroup>
                                        @isset($subClasses)
                                                @foreach ($subClasses as $subClass)
                                                    
                                                @if($mainClass->name_mainClass ==$subClass->name_mainClass)
                                                <option value="{{ $subClass->name_subClass }}">        {{ $subClass->name_subClass }}</option>                                    
                                            
                                                                          
                                              @endif
                                                @endforeach
                                                @endisset
                                                @endforeach
                                                @endisset
                                    
                                      
                                            
                                        
                                    
                                        </select>
</div>@endisset

     @isset($customizeUsers->country)
        <div class="col-md-6 mb-3">
            <label for="ArabCountry" class="form-label">اسم الدولة</label>
            <select name="name_country" class="form-select" id="ArabCountry">
                <option value="" disabled selected>إختر</option>
                @isset($countriess)
                @foreach($countriess as $country)
                <option value="{{ $country->country_name }}" @isset($Company) @if($Company->name_country==$country->country_name) selected @endif @endisset>{{ $country->country_name }}</option>
                @endforeach
                @endisset
              </select>
        </div>
        @endisset
          @isset($customizeUsers->city)
        <div class="col-md-6 mb-3">
            <label for="city" class="form-label ">المدينة</label>
           <select name="city" class="form-select" id="city" value="{{ old('city') }}" >
                <option value=""  ></option>
               </select>
        </div>
        @endisset
            @isset($customizeUsers->title)
        <div class="col-md-6 mb-3">
            <label for="title" class="form-label  ">العنوان</label>
            <input type="text" class="form-control" name="title" id="title"
            value="{{ old('title') }}"
               >
        </div>
        @endisset
            @isset($customizeUsers->telephone)
        <div class="col-md-6 mb-3">
            <label for="phonea" class="form-label "> الهاتف مع رمز الدولة</label>
            <input type="text" class="form-control" name="telephone_fix" id="phonea"
               value="{{ old('telephone_fix') }}"
               >
        </div>@endisset
              @isset($customizeUsers->phone)
        <div class="col-md-6 mb-3">
            <label for="phoneo" class="form-label  ">الجوال مع رمز الدولة</label>
            <input type="text" class="form-control" name="number_phone" id="phoneo"
              value="{{ old('number_phone') }}"
               >
        </div>@endisset
          @isset($customizeUsers->email)
         <div class="col-md-6 mb-3">
            <label for="email" class="form-label  ">البريد الالكتروني</label>
            <input type="email" class="form-control" name="email" id="email"
             value="{{ old('email') }}"
              >
        </div>
        @endisset
         @isset($customizeUsers->facebook)
        <div class="col-md-6 mb-3 ">
            <label for="inputlink1" class="form-label  ">رابط فيسبوك</label>
            <input type="text" class="form-control " name="facebook" id="inputlink1"
              value="{{ old('facebook') }}"
              >
        </div>@endisset
          @isset($customizeUsers->telegram)
        <div class="col-md-6 mb-3">
            <label for="inputlink2" class="form-label ">رابط تلغرام</label>
            <input type="text" class="form-control" name="telegram" id="inputlink2"
                   value="{{ old('telegram') }}"
                >
        </div>@endisset
          @isset($customizeUsers->instagram)
        <div class="col-md-6 mb-3">
            <label for="inputlink3" class="form-label ">رابط انستغرام</label>
            <input type="text" class="form-control" name="instagram" id="inputlink3"
               value="{{ old('instagram') }}"
            >
        </div>
@endisset
    @isset($customizeUsers->youtube)
        <div class="col-md-6 mb-3">
            <label for="inputlink4" class="form-label">رابط يوتيوب</label>
            <input type="text" class="form-control" name="youtube" id="inputlink4"
                    value="{{ old('youtube') }}"
             >
        </div>
@endisset
  @isset($customizeUsers->linkeden)
        <div class="col-12 mb-3">
            <label for="inputLinkden" class="form-label ">Linlkden رابط </label>
            <input type="text" id="inputLinkden" class="form-control" name="linkedin"
               value="{{ old('linkedin') }}"
               >
               
        </div>@endisset
          @isset($customizeUsers->discreption)
        <div class="col-md-12 mb-3">
            <label for="Description" class="form-label ">نبذة عن الشركة </label>
            <textarea type="text" id="Description" name="discreption" class="form-control resizeForTextarea"    value="{{ old('discreption') }}">
                
@isset($Company)
{{ $Company->discreption }}
@endisset
</textarea>
        </div>@endisset
          @isset($customizeUsers->tag)
              <div class="col-12 mb-3">
            <label for="tag" class="form-label "> (ادرج فرغ بين كل تاغ)التاغات </label>
            <input type="text" id="tag" class="form-control" name="tag"
               >
       </div>@endisset
        @isset($customizeUsers->icon)
        <div class="col-md-6 mb-4">
    	
					 <label for="companyIcon" class="form-label">أيقونة الشركة</label>
                     <input class="form-control" type="file" name="logo" id="companyIcon" style="height:35px !important">
</div>
@endisset

<!--@if(config('services.recaptcha.key'))-->
<!--    <div class="g-recaptcha"-->
<!--        data-sitekey="{{config('services.recaptcha.key')}}">-->
<!--    </div>-->
<!--@endif-->
        <div class="col-12 ">
            <button type="submit" class="btn btn-dark" style="background-color: #6a0808;">حفظ</button>
        </div>
        
</form>
</div>

</div>

<script src="https://www.google.com/recaptcha/enterprise.js?render=6Lec2QIgAAAAAFUswkHdB47lHDNejVLFn8nRhxcm"></script>
<script>
grecaptcha.enterprise.ready(function() {
    grecaptcha.enterprise.execute('6Lec2QIgAAAAAFUswkHdB47lHDNejVLFn8nRhxcm', {action: 'login'}).then(function(token) {
       ...
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">



        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function() {
                $('#ArabCountry').on('change', function(e) {
                    document.getElementById('city').innerHTML="<option value>أختر المدينة</option>";
                    var name_country = e.target.value;
                    console.log(name_country);
                    
                    $.ajax({
                        url: "{{ route('getCities') }}",
                        type: "POST",
                        data: {
                            name_country: name_country
                          
                                         
                        },
                        success: function(data) {
                            
                      data.forEach(element =>  document.getElementById('city').innerHTML+="<option value="+element.name_city+">"+element.name_city+"</option>" );
                     
                            },
                           
                        });
                 
                });
            });
    </script>

{{-- نهاية الاعدادات العامة --}}
@endsection
<style>
       @media only screen And (max-width:600px)
    {
    
        .grid{
        display: grid;
    grid-template-rows: auto auto auto  !important;
    grid-template-columns: auto !important ;
    }
    }
.inputfile{
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
.inputfile-1 + label {
    color: #f1e5e6;
    background-color: #1c1515;
}


.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
}
.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    margin-right: 0.25em;
}
svg:not(:root) {
    overflow: hidden;
}
.grid{
        display: grid ;
    grid-template-rows: auto auto auto;
    grid-template-columns: auto auto auto;
    }
        .form-label{
            font-size: 0.875rem;
    font-weight: 400 !important;
    color: #7b809a !important;
}
.btn{width:5rem !important;}
    
}

</style>