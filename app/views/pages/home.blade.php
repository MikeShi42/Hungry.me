@extends('layouts.default')
@section('content')
    {{ HTML::style('css/home/home.css'); }}
    <div class="panel panel-default imagePanel">
        <div class="panel-heading">
            <h3 class="panel-title">Your History <span class="glyphicon glyphicon-chevron-right"></span></h3>
        </div>
        <div class="panel-body">
            @for ($i = 0; $i < 10; $i++)
                <div class="panelImage">

                </div>
            @endfor
        </div>
    </div>
    <div class="imagePanel-after"><h3>See More &nbsp;<span class="glyphicon glyphicon-circle-arrow-down" style="font-size: 18px;"></span></h3></div>
@stop
