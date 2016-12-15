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
    <p>Welcome to CampMonkey. As a scout leader, I know it can be hard to keep track of the campgrounds
        that are available to use as well as which campgrounds have fees to use. This site provides
        a listing of campgrounds with reviews to help keep track of the various campgrounds and
        lets you save campgrounds as favorites.  To add campgrounds to the list and provide reviews, you
        must register and log in.</p>

    <div id="campgrounds_header">
        <h2>All Campgrounds
            @if(Auth::check())
                <a href="/campgrounds/create">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a>
            @endif
        </h2>
        @if(!$campgrounds->isEmpty())
            <nav id="campgrounds">
                <ul>
                    @foreach($campgrounds as $campground)
                        @if($campground->id == $selected_campground->id)
                            <li><i class="fa fa-tree" aria-hidden="true"></i>
                                <a class="active" href="/campgrounds/{{$campground->id}}">{{ $campground->name }}</a>
                                @if(Auth::check())
                                    <a href="/campgrounds/{{$campground->id}}/delete">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </li>
                        @else
                        <li><i class="fa fa-tree" aria-hidden="true"></i>
                            <a href="/campgrounds/{{$campground->id}}">{{ $campground->name }}</a>
                            @if(Auth::check())
                                <a href="/campgrounds/{{$campground->id}}/delete">
                                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                </a>
                            @endif
                        </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        @else
            <h2>No campgrounds available at this time</h2>
        @endif
    </div>
    <div id="details">
    @if($selected_campground)
        <h2>{{ $selected_campground->name }}
            @if(Auth::check())
                <a href="/campgrounds/{{ $selected_campground->id }}/edit">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
            @endif
        </h2>
        <div>
            <h3>Description of the Campground</h3>
            @if($selected_campground->description == "")
                <p>No description provided</p>
            @else
                <p>{{ $selected_campground->description }}</p>
            @endif
        </div>
        <div>
            <h3>Type</h3>
            <p>{{ $selected_campground->type->description}}</p>
        </div>
        <div>
            <h3>Number of Campsites</h3>
            <p>{{ $selected_campground->campsites }}</p>
        </div>
        <div>
            <h3>Usage Fee (if applicable)</h3>
            <p>${{ $selected_campground->fees }}</p>
        </div>
        <div>
            <h3>Address</h3>
            <p>{{ $selected_campground->address }}</p>
            <p>{{ $selected_campground->city }}, {{ $selected_campground->state }}&nbsp;&nbsp;{{ $selected_campground->zipcode }}</p>
        </div>
    @else
        <p>No campground selected</p>
    @endif
    </div>
    <div id="reviews">
        <h2>Reviews
            @if(Auth::check())
                <a href="/campgrounds/{{$selected_campground->id}}/reviews/create">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a>
            @endif
        </h2>
        @if(!$selected_campground->reviews->isEmpty())
            @foreach($selected_campground->reviews as $review)
                <div class="review">
                    <h3>{{ $review->username }}</h3>
                    <em>{{ $review->created_at }}</em>
                    <p>{{ $review->review }}</p>
                </div>
            @endforeach
        @else
            <p>No Reviews Available</p>
        @endif
    </div>
@endsection
