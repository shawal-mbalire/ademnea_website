@extends('layouts.app')
@section('content')
    @php
        $hive_id = session('hive_id');
    @endphp
    <div>
        @include('datanavbar')


    </div>

    <div>
        <p>Battery for Hives</p>


        @foreach ($hive_battery as $battery)
            <div class="text-center bold">
                <b>BATTERY FOR HIVE: {{ $battery->hive_id }}</b>
            </div>

            <div class="row">
                <div class="col-4 m-1 donut" style="background-color: aquamarine">
                    Liquid Battery goes here
                </div>
                <div class="col-4 m-1 graph">
                    Graph goes here
                </div>
            </div>
        @endforeach
    </div>
@endsection
