@extends('layouts.default')
@section('head')
<title>Gimme some ATP</title>
{{ HTML::style('/css/search_result_style.css') }}
{{ HTML::style('/css/subpage_footer_style.css') }}
@stop
@section('content')
    <?php

    $searchBy = $_POST['searchBy'];
    $searchString = $_POST['searchString'];
    //$resultsLength = 0;

    ?>

    <!--TITLE-->
    <!--    <div id="title">What's Good?</div> <br> -->
    <div id="slogan">Search restaurants and menu items:</div>
    <!--SEARCH BAR-->
    <form class="form-wrapper cf" action="/search" method="post">
        <input name="searchString" type="text" placeholder="<?php echo $searchString; ?>" required>
        <select name="searchBy">
            <option value="I">Foods</option>
            <option value="R">Restaurants</option>
        </select>
        <button type="submit">Search!</button>
    </form>

    <div id="search-result-title">Your search <span id="search-tag"><?php echo $searchString; ?></span> returned <?php echo $resultsLength; ?> results:</div>

    <?php
    if($searchBy == 'I')
    {
        $items = $results[0];
        $averageRatings = $results[1];
        $itemPictures = $results[2];
        $resultsLength=sizeof($items);
        if($resultsLength>0){
            for($i = 0;$i<sizeof($items);$i++)
            {
                ?>
                <a href=<?php echo "'food/".$items[$i]['id']."/".$items[$i]['name']."'"?>>
                <div class="review" id=<?php echo "review".$i?>>
                    <div class="food-pic" id="review1-pic" style="background-image:url({{{ $itemPictures[$i] }}})"></div>
                    <div class="food-text">
                        <span class="food-name" style="line-height:30px;">{{{$items[$i]['name']}}} - ${{{number_format((float)$items[$i]['price'], 2, '.', '')}}} </span>
                        <div class="grey-review-stars">
                            <div class="red-review-stars" style="width: <?php echo $averageRatings[$i][0]/5.0*100; ?>% ">
                            </div>
                        </div> <br/>
                    <span class="food-description">
                        <?php echo $items[$i]['description'];?>
                    </span>
                        <br/>
                        <span id="number-of-reviews" style="line-height:30px;"><a href="#"> <?php echo sizeof($averageRatings[$i][1]).' reviews'?> &#10230;</a></span>
                    </div>
                </div>
                </a>
                <?php
            }
        }
        else{
            echo 'No food items found';
        }

    }
    if($searchBy == 'R'){
        $restaurants = $results[0];
        $restaurantsImages = $results[1];

        $resultsLength=sizeof($restaurants);
        if($resultsLength>0){
            for($i = 0;$i<sizeof($restaurants);$i++)
            {
            ?>
                <div class="review" id=<?php echo "review".$i?>>
                    <div class="food-pic" id="review1-pic" style="background-image:url({{{ $restaurantsImages[$i] }}})"></div>
                    <div class="food-text">
                        <span class="food-name" style="line-height:30px;"><?php echo $restaurants[$i]['name'];?> </span>
                    <span class="food-description"><?php echo $restaurants[$i]['description'];?></span>
                    <span class="food-description"><?php echo $restaurants[$i]['phoneNumber'];?></span>
                    <span class="food-description"><?php echo $restaurants[$i]['location'];?></span>
                    <span class="food-description"><a href=<?php echo $restaurants[$i]['websiteURL'];?> target='_blank'><?php echo $restaurants[$i]['websiteURL'];?></a></span>

                        <br/>
                        <!--<span id="number-of-reviews" style="line-height:30px;"><a href="#"> <?php //echo sizeof($itemsReviews[$i]).' items'?> &#10230;</a></span>-->
                    </div>
                </div>

            <?php
            }
        }
        else{
            echo 'No restaurants found';
        }
    }
    ?>

@stop
