@extends('layouts.default')
@section('head')
{{ HTML::style('/css/restaurant.css') }}
{{ HTML::style('/css/subpage_footer_style.css') }}
@stop
@section('content')
    <div id="container">
        <div class="restaurant-img" style="background-image: url('{{{ $restaurantImageBase64 }}}')"></div>

        <div id="restaurant-description">
            <span id="name">{{{$restaurant->name}}}</span><br/>
            <span class="quote">"{{{$restaurant->description}}}"</span>
            <br/>
            {{{$restaurant->location}}}
            <br/>
            {{{$restaurant->phoneNumber}}}
            <br/>
			<a href="{{ $restaurant->websiteURL }}" target="_blank">{{ $restaurant->websiteURL }}</a>
            <!--11:00 AM - 10:00 PM Mon-Sun-->
        </div>
    </div>
@foreach($foods as $food)
    <div class="review">
        <div class="food-pic" id="review1-pic" style="background-image: url('{{{ $foodImagesBase64[$food->id] }}}')"></div>
        <div class="food-text">
            <span class="food-name" style="line-height:30px;"><a href="/food/{{ $food->id }}/{{ $food->name }}">{{{$food->name}}} - ${{{number_format((float)$food->price, 2, '.', '')}}}</a></span>

            <div class="grey-review-stars">
                <div class="red-review-stars" style="width: {{{ $ratings[$food->id]['Rating'] }}}% ">
                </div>
            </div>
            <br/>
            <span class="food-description">
                {{{ $food->description }}}
            </span>
            <br/>
            <span id="number-of-reviews" style="line-height:30px;">{{{ $ratings[$food->id]['Count'] }}} reviews &#10230;</span>
        </div>
    </div>
@endforeach

@stop