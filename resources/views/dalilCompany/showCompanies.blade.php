 @extends('layouts.HeaderFooter')
 @section('metaAdds')

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 @endsection
@section('content')


        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-white" role="alert">
                {{$message}}
            </div>

            @endif
      

        @if (count($errors) > 0)

        <ul>
            @foreach ($errors->all() as $item)
                <li class="text-danger">
                    {{$item}}
                </li>
            @endforeach
        </ul>

        @endif

        <div class="row backgroundW px-4 pb-4 mt-5 " style="margin-bottom:10rem;    overflow-x: auto;">
            <div class="container d-flex justify-content-start">
                
                <a  class="btn fs-6 backbtn mb-3  d-flex align-items-center justify-content-center" style="" href="{{ route('createCompanywithEdit') }}"> إضافة شركة جديدة</a>
            </div>
         
            <table class="table table-bordered ">
                <thead>
                    <tr>
                    
                        <th scope="col">اسم الشركة</th>
                        <th scope="col">تصنيف الفرعي للشركة</th>
                        <th scope="col">أسم الدولة</th>
                        <th scope="col">الجوال مع رمز الدولة</th>

                         <th scope="col">الموافقة</th>
                    </tr>
                </thead>
                <tbody>
@isset($showallCompany)
                    @foreach ($showallCompany as $company)


                        <tr>
                         
                            <td>{{$company->name_company}}</td>
                            <td>{{$company->type_company}}</td>
                            <td>{{$company->name_country}}</td>
                    
                            <td>{{$company->number_phone}}</td>
                            @if($company->status==1)
                            
                   <td>تمت الموافقة</td>
                   @else
 <td>لم تتم الموافقة بعد</th>
 @endif
                            <td>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <a href="{{route('editCompanywithEdit' , $company->id)}}" ><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <div class="col-sm">
                                            <a href="{{route('deleteCompanyForUser', ['id' => $company->id])}}"><i class="fa-solid fa-trash-can"></i></a>


                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
         
        </div>
  </div>
    <!--</main>-->

    {{-- sittings --}}

    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
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

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard/js/material-dashboard.min.js?v=3.0.2') }}"></script>
@endsection
<style>
.backbtn{
    background-color: #6a0808!important;
    color:#fff !important;
}
.backgroundW{
    background-color: white;
}
.btn{
        width: 14% !important;
    height: 2.3rem !important;
}
i{
    color:#6a0808!important;
}
i:hover{
    color:black!important;
}
</style>