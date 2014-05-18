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
<div id="navbar">
        <!--LOGO-->
    <img id="logo" src="assets/hungry.me_logo_main.png">
<!--    SIGN IN-->
    <div id="sign-in"><a href="#">SIGN IN</a></div>
</div>
<!--TITLE-->
    <div id="title">What's Good?</div> <br> 
    <div id="slogan">Search restaurants and menu items:</div>
<!--SEARCH BAR-->
    <form class="form-wrapper cf" type="search">
        <input type="text" placeholder="One step closer to fooooood..." required>
        <button type="submit">Search!</button>
    </form>  
    </div>
    <div id="body2" class="section">
<!--    SIGN IN-->
    <div id="sign-in2"><a href="#">SIGN IN</a></div>
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
