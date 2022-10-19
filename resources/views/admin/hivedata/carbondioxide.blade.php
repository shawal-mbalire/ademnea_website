@extends('layouts.app')

<?php use Illuminate\Support\Facades\DB;?>
<style>
    /* Dropdown Button */
.dropbtn {
  background-color: hsl(129, 76%, 37%);
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: rgb(223, 208, 208);}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

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
<div class="content-wrapper">
    {{-- <div class="row"> --}}
        {{-- <div class="col-sm-12"> --}}

            <div class="card">
                        <div class="card-header">
                            CARBONDIOXIDE LEVELS
                        </div>

                        <div class="card-body">
                            <div class="dropdown">
                                <button class="dropbtn">More Data</button>
                                <div class="dropdown-content">
                                    <a href="{{ url('/admin/photodata') }}">Photos</a>
                                  <a href="{{ url('/admin/videodata') }}">Video Data</a>
                                  <a href="{{ url('/admin/audiodata') }}">Audio Data</a>
                                  <a href="{{ url('/admin/temperaturedata') }}">Temperatures</a>
                                  <a href="{{ url('/admin/humiditydata') }}">Hive Humidity</a>
                                  <a href="{{ url('/admin/weightdata') }}">Hive Weights</a>
                                  <a href="{{ url('/admin/carbondioxidedata') }}">Carbiondioxide Levels</a>
                                </div>
                              </div>
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
                                        <th>#</th><th>Record</th><th>Hive Id</th><th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count =  1
                                    @endphp
                                @foreach($carbondioxide as $carbondioxide)
                                    <tr>
                                        <td>{{ $carbondioxide->id }}</td>
                                        <td>{{ $carbondioxide->record }}</td>
                                        <td>{{ $carbondioxide->hive_id }}</td>   
                                        <td>{{ $carbondioxide->created_at }}</td>                                     
                                    </tr>
                                    @php
                                    $count = $count + 1
                                    @endphp
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
