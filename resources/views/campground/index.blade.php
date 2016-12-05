@extends('layouts.master')


@section('title')
    Show all Campgrounds
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <!--link href="/css/books/show.css" type='text/css' rel='stylesheet'-->
@stop


@section('content')
<p>Welcome to <em>CampMonkey</em>.  As a scout leader, I know it can be hard to keep track of the campgrounds
    that are available to use as well as which campgrounds have fees to use.  This site provides a listing of
    campgrounds with reviews to help keep track of the various campgrounds and lets you save campgrounds as favorites.</p>
    <div id="blue">
<div id="campgrounds">
    <h1>All Campgrounds<a href="/campgrounds/create"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h1>
    @if(!$campgrounds->isEmpty())
        <nav>
            <ul>
                @foreach($campgrounds as $campground)
                    @if($campground->id == $selected_campground->id)
                        <li><i class="fa fa-tree" aria-hidden="true"></i><a class="active" href="/campgrounds/{{$campground->id}}">{{ $campground->name }}</a></li>
                    @else
                    <li><i class="fa fa-tree" aria-hidden="true"></i><a href="/campgrounds/{{$campground->id}}">{{ $campground->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </nav>
    @else
        <h2>No campgrounds available at this time</h2>
    @endif
</div>
<div id="reviews">
    <h1>Reviews<a href="/campgrounds/create"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h1>
    @if(!$selected_campground->reviews->isEmpty())
        @foreach($selected_campground->reviews as $review)
        <div class="review">
            <h2>{{ $review->username }}</h2>
            <em>{{ $review->created_at }}</em>
            <p>{{ $review->review }}</p>
        </div>
        <hr>
        @endforeach
    @else
        <p>No Reviews Available</p>
    @endif
</div>
<div id="details">
    @if($selected_campground)
        <h1>{{ $selected_campground->name }}</h1>
        <div>
            <h2>Description of the Campground</h2>
            <p>{{ $selected_campground->description }}</p>
        </div>
        <div>
            <h2>Number of Campsites</h2>
            <p>{{ $selected_campground->campsites }}</p>
        </div>
        <div>
            <h2>Usage Fee (if applicable)</h2>
            <p>${{ $selected_campground->fees }}</p>
        </div>
        <div>
            <h2>Address</h2>
            <p>{{ $selected_campground->address }}</p>
            <p>{{ $selected_campground->city }}, {{ $selected_campground->state }}&nbsp;&nbsp;{{ $selected_campground->zipcode }}</p>
        </div>
    @else
        <h1>No campground selected</h1>
    @endif
</div>
</div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <!--script src="/js/books/show.js"></script-->
@stop
