@extends('layouts.default')
@section('head')
<title>Food 4 Life</title>
{{ HTML::style('css/home_styles.css') }}
{{ HTML::style('css/subpage_footer_style.css') }}
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
            <div id="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> <br>
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
            @if (sizeof($viewedItemPictures = 0)
            Your history is empty! Browse and search around!
            @endif
            @for ($i = 0; $i < sizeof($viewedItemPictures) && $i < 4; $i++)
                <a href=<?php echo "'food/".$viewedItemsIDs[$i]."/".$viewedItems[$i]['name']."'"?>>
                    <div class="image" id="image{{{$i}}}" style="background-image:url({{{$viewedItemPicture[$i] or ''}}})"></div>
                </a>
            @endfor
            @if (sizeof($viewedItemPictures) > 4)
                <a href="#"><div id="arrow">v</div></a>
            @endif
        </div>
        @if (sizeof($viewedItemPictures) > 4)
        <div class="more-history-images">
            @for ($i = 4; $i < sizeof($viewedItemPictures) && $i < 8; $i++)
            <a href=<?php echo "'food/".$viewedItemsIDs[$i]."/".$viewedItems[$i]['name']."'"?>>
                    <div class="image" id="image{{{$i}}}" style="background-image:url({{{$viewedItemPictures[$i] or ''}}})"></div>
                </a>
            @endfor
        </div>
            @endif

    </div>
    <div id="suggestions">
        <div id="suggestions-title">
            Your Reviews &#10230;
        </div>
        <div class="suggestions-images">
            @for ($i = 0; $i < sizeof($reviewItemPictures) && $i < 4; $i++)
            <a href=<?php echo "'food/".$reviewItems[$i]['id']."/".$reviewItems[$i]['name']."'"?>>
                <div class="image" id="image{{{$i}}}" style="background-image:url({{{$reviewItemPictures[$i] or ''}}})"></div>
            </a>
            @endfor
            @if (sizeof($viewedItemPictures) > 4)
                <a href="#"><div id="arrow2">v</div></a>
            @endif
        </div>
        @if (sizeof($viewedItemPictures) > 4)
        <div class="more-suggestions-images">
            @for ($i = 4; $i < sizeof($reviewItemPictures) && $i < 8; $i++)
            <a href=<?php echo "'food/".$reviewItems[$i]."/".$reviewItems[$i]['name']."'"?>>
                <div class="image" id="image{{{$i}}}" style="background-image:url({{{$reviewItemPictures[$i] or ''}}})"></div>
            </a>
            @endfor
        </div>
            @endif

    </div>
@stop
