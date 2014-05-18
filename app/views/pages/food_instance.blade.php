@extends('layouts.default')
@section('head')
<title>Mmm so good!</title>
{{ HTML::style('/css/food_styles.css') }}
{{ HTML::style('/css/subpage_footer_style.css') }}
{{ HTML::script('/js/jquery-2.1.1.js') }}
<script> 
    $(document).ready(function(){
    $("#submit-button").click(function(){
        $("#submission-form").slideDown(400,function(){
            $("#exit-button").click(function(){
                $("#submission-form").slideUp('slow');
            })
        });
    });
});
</script>
@stop

@section('content')
<div id="container">
        <div class="food-img" style="background:url('{{ $foodImageBase64 }}')"></div>
        <div id="food-description">
			<span id="name">{{ $food->name }} - ${{ $food->price }}</span><br/>
			<span class="quote">"{{ $food->description }}"</span>
			<br/>
			<a href="{{ $food->restaurant->websiteURL; }}">{{ $food->restaurant->name }} - Los Angeles, CA</a> <!--TODO hardcoded city yay-->
			<br/>
			<div class="grey-review-stars">
				<div class="red-review-stars" style="width: {{ $rating['Rating']/5.0*100 }}% "></div>
			</div><span id="number-of-reviews"> based on {{ $rating['Count'] }} reviews</span>
        </div>
        </div>
        <div id="submit"><button id="submit-button" type="submit">Submit your review!</button></div>
        <div id="submission-form">
            <img id="submission-rating" src="/assets/rating_stars_gray.png">
            <a href="#"><div id="exit-button">&#9447;</div></a>
            <form action="/updateReview" method="post">
				Stars (1-5 integer): <input type="text" name="rating"><br>
                <textarea name="reviewText" rows="30" columns="80">Write your review here!</textarea>
				<input type="hidden" name="_token" value="{{ csrf_token(); }}">
				<input type="hidden" name="food_instance_id" value="{{ $food->id }}">
				<button id="upload-button">Upload a picture</button>
				<button id="finish-button" type="submit">Submit</button>
            </form>
        </div>
		@foreach($rating['Reviews'] as $review)
        <div id="review">
            <div class="user-name">
			<?php $user = User::where('id', '=', $review->users_id)->first(); ?>
                <a href="#">{{ $user->firstName }} {{ $user->lastName }}</a> &#8226;
                <span class="date">5-18-2014</span> &#8226; 
                <div class="grey-review-stars">
					<div class="red-review-stars" style="width: {{ $review->rating/5.0*100 }}% "></div>
				</div>
            </div>
            <div class="review-box">
                <div class="review-text">
                {{ $review->reviewText }}
                </div>
                <!--<div class="user-uploaded-pic"></div>TODO USELESS IMAGE-->
            </div>
        </div>
		@endforeach
@stop