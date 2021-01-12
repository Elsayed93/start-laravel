@extends('offers.nav')

@section('title', 'Videos')

@section('content')

<div class="container">
    {{-- All Videos --}}
    <div class="row mt-5">
        <div class="col-sm-12">
            <h1>{{ __('index-videos.all-videos') }}</h1>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">

            <h2> Views: {{$video->views}}</h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/GiNWNd_Qpnk" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>

</div>
@endsection