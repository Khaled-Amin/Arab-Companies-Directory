@extends('layouts.HeaderFooter')
@section('metaAdds')
@isset($adds){!! $adds->atHead !!} @endisset
<meta charset="UTF-8">
<meta name="description" content="@isset($pindPage){{$pindPage->content   }} @endisset">
<meta name="keywords" content="@isset($pindPage){{ $pindPage->keyword }} @endisset">
@isset($DataSittings->photoSocialMediaLink)
<meta name="og:image" content="{{asset("uploading/". $DataSittings->photoSocialMediaLink  ."")}}">@endisset
@isset($DataSittings->socialMidialinkden)
 <meta property="og:url" content="{{$DataSittings->socialMidialinkden}}" />@endisset
  @isset($DataSittings->socialMidiaYoutube)
 <meta property="og:url" content="{{$DataSittings->socialMidiaYoutube}}" />@endisset
     @isset($DataSittings->socialMidiaInstagram)
 <meta property="og:url" content="{{$DataSittings->socialMidiaInstagram}}" />@endisset
     @isset($DataSittings->socialMidiaFacebook)
 <meta property="og:url" content="{{$DataSittings->socialMidiaFacebook}}" />@endisset
     @isset($DataSittings->socialMidiaTelegram)
 <meta property="og:url" content="{{$DataSittings->socialMidiaTelegram}}" />@endisset
 @isset($DataSittings->favicon)
 <link rel="icon" type="image/x-icon" href="{{ asset("upload/". $DataSittings->favicon  ."")}}">@endisset

<title>
    @isset($pindPage){{$pindPage->page_name   }} @endisset
</title>
@endsection
@section('content')
    

<div class="container mt-5 mb-5">
		<div class="contain-mean">
			<div class="contain-box1 cbox">
				<h2>{{$pindPage->page_name   }}</h2>
				<p class="objects">
		            {!! $pindPage->content   !!}
				</p>
			</div>
			<!--<div class="contain-box2 cbox">-->
			<!--	<div class="immg">-->
			<!--		<img src="{{ url('/../public/upload/pindPage.webp') }}" class="editPhoto " alt="">-->
			<!--	</div>-->
				
			<!--</div>-->
		
		</div>
	
	
	
	</div>
	@endsection
<style>
    
    @media only screen and (min-width:900px)
    {
        .editPhoto{
        width: 100% !important;
        height: 32rem !important;
    object-fit: cover;
    filter: brightness(0.6);
    z-index: 0;
    }
}
@media only screen and (max-width:600px)
    {
        .content{
    font-size: 15px;
}
.grid{
    display: grid;
grid-template-rows: auto auto auto  !important;
grid-template-columns: auto !important ;
}
}
.content{
    color: #5d5d5d;
}
.editPhoto{
    height: auto;
    object-fit: cover;
    filter: brightness(0.6);
    z-index: 0;
    width: 100%;
}

    .h1Title{
        z-index: 1;
    position: absolute;
    width: 100%;
    height: 47%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    word-spacing: 1rem;
    letter-spacing: 1.6px;
    }


.imgLatestCompany{
    height: 130px !important;
}
.grid{
    display: grid ;
grid-template-rows: auto auto auto;
grid-template-columns: auto auto auto;
}
</style>