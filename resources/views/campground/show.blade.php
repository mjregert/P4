@extends('layouts.master')


@section('title')
    {{ $campground->name }}
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
<div id="campgrounds">
    <h2>{{ $campground->id }}</h2>
    <h2>{{ $campground->name }}</h2>
    <p>{{ $campground->description }}</p>
    <p>{{ $campground->campsites }}</p>
    <p>{{ $campground->fees }}</p>
    <p>{{ $campground->address }}</p>
    <p>{{ $campground->city }}</p>
    <p>{{ $campground->state }}</p>
    <p>{{ $campground->zipcode }}</p>
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
