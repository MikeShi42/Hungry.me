@extends('layouts.default')
@section('head')
    {{ HTML::style('css/restaurant.css') }}
@stop
@section('content')
    <div id="container">
        <div class="restaurant-img"></div>

        <div id="restaurant-description">
            <span id="name">{{{$restaurant->name}}}</span><br/>
            <span class="quote">"{{{$restaurant->description}}}"</span>
            <br/>
            {{{$restaurant->location}}}
            <br/>
            {{{$restaurant->phoneNumber}}}
            <br/>
            <!--11:00 AM - 10:00 PM Mon-Sun-->
        </div>
    </div>
@foreach($foods as $food)
    <div class="review" id="review1">
        <div class="food-pic" id="review1-pic"></div>
        <div class="food-text">
            <span class="food-name" style="line-height:30px;">{{{$food->name}}} - ${{{number_format((float)$food->price, 2, '.', '')}}} </span>

            <div class="grey-review-stars">
                <div class="red-review-stars" style="width: {{{ $ratings[$food->id]['Rating'] }}}% ">
                </div>
            </div>
            <br/>
            <span class="food-description">
                {{{ $food->description }}}
            </span>
            <br/>
            <span id="number-of-reviews" style="line-height:30px;"><a href="#">{{{ $ratings[$food->id]['Count'] }}} Reviews &#10230;</a></span>
        </div>
    </div>
@endforeach

@stop