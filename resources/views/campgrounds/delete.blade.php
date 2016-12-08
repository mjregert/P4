@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $selected_campground->name }}
@endsection

@section('content')

    <h1>Confirm deletion</h1>
    <form method='POST' action='/campgrounds/{{ $selected_campground->id }}/destroy'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h2>Are you sure you want to delete <em>{{ $selected_campground->name }}</em>?</h2>

        <input type='submit' value='Yes'>

    </form>

@endsection
