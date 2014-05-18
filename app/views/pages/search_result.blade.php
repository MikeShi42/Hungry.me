@extends('layouts.default')
@section('head')
<title>Gimme some ATP</title>
{{ HTML::style('css/search_result_style.css') }}
@stop
@section('content')
    <?php

    $searchBy = $_POST['searchBy'];

    if($searchBy == 'I')
    {
        $items = $results[0];
        $itemReviews = $results[1];
        if(sizeof($items)>0){
            for($i = 0;$i<sizeof($items);$i++)
            {
                echo '</br>Name: '.$items[$i]['name'].'</br>';
                echo 'Description: '.$items[$i]['description'].'</br>';
                echo 'Rating: '.$itemReviews[$i]->rating.'</br>';
                echo 'Review: '.$itemReviews[$i]->reviewText.'</br>';
            }
        }
        else{
            echo 'No food items found';
        }

    }
    if($searchBy == 'R'){
        $restaurants = $results[0];
        $restaurantsImages = $results[1];

        if(sizeof($restaurants)>0){
            for($i = 0;$i<sizeof($restaurants);$i++)
            {
                echo '</br>Name: '.$restaurants[$i]['name'].'</br>';
                echo 'Description: '.$restaurants[$i]['description'].'</br>';
                echo 'Phone Number: '.$restaurants[$i]['phoneNumber'].'</br>';
                echo 'Address: '.$restaurants[$i]['location'].'</br>';
                echo 'Website: '.$restaurants[$i]['websiteURL'].'</br>';
                echo 'Picture: '.$restaurantsImages[$i].'</br>';
            }
        }
        else{
            echo 'No restaurants found';
        }

    }
    ?>

@stop
