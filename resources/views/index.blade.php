@extends('layouts.master')

@section('content')
    <a href="/campsites">Click here to see all campsites</a>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <!--script src="/js/books/show.js"></script-->
@stop
