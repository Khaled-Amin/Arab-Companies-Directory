@extends('layouts.HeaderFooter')
@section('content')
 <section class="section-part mt-4 mb-5">
                <div class="container">
                          <div class="box-part-main">
    @isset($companies)
    @foreach ($companies as $company)
        @isset($company->mowasa_at)
                        <div class="child-box">
                            <a href="{{ route('viewDetails',['id'=>$company->id,'nameCompany'=>$company->name_url]) }}" class="anchor-company">
                                <div class="img">
                                    <img src="{{           url( "/../public/logoForCompanies/".$company->logo."")  }}" alt="{{$company->name_company  }}">
                                </div>
                                <p class="title">{{$company->name_company  }}</p>
                            </a>
                            <hr style="background-color:red;">
                            <div class="under-hr">
                                <span class="title-span"><i class="far fa-eye"></i>{{$company->views  }}</span>
                                <p>{{$company->mowasa_at}}</p>
                            </div>
                            
                        </div>
                    @endisset
                    
                    
                    
     
    <!--<div class="col-12 col-sm-8 mb-2 d-flex justify-content-center d-sm-block mx-5 ">-->
    <!--    <div class="row p-2 bg-white carded rounded" style="">-->

    <!--        <a href="{{ route('viewDetails',['id'=>$company->id,'nameCompany'=>$company->name_url]) }}" class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" style="height: 7rem;"-->
    <!--        src="{{           url( "/../public/logoForCompanies/".$company->logo."")  }}"></a>-->
    <!--        <div class="col-md-7 mt-1">-->
    <!--            <a href="{{ route('viewDetails',['id'=>$company->id,'nameCompany'=>$company->name_url]) }}" class=" ">  <h5 class="title">{{$company->name_company  }}</h5></a>-->
               
                
    <!--            <p class="text-justify text-truncate fs-content  mb-0">{{ $company->discreption }}<br><br></p>-->
    <!--        </div>-->
    <!--        <div class="align-items-center align-content-center col-md-2  mt-1">-->
                
    <!--            <div class="d-flex flex-column mt-4"><a href="{{ route('viewDetails',['id'=>$company->id,'nameCompany'=>$company->name_url]) }}" class="btn  btn-sm btnOringe" >التفاصيل</a></div>-->
    <!--        </div>-->
    <!--      <div class="col mt-1 "><img class="margin" src="https://img.icons8.com/ios-filled/20/000000/address--v1.png"/><p class="address">{{ $company->city }}</p></div>-->
    
    <!--    </div></div>-->
        @endforeach
        
            @foreach ($companies as $company)
    
@empty($company->mowasa_at)
   
    
            
                  <div class="child-box">
                            <a href="{{ route('viewDetails',['id'=>$company->id,'nameCompany'=>$company->name_url]) }}" class="anchor-company">
                                <div class="img">
                                    <img src="{{           url( "/../public/logoForCompanies/".$company->logo."")  }}" alt="{{$company->name_company  }}">
                                </div>
                                <p class="title">{{$company->name_company  }}</p>
                            </a>
                            <hr style="background-color:red;">
                            <div class="under-hr">
                                <span class="title-span"><i class="far fa-eye"></i>{{$company->views  }}</span>
                          
                            </div>
                            
                        </div>
    
     @endempty

        @endforeach
    @endisset
    </div>
    
    
    </div>
</section>
@endsection

<style>

    .labelCheck{
        margin-right: 1.3rem !important;

    }
    .heightSelect{
        height: 2.1rem !important;
        cursor: pointer;
    }
.heightFilter{
    min-height: 25rem !important;
    max-height: auto !important;
}
.btnOringe{
    color:#fff !important; background-color: #f1bc31 !important;
                    border-color: #f1bc31 !important;
}
    .address{
        font-size: 13px;
        display: inline;
        margin-right: 9px;
    position: absolute;
    top: 2px;
    }
.margin{
    margin-right: 23%;

}

body {
    background: #eee
}
.grid{
    display: grid ;
grid-template-rows: auto auto auto;
grid-template-columns: auto auto auto;
}
.product-image {
    width: 100%
}
    .fs-content{
        font-size: 12px;
       
    }
    .carded{
        height:10rem ;
    }
    @media only screen and (max-width: 770px) and (min-width:601px)
    {
        .carded{
        height:auto ;
       
        }
        .img-responsive{
        object-fit: cover;
    }
    }
    @media only screen and (max-width: 600px) and (min-width:451px)
    {
        
    .grid{
    display: grid;
grid-template-rows: auto auto auto  !important;
grid-template-columns: auto !important ;
}
        .margin{
    margin-right: 1%;
    margin-top: 1%;
}
        .carded{
        height:auto ;
        width:70%;
        }
    .img-responsive{
        object-fit: cover;
    }
    
    .address{
        font-size: 13px;
        display: inline;
        position: absolute;
        top: 4px;
      
    }
    }
    @media only screen And (max-width:450px)
    {


        .margin{
    margin-right: 1%;
    margin-top: 1%;
}
        .carded{
        height:auto ;
       width: 56%;
        }
    .img-responsive{
        object-fit: cover;
    }
    }
    .address{
        font-size: 13px;
        display: inline;
        position: absolute;
        top: 4px;
      
    }

    }

</style>


