@extends('layouts.app')



@section('content')
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%">
    <h3 class="w3-bar-item">Dashboard</h3>

    <a href="{{ route('sites.main') }}" class="w3-bar-item w3-button">Home</a>



</div>

<div style="margin-left:20%" >
    <div class="w3-container w3-teal">
        <h1>Admin</h1>
    </div>
<div class="container mt-lg-2">

    <div class="card">
        <div class="card-body">
            <p class="card-text"><span><a href="{{route('sites.main')}}" style="color: blue">Back/</a></span>{{$sites->site_name}}</p>
        </div>
    </div>

</div>


<div class="container mt-lg-4">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$sites->site_name}}</h5>
            <p class="card-text">Lnik :{{$sites->href}}</p>
            <p class="card-text">title:{{$sites->title}}</p>
            <p class="card-text">countries:{{$sites->countries}}</p>
            <p class="card-text">keyword:{{$sites->keyword}}</p>
            <p class="card-text">tags:{{$sites->tags}}</p>

            <h5><strong>Link Social media:</strong></h5>

            <p class="card-text">facebook:{{$sites->facebook}}</p>
            <p class="card-text">twitter:{{$sites->twitter}}</p>
            <p class="card-text">instagram:{{$sites->instagram}}</p>
            <p class="card-text">snapchat:{{$sites->snapchat}}</p>
            <p class="card-text">youtube:{{$sites->youtube}}</p>
            <p class="card-text">telegram:{{$sites->telegram}}</p>

            <h5><strong>Link App:</strong></h5>

            <p class="card-text">android:{{$sites->android}}</p>
            <p class="card-text">IOS:{{$sites->ios}}</p>
            <a href="#" class="btn btn-primary">More</a>
        </div>
    </div>
</div>
@endsection
