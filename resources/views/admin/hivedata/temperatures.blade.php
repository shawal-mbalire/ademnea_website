@extends('layouts.app')
@section('content')


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@php
    $hive_id = session('hive_id');
@endphp

@include('datanavbar')


<div class="relative p-3 mt-10 overflow-x-auto shadow-md sm:rounded-lg">

    <div class="card-header">
        <div class="row">
            <div class="col col-9"><b>Pick Date Range</b></div>
            <div class="col col-3">
                <div id="daterange"  class="float-end" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; text-align:center">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> 
                    <i class="fa fa-caret-down"></i>
                </div>
            </div>
        </div>
    </div> <br>

    <table id="myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Hive ID
                </th>
                <th scope="col" class="px-6 py-3">
                 Honey Section (°C)
                </th>
                <th scope="col" class="px-6 py-3">
                 Brood Section (°C)
                </th>
                <th scope="col" class="px-6 py-3">
                 Exterior (°C)
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
            </tr>
        </thead>
        <tbody>
        @php
            $count =  1
            @endphp
        @foreach($temperatures as $temperature)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $count }}
                </th>
                <td class="px-6 py-4">
                {{ $temperature->hive_id }}
                </td>
                <td class="px-6 py-4">
                {{ explode('*', $temperature->record)[0] }}
                </td>
                <td class="px-6 py-4">
                {{ explode('*', $temperature->record)[1] }}
                </td>
                <td class="px-6 py-4">
                {{ explode('*', $temperature->record)[2] }}
                </td>
                <td class="px-6 py-4">
                {{ $temperature->created_at }}
                </td>
            </tr>
            @php
                $count = $count + 1
                @endphp
            @endforeach
        </tbody>
    </table>
</div>

@endsection
<!-- added pagination and search-->
@section('page_scripts')
<!-- Include DataTables JS file -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>

  $(document).ready(function() {
  $('#myTable').DataTable({
     responsive: true,
  });
});

$(function () {

var start_date = moment().subtract(1, 'M');

var end_date = moment();

$('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

$('#daterange').daterangepicker({
    startDate : start_date,
    endDate : end_date
}, function(start_date, end_date){
    $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

    table.draw();
});

var table = $('#myTable').DataTable({
    processing : true,
    serverSide : true,
    ajax : {
        url : "{{ 'admin/temperaturedata' }}",
        data : function(data){
            data.from_date = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
            data.to_date = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');
        }
    },
    columns : [
        {data : 'id', name : 'id'},
        {data : 'honey', name : 'honey'},
        {data : 'brood', name : 'brood'},
        {data : 'exterior', name : 'exterior'}
    ]
});

});


</script>
@endsection