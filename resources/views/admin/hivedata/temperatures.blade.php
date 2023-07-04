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

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" >

</style>
@section('content')
<div class="content-wrapper">
    {{-- <div class="row"> --}}
        {{-- <div class="col-sm-12"> --}}

            @include('datanavbar')
            <div class="card">
                        <div class="card-header">
                            TEMPERATURE LEVELS
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
                            <table class="table" id="temperature-table">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Hive Id</th>
                                        <th>Honey Section (°C)</th>
                                        <th>Brood Section (°C)</th>
                                        <th>Exterior (°C)</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count =  1
                                    @endphp
                                @foreach($temperatures as $temperature)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $temperature->hive_id }}</td>   
                                        <td>{{ explode('*', $temperature->record)[0] }}</td>
                                        <td>{{ explode('*', $temperature->record)[1] }}</td>
                                        <td>{{ explode('*', $temperature->record)[2] }}</td>
                                        <td>{{ $temperature->created_at }}</td>                                     
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script  type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
    // let table = new DataTable('#myTable');
    $(document).ready(function(){
        $('temperature-table').DataTable();
    });
    </script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
@endsection

