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
                <div class="panel-heading">New Review for {{ $selected_campground->name }}</div>
                <div class="panel-body">
                    <em>* indicates required field</em>
                    <form class="form-horizontal" role="form" method='POST' action='/campgrounds/{{$selected_campground->id}}/reviews'>
                        {{ csrf_field() }}
                        <input id="campground_id" name="campground_id" type="hidden" value="{{ $selected_campground->id }}">

                        <div class="form-group{{ $errors->has('review') ? ' has-error' : '' }}">
                            <label for="review" class="col-md-4 control-label">Review<em> *</em></label>

                            <div class="col-md-6">
                                <input id="review" type="text" class="form-control" name="review" value="{{ old('review') }}">

                                @if ($errors->has('review'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('review') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
