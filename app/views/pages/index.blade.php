@extends('layouts.default')
@section('head')
<title>Gimme some ATP</title>
{{ HTML::script('js/jquery.fullPage.js') }}
{{ HTML::style('css/jquery.fullPage.css') }}
{{ HTML::style('css/index_styles.css') }}
{{ HTML::script('js/index.js') }}
@stop

@section('content')
<div id="fullpage">
    <div id="body1" class="section">

        <!--SEARCH BAR-->
        <div id="outer-form-wrapper">
            <form class="form-wrapper cf" type="search">
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
    </div>
    <div id="body2" class="section">
        <!--    SIGN IN-->
        <div id="sign-in2"><a href="login">SIGN IN</a></div>
        <div id="body2-title">
            Indecisive about what to order?
        </div>

        <div id="body2-description">
            Hungry Me is a website that allows you to search for and add ratings to specific food items, not just restaurants.
            <br/>
            You no longer have to spend hours staring at a menu. See what your friends love to eat, and try it yourself.
        </div>

    </div>
</div>
@stop
