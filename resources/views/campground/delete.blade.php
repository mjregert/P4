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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Confirm Deletion</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method='POST' action='/campgrounds/{{ $selected_campground->id }}'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <p class="confirmation">Are you sure you want to delete <em>{{ $selected_campground->name }}</em>?</p>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Delete
                                </button>
                                <a class="btn btn-link" href="{{ url('/') }}">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
