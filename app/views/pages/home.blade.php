@extends('layouts.default')
@section('head')
<title>Food 4 Life</title>
{{ HTML::style('css/home_styles.css') }}
<script>
    $(document).ready(function(){
        $("#arrow").click(function(){
            $(".more-history-images").slideToggle(400);
        });

        $("#arrow2").click(function(){
            $(".more-suggestions-images").slideToggle(400);
            console.log('clicked!');
        });
    });
</script>
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
            <a href="#"><div class="image" id="image1" style="background-image:url({{{$viewedItemPictures[0] or ''}}})"></div></a>
            <a href="#"><div class="image" id="image2" style="background-image:url({{{$viewedItemPictures[1] or ''}}})"></div></a>
            <a href="#"><div class="image" id="image3" style="background-image:url({{{$viewedItemPictures[2] or ''}}})"></div></a>
            <a href="#"><div class="image" id="image4" style="background-image:url({{{$viewedItemPictures[3] or ''}}})"></div></a>
            <a href="#"><div id="arrow">v</div></a>
        </div>
        <div class="more-history-images">
            <a href="#"><div class="image" id="image5" style="background-image:url({{{$viewedItemPictures[4] or ''}}})"></div></a>
            <a href="#"><div class="image" id="image6" style="background-image:url({{{$viewedItemPictures[5] or ''}}})"></div></a>
            <a href="#"><div class="image" id="image7" style="background-image:url({{{$viewedItemPictures[6] or ''}}})"></div></a>
            <a href="#"><div class="image" id="image8" style="background-image:url({{{$viewedItemPictures[7] or ''}}})"></div></a>
        </div>
    </div>
    <div id="suggestions">
        <div id="suggestions-title">
            Your Reviews &#10230;
        </div>
        <div class="suggestions-images">
            <a href="#"><div class="image" id="sugg1" style="background-image:url({{{$reviewItemPictures[0] or ''}}})"></div></a>
            <a href="#"><div class="image" id="sugg2" style="background-image:url({{{$reviewItemPictures[1] or ''}}})"></div></a>
            <a href="#"><div class="image" id="sugg3" style="background-image:url({{{$reviewItemPictures[2] or ''}}})"></div></a>
            <a href="#"><div class="image" id="sugg4" style="background-image:url({{{$reviewItemPictures[3] or ''}}})"></div></a>
            <a href="#"><div id="arrow2">v</div></a>
        </div>
        <div class="more-suggestions-images">
            <a href="#"><div class="image" id="sugg5" style="background-image:url({{{$reviewItemPictures[4] or ''}}})"></div></a>
            <a href="#"><div class="image" id="sugg6" style="background-image:url({{{$reviewItemPictures[5] or ''}}})"></div></a>
            <a href="#"><div class="image" id="sugg7" style="background-image:url({{{$reviewItemPictures[6] or ''}}})"></div></a>
            <a href="#"><div class="image" id="sugg8" style="background-image:url({{{$reviewItemPictures[7] or ''}}})"></div></a>
        </div>
    </div>
@stop
