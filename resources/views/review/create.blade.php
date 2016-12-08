@extends('layouts.master')


@section('title')
    Write Review
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
<h1>New Review for {{ $selected_campground->name }}</h1>
<small><em>* indicates required field</em>
<form method='POST' action='/campgrounds/{{$selected_campground->id}}/reviews'>
    <div>
        <label for="name">User Name</label>
        <p> {{ Auth::user()->name }} </p>
    </div>
    <div>
        <label for="review">Review<em> *</em></label><br>
        <textarea id="review" name="review" value="{{ old('review', 'Some Review Here') }}"></textarea>
    </div>
    <input id="campground_id" name="campground_id" type="hidden" value="{{ $selected_campground->id }}">
    <div>{{ csrf_field() }}</div>
    <input id="reset" type="reset"><input id="submit" type="submit">
</form>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <!--script src="/js/books/show.js"></script-->
@stop
