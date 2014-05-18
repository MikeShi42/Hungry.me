@extends('layouts.default')
@section('head')
<title>Gimme some ATP</title>
{{ HTML::style('css/search_result_style.css') }}
@stop
@section('content')
    <?php

    $searchBy = $_POST['searchBy'];
    $searchString = $_POST['searchString'];
    $resultsLength = 0;

    function getAverage($itemReviews){
        $sum = 0;
        foreach($itemReviews as $itemReview)
        {
            $sum = $sum + $itemReview->rating;
        }
        return $sum/sizeof($itemReviews);
    }

    ?>

    <div id="navbar">
        <!--LOGO-->
        <img id="logo" src="assets/hungry.me_logo_main.png">
        <!--USER-->
        <div id="user">
            <div id="user-name">Tina S. Zheng</div>
            <div id="profile-picture"></div>
        </div>
    </div>

    <!--TITLE-->
    <!--    <div id="title">What's Good?</div> <br> -->
    <div id="slogan">Search restaurants and menu items:</div>
    <!--SEARCH BAR-->
    <form class="form-wrapper cf">
        <input type="text" placeholder="Search here..." required>
        <button type="submit">Search</button>
    </form>

    <div id="search-result-title">Your search <span id="search-tag"><?php echo $searchString; ?></span> returned <?php echo $resultsLength; ?> results:</div>

    <?php
    if($searchBy == 'I')
    {
        $items = $results[0];
        $itemsReviews = $results[1];
        $resultsLength=sizeof($items);
        if($resultsLength>0){
            for($i = 0;$i<sizeof($items);$i++)
            {
                ?>
                <div class="review" id=<?php echo "review".$i?>>
                    <div class="food-pic" id="review1-pic"></div>
                    <div class="food-text">
                        <span class="food-name" style="line-height:30px;"><?php echo $items[$i]['name'].' - '.$items[$i]['price'];?> </span>
                        <img id="stars" src="assets/rating_stars_red.png"><?php echo getAverage($itemsReviews[$i]); ?> <br/>
                    <span class="food-description">
                        <?php echo $items[$i]['description'];?>
                    </span>
                        <br/>
                        <span id="number-of-reviews" style="line-height:30px;"><a href="#"> <?php echo sizeof($itemReviews[$i]).' reviews'?> &#10230;</a></span>
                    </div>
                </div>
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
                    <div class="food-pic" id="review1-pic"></div>
                    <div class="food-text">
                        <span class="food-name" style="line-height:30px;"><?php echo $restaurants[$i]['name'];?> </span>
                        <img id="stars" src="assets/rating_stars_red.png"><?php echo 'placeholder average' ?> <br/>
                    <span class="food-description"><?php echo $restaurants[$i]['description'];?></span>
                    <span class="food-description"><?php echo $restaurants[$i]['phoneNumber'];?></span>
                    <span class="food-description"><?php echo $restaurants[$i]['location'];?></span>
                    <span class="food-description"><a href=<?php echo $restaurants[$i]['websiteURL'];?> target='_blank'><?php echo $restaurants[$i]['websiteURL'];?></a></span>

                        <br/>
                        <span id="number-of-reviews" style="line-height:30px;"><a href="#"> <?php echo sizeof($itemReviews[$i]).' items'?> &#10230;</a></span>
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
