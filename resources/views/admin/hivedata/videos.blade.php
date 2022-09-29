@extends('layouts.app')

<?php use Illuminate\Support\Facades\DB;?>
<style>
    .button1{
        background-color: lightseagreen;
        color: white;
        height: 34px;
        width: 75px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button2{
        background-color: mediumseagreen;
        color: white;
        height: 34px;
        width: 75px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button3{
        background-color: seagreen;
        color: white;
        height: 34px;
        width: 85px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }

    .button4{
        background-color: lightseagreen;
        color: white;
        height: 40px;
        width: 100px;
        border-radius: 5px;
        border-color: lightseagreen;
        shadow: none;
        font-weight: bold
    }
</style>
@section('content')

<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown"><a href="/#"><span>Work Packages</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                        <li><a href="/workpackages-wp1">Networks and Resilience(WP1)</a></li>
                        <li><a href="/workpackages-wp2">Sensors and signal processing(WP2)</a></li>
                        <li><a href="/workpackages-wp3">Data Analytics for Environment Monitoring services(WP3)</a></li>
                        <li><a href="/workpackages-wp4">Project Administration(WP4)</a></li>
                    </ul>

                </li>


<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">VIDEO DATA</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/videodata') }}" class="btn btn-success btn-sm" title="View Hive Videos">
                            <i class="fa fa-eye" aria-hidden="true"></i> Video Data
                        </a>
                
                        <a href="{{ url('/admin/audiodata') }}" class="btn btn-success btn-sm" title="View Hive Audios">
                            <i class="fa fa-eye" aria-hidden="true"></i> Audio Data
                        </a>
                        <a href="{{ url('/admin/temperaturedata') }}" class="btn btn-success btn-sm" title="View Hive Temperatures">
                            <i class="fa fa-eye" aria-hidden="true"></i> Temperatures
                        </a>
                        <a href="{{ url('/admin/humiditydata') }}" class="btn btn-success btn-sm" title="View Hive Humidities">
                            <i class="fa fa-eye" aria-hidden="true"></i> Hive Humidity
                        </a>
                        <a href="{{ url('/admin/weightdata') }}" class="btn btn-success btn-sm" title="View Hive Weights">
                            <i class="fa fa-eye" aria-hidden="true"></i> Hive Weights
                        </a>
                        <a href="{{ url('/admin/carbondioxidedata') }}" class="btn btn-success btn-sm" title="View Hive Carbondioxide Levels">
                            <i class="fa fa-eye" aria-hidden="true"></i> Carbiondioxide Levels
                        </a>  <br> <br>
                        

                        <form method="GET" action="{{ url('/admin/farm') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Path</th><th>Hive Id</th><th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $video->id }}</td>
                                        <td>{{ $video->path }}</td>
                                        <td>{{ $video->hive_id }}</td>   
                                        <td>{{ $video->created_at }}</td>                                     
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
