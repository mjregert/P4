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
<small><em>* indicates required field</em>
<form method='POST' action='/campgrounds'>
    <div>
        <label for="name">Campground Name or Title<em> *</em></label><br>
        <input id="name" name="name" type="text" required aria-required="true">
    </div>
    <div>
        <label for="description">Description of the Campground</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="campsites">Number of Campsites</label>
        <input id="campsites" name="campsites" type="number" min="1">
        <input id="restrooms" name="restrooms" type="checkbox">
        <label for="restrooms">Restrooms</label>
        <label for="fees">Usage Fee (if applicable)</label>
        $<input id="fees" name="fees" type="number" min="0">
    </div>
    <div>
        <label for="address">Address<em> *</em></label><br>
        <input id="address" name="address" type="text">
    </div>
    <div>
        <label for="city">City<em> *</em></label>
        <label for="state">State<em> *</em></label>
        <label for="zipcode">Zip Code<em> *</em></label><br>
        <input id="city" name="city" type="text">
        <select id="state" name="state">
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
        </select>
        <input id="zipcode" name="zipcode" type="text">
    </div>
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
