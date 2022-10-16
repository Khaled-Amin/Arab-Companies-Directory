@extends('layouts.HeaderFooter')

@section('content')
  <section class="section-part mt-4 mb-5">
                <div class="container">
                          <div class="box-part-main">
                              
                             @foreach($companies_id as $company)

@foreach($company->companies as $companys)
        @isset($companys->mowasa_at)
        @if($companys->status ==0)
@continue
@else
      <div class="child-box">
                            <a href="{{ route('viewDetails',['id'=>$companys->id,'nameCompany'=>$companys->name_url]) }}" class="anchor-company">
                                   <div class="img">
                                 
                                 
                               @isset($companys->logo )
                                    <img src="{{url( "/../public/logoForCompanies/".$companys->logo."")  }}" alt="{{$company->name_company}}">
                                    @endisset
                                    @empty($companys->logo )
                                    
                                      <img src="{{url("/../public/upload/".$DataSittings->photoForNotHavePhoto."")  }}" alt="{{$company->name_company}}">
                                    @endempty
                                </div>
                                <p class="title">{{$companys->name_company  }}</p>
                            </a>
                            <hr style="background-color:red;">
                            <div class="under-hr">
                                <span class="title-span"><i class="far fa-eye"></i>{{$companys->views  }}</span>
                                <p>{{$companys->mowasa_at}}</p>
                            </div>
                            
                        </div>
                        @endif


@endisset

@endforeach
@endforeach 
                              
@foreach($companies_id as $company)

@foreach($company->companies as $companys)
@empty($companys->mowasa_at)
@if($companys->status ==0)
@continue
@else
      <div class="child-box">
                            <a href="{{ route('viewDetails',['id'=>$companys->id,'nameCompany'=>$companys->name_url]) }}" class="anchor-company">
                                <!--<div class="img">-->
                                <!--    <img src="{{           url( "/../public/logoForCompanies/".$companys->logo."")  }}" alt="{{$companys->name_company  }}">-->
                                <!--</div>-->
                                
                                        <div class="img">
                                 
                               @isset($companys->logo )
                                    <img src="{{url( "/../public/logoForCompanies/".$companys->logo."")  }}" alt="{{$company->name_company}}">
                                    @endisset
                                    @empty($companys->logo )
                                    
                                      <img src="{{url("/../public/upload/".$DataSittings->photoForNotHavePhoto."")  }}" alt="{{$company->name_company}}">
                                    @endempty
                                </div>
                                
                                
                                
                                <p class="title">{{$companys->name_company  }}</p>
                            </a>
                            <hr style="background-color:red;">
                            <div class="under-hr">
                                <span class="title-span"><i class="far fa-eye"></i>{{$companys->views  }}</span>
                               
                            </div>
                            
                        </div>
                        @endif
@endempty



@endforeach
@endforeach
 </div>
    
    
    </div>
</section>
@endsection


<style>
.marginBootom{
    margin-bottom:8rem;
}
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

