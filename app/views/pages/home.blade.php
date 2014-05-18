@extends('layouts.default')
@section('head')
<title>Food 4 Life</title>
{{ HTML::style('/css/home_styles.css') }}
{{ HTML::style('/css/subpage_footer_style.css') }}
@stop

@section('content')
        <div id="slogan">Search restaurants and menu items:</div>
<!--SEARCH BAR-->
<form class="form-wrapper cf">
        <input type="text" placeholder="Search here..." required>
        <button type="submit">Search</button>
    </form>  
    
    <div id="history">
        <div id="history-title">
            Your History &#10230;
        </div>
        <div class="history-images">
            <a href="#"><div class="image" id="image1"></div></a>
            <a href="#"><div class="image" id="image2"></div></a>
            <a href="#"><div class="image" id="image3"></div></a>
            <a href="#"><div class="image" id="image4"></div></a>
        </div>
        <div class="history-images-more">
            <a href="#"><div class="image" id="image5"></div></a>
            <a href="#"><div class="image" id="image6"></div></a>
            <a href="#"><div class="image" id="image7"></div></a>
            <a href="#"><div class="image" id="image8"></div></a>
        </div>
    </div>
    <div id="suggestions">
        <div id="suggestions-title">
            Suggestions for you &#10230;
        </div>
        <div class="suggestions-images">
            <a href="#"><div class="image" id="sugg1"></div></a>
            <a href="#"><div class="image" id="sugg2"></div></a>
            <a href="#"><div class="image" id="sugg3"></div></a>
            <a href="#"><div class="image" id="sugg4"></div></a>
        </div>
    </div>
@stop
