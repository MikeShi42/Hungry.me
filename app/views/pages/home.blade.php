@extends('layouts.default')
@section('head')
<title>Food 4 Life</title>
{{ HTML::style('css/home_styles.css') }}
@stop

@section('content')
    <div id="slogan">Search restaurants and menu items:</div>
    <!--SEARCH BAR-->
    <div id="outer-form-wrapper">
        <form class="form-wrapper cf" action="/search" type="search" method="post">
            <!--TITLE-->
            <div id="title">What's Good?</div> <br>
            <div id="slogan">Search restaurants and menu items:</div>
            <br>
            <br>
            <br>
            <input name="searchString" type="text" placeholder="One step closer to fooooood..." required>
            <select name="searchBy">
                <option value="I">Foods</option>
                <option value="R">Restaurants</option>
            </select>
            <button type="submit">Search!</button>
        </form>
    </div>
    
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
            Your Reviews &#10230;
        </div>
        <div class="suggestions-images">
            <a href="#"><div class="image" id="sugg1"></div></a>
            <a href="#"><div class="image" id="sugg2"></div></a>
            <a href="#"><div class="image" id="sugg3"></div></a>
            <a href="#"><div class="image" id="sugg4"></div></a>
        </div>
    </div>
@stop
