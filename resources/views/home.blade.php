@extends('layouts.app')

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/styles2.css" type='text/css' rel='stylesheet'>
@stop



@section('content')
<div class="container">
    <div id="campmonkey">
        <header id="mainHeader">
            <div id="mainHeaderText">
                <h1>CampMonkey</h1>
                <p>Your guide to the best Campgrounds</p>
            </div>
        </header>
        <main>
            <p>Welcome to CampMonkey. As a scout leader, I know it can be hard to keep track of the campgrounds
                that are available to use as well as which campgrounds have fees to use. This site provides
                a listing of campgrounds with reviews to help keep track of the various campgrounds and
                lets you save campgrounds as favorites.</p>









        </main>
    </div>
</div>
@endsection
